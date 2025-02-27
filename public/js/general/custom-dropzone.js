$(function () {
    var route_home='/';
    
    var url_uploads = route_home + "uploads/";
    var url_to_upload = route_home + 'admin/fileuploadhandler';

    Dropzone.autoDiscover = false;
    var defaultOptions={
        dictDefaultMessage : "<img src='/uploads/upload.svg' class='mx-auto mb-4'>Arrastra los archivos aquí para subirlos<br> o <br>presiona aquí",
        dictFallbackMessage : "Su navegador no admite la carga de archivos arrastrados",
        dictFallbackText : "Utilice el siguiente formulario alternativo para cargar sus archivos como en los viejos tiempos",
        dictFileTooBig : "El archivo es muy grande ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",
        dictInvalidFileType : "No puede cargar archivos de este tipo.",
        dictResponseError : "El servidor respondió con un código {{statusCode}}.",
        dictCancelUpload : "Cancelar carga",
        dictCancelUploadConfirmation : "¿Seguro que quieres cancelar esta carga?",
        dictRemoveFile : "Remover archivo",
        dictMaxFilesExceeded : "No puedes subir más archivos.",
        };
    // init,configure dropzone
    $("div.dropzone").each(function (index, value) {
        // console.log("div" + index + ":" + $(this).attr("data-image"));
        var dataId = $(this).attr("id");
        // console.log(`🚀 ~ file: custom-dropzone.js:12 ~ dataId:`, dataId);
        var dataImageId = $(this).attr("data-id");
        // console.log('----dataImageId---->',dataImageId);
        var dataRO = $("#" + dataImageId).attr("readonly");
        // console.log('----dataRO---->',dataRO);
        var dataImage = $("#" + dataImageId).val();
        var dataConfig = JSON.parse($("#" + dataImageId).attr("data-dz"));
        if(dropzone_entidad_id){
            dataConfig.dir= `${dropzone_entidad_id}/${dataConfig.dir}`;
        }
        console.log(dataConfig);
        // console.log('--->' + dataImage);
        if (dataRO == "readonly") {
            dataConfig.maxFiles = -1;
        }
        var dataImageArr = [];
        if (dataImage.indexOf(",") > -1) {
            dataImageArr = dataImage.split(",");
        } else {
            if (dataImage.length > 4) {
                dataImageArr.push(dataImage);
            }
        }
        // console.dir(dataImageArr);

        var myDropzone = new Dropzone("#" + dataId,$.extend(true,defaultOptions, {
            //        var myDropzone = new Dropzone('#adjunto-1', {
            url: url_to_upload,
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            acceptedFiles: dataConfig.acceptedFiles,
            maxFiles: dataConfig.maxFiles,
            addRemoveLinks: true,
            accept: function (file, done) {
                var thumbnail = $(`.dropzone .dz-preview.dz-file-preview .dz-image:last`);

                switch (file.type) {
                    case "application/pdf":
                        thumbnail.css(
                            "background",
                            "url(" + url_uploads + "/_pdf.png"
                        );
                        break;
                }

                done();
            },

            removedfile: function (file) {
                // console.dir(file);
                var name = file.filename;
                // console.log("--->" + name);
                dataImageArr = dataImageArr.filter((e) => e !== name);
                $("#" + dataImageId).val(dataImageArr.join(","));
                var _ref;
                return (_ref = file.previewElement) != null
                    ? _ref.parentNode.removeChild(file.previewElement)
                    : void 0;
            },
            init: function () {
                $("#" + dataId)
                    .next("span")
                    .html(
                        "<b>Formatos permitidos:</b> " +
                            dataConfig.acceptedFiles
                    );
                var thisDropzone = this;

                this.on("maxfilesexceeded", function (file) {
                    //console.dir(this);
                    this.removeFile(file);
                    alert("No puedes subir mas archivos");
                });
                this.on("sending", function (file, xhr, formData) {
                    // send additional data with the file as POST data if needed.
                    formData.append("filer", dataConfig.filer);
                    //arr.filter(e => e !== 'B');
                });
                this.on("thumbnail", function (file, response) {
                    var a = document.createElement("a");
                    // console.log(`🚀 ~ file: custom-dropzone.js:107 ~ dataConfig.dir:`, dataConfig.dir);
                    a.setAttribute(
                        "href",
                        url_uploads + dataConfig.dir + "/" + file.filename
                    );
                    a.setAttribute("target", "_blank");
                    a.setAttribute("class", "dropzone-download");
                    a.innerHTML =
                        '<br><i class="fa fa-cloud-download"> </i> Descargar';
                    file.previewTemplate.appendChild(a);
                });
                this.on("success", function (file, response) {
                    console.log(`🚀 ~ file: custom-dropzone.js:116 ~ response:`, response);
                    if (response.uploaded) {
                        file.filename = response.fileName;
                        //alert('File Uploaded: ' + response.fileName);
                        dataImageArr.push(response.fileName);
                        $("#" + dataImageId).val(dataImageArr.join(","));
                        // console.log("--->" + dataImageId);
                    }
                });
                $.each(dataImageArr, function (k, v) {
                    if (v != "") {
                        var extension = v.split(".").pop();
                        // console.log("--->" + extension);
                        var type = "image/png";
                        var thumbnail =
                            url_uploads + dataConfig.dir + "/120x120_" + v;
                        switch (extension) {
                            case "png":
                            case "jpeg":
                                type = "image/" + extension;
                                break;
                            case "pdf":
                                type = "file/" + extension;
                                thumbnail = url_uploads + "_pdf.png";
                                break;
                            default:
                                break;
                        }
                        var mockFile = {
                            name: v,
                            filename: v,
                            size: 12345,
                            type: type,
                            accepted: true,
                        };
                        thisDropzone.emit("addedfile", mockFile);
                        //thisDropzone.emit("success", mockFile);
                        thisDropzone.emit("complete", mockFile);
                        thisDropzone.emit("thumbnail", mockFile, thumbnail);
                        thisDropzone.files.push(mockFile);
                    }
                });
            },
        }));
        if (dataRO == "readonly") {
            $(".dz-remove").remove();
        }
        var minSteps = 6,
    maxSteps = 60,
    timeBetweenSteps = 100,
    bytesPerStep = 100000;

//     myDropzone.uploadFiles = function(files) {
//   var self = this;

//   for (var i = 0; i < files.length; i++) {

//     var file = files[i];
//     totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

//     for (var step = 0; step < totalSteps; step++) {
//       var duration = timeBetweenSteps * (step + 1);
//       setTimeout(function(file, totalSteps, step) {
//         return function() {
//           file.upload = {
//             progress: 100 * (step + 1) / totalSteps,
//             total: file.size,
//             bytesSent: (step + 1) * file.size / totalSteps
//           };

//           self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
//           if (file.upload.progress == 100) {
//             file.status = Dropzone.SUCCESS;
//             self.emit("success", file, 'success', null);
//             self.emit("complete", file);
//             self.processQueue();
//             //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
//           }
//         };
//       }(file, totalSteps, step), duration);
//     }
//   }
// }
    });
});
