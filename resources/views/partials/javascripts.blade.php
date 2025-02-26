<!-- scripts -->
<!-- Core Js -->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<!-- <script src="{{ asset('js/tw-elements-1.0.0-alpha13.min.js') }}"></script> -->
<script src="{{ asset('js/SimpleBar.js') }}"></script>
<script src="{{ asset('js/iconify.js') }}"></script>
<script src="{{ asset('js/rt-plugins.js') }}"></script>
<script src="{{ asset('js/messages_es.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- Jquery Plugins -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- app js -->
<script src="{{ asset('js/sidebar-menu.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
<script>
  var __table = null;

  // Add event listener for 'delete' buttons
  function addDeleteEventListeners() {
    $(".delete").click(function() {
      Swal.fire({
        title: 'Are you sure to delete?',
        text: "Una vez eliminado, este registro y todos los registros relacionados se perderán y no podran ser recuperados.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar !'
      }).then((result) => {
        if (result.value) {
          $(this).next('form').submit();
          Swal.fire(
            'Eliminado !',
            'El registro fue eliminado',
            'success'
          )
        } else {
          Swal.fire("Su registro esta a salvo, no se elimino nada.");
        }
      })
    });
  }

  $(function() {
    $('.js-select2').select2();

    /* For encargado  */
    $('#encargado').on('select2:select', function(e) {
      let selectedValue = e.params.data.text;
      let selName = selectedValue.split('(')[0];
      let selCI = selectedValue.split('(')[1].replace(')', '');

      $('#name').val(selName.trim());
      $('#ci').val(selCI.trim());
    });

    $('#entidad').on('select2:select', function(e) {
      let selectedValue = e.params.data.text;
      let selectedId = e.params.data.id;
      let selName = selectedValue.split('(')[0];

      $('#name-entidad').val(selName.trim());

      if (typeof maeEntidad !== 'undefined') {
        $('#mae').val(maeEntidad[selectedId]);
      }
    });

    addDeleteEventListeners();

    if ($(".auto-llenado").length) {
      $(".auto-llenado").click(function() {
        Swal.fire({
          title: 'Llenado automaticamente de rubros contables',
          text: "Se llenará, aproximadamente, 40 rubros contables. Luego podrá adicionar nuevos, editar o eliminar sin ningun problema",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, llenar'
        }).then((result) => {
          if (result.value) {
            window.location.href = '/admin/rubros/llenado';
          }
        })
      });
    }
    jQuery.validator.addMethod("uniqueCode", function(value, element) {
      let codigo = $('#codigo').val();
      return (codes.indexOf(codigo) < 0) ? true : false;
    }, "El Código ya esta en uso");
    $(".form_validate").validate({
      errorPlacement: function(error, element) {
        $(element).parent('div').append(error)
      },
    });

    $(document).on('keydown', 'input[pattern]', function(e) {
      const input = $(this);
      const oldVal = input.val();
      const regex = new RegExp(input.attr('pattern'), 'g');

      setTimeout(function() {
        var newVal = input.val();
        if (!regex.test(newVal)) {
          input.val(oldVal);
        }
      }, 1);
    });


    if (typeof __dataTableUrl !== 'undefined') {
      //
      // Pipelining function for DataTables. To be used to the `ajax` option of DataTables
      //
      DataTable.pipeline = function(opts) {
        // Configuration options
        var conf = Object.assign({
            pages: 5, // number of pages to cache
            url: '', // script url
            data: null, // function or object with parameters to send to the server
            // matching how `ajax.data` works in DataTables
            method: 'GET' // Ajax HTTP method
          },
          opts
        );

        // Private variables for storing the cache
        var cacheLower = -1;
        var cacheUpper = null;
        var cacheLastRequest = null;
        var cacheLastJson = null;

        return async function(request, drawCallback, settings) {
          var ajax = false;
          var requestStart = request.start;
          var drawStart = request.start;
          var requestLength = request.length;
          var requestEnd = requestStart + requestLength;

          if (settings.clearCache) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
          } else if (
            cacheLower < 0 ||
            requestStart < cacheLower ||
            requestEnd > cacheUpper
          ) {
            // outside cached data - need to make a request
            ajax = true;
          } else if (
            JSON.stringify(request.order) !==
            JSON.stringify(cacheLastRequest.order) ||
            JSON.stringify(request.columns) !==
            JSON.stringify(cacheLastRequest.columns) ||
            JSON.stringify(request.search) !==
            JSON.stringify(cacheLastRequest.search)
          ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
          }

          // Store the request for checking next time around
          cacheLastRequest = JSON.parse(JSON.stringify(request));

          if (ajax) {
            // Need data from the server
            if (requestStart < cacheLower) {
              requestStart = requestStart - requestLength * (conf.pages - 1);

              if (requestStart < 0) {
                requestStart = 0;
              }
            }

            cacheLower = requestStart;
            cacheUpper = requestStart + requestLength * conf.pages;

            request.start = requestStart;
            request.length = requestLength * conf.pages;

            // Provide the same `data` options as DataTables.
            if (typeof conf.data === 'function') {
              // As a function it is executed with the data object as an arg
              // for manipulation. If an object is returned, it is used as the
              // data object to submit
              var d = conf.data(request);
              if (d) {
                Object.assign(request, d);
              }
            } else if (conf.data) {
              // As an object, the data given extends the default
              Object.assign(request, conf.data);
            }

            // Use `fetch` to make Ajax request
            let response = await fetch(
              conf.url + '?json=' + JSON.stringify(request), {
                method: conf.method
              }
            );

            let json = await response.json();

            cacheLastJson = JSON.parse(JSON.stringify(json));

            if (cacheLower != drawStart) {
              json.data.splice(0, drawStart - cacheLower);
            }
            if (requestLength >= -1) {
              json.data.splice(requestLength, json.data.length);
            }

            drawCallback(json);
          } else {
            json = JSON.parse(JSON.stringify(cacheLastJson));
            json.draw = request.draw; // Update the echo for each response
            json.data.splice(0, requestStart - cacheLower);
            json.data.splice(requestLength, json.data.length);

            drawCallback(json);
          }
        };
      };

      // Register an API method that will empty the pipelined data, forcing an Ajax
      // fetch on the next draw (i.e. `table.clearPipeline().draw()`)
      DataTable.Api.register('clearPipeline()', function() {
        return this.iterator('table', function(settings) {
          settings.clearCache = true;
        });
      });

      const __dataTableExtra = {};

      const dataTableDefinition = {
        // responsive: true,
        // fixedHeader: {
        //     header:true,
        //     headerOffset: $(window).height() < 900 ? 55 : 97 // If the resolution is less than 1920x1090 change the start point of fixedHeader, currently work on 1980 and 1366
        // },
        // stateSave: true,
        stateSaveCallback: function(settings, data) {
          var wpath = window.location.pathname.split(/\//);
          wpath = wpath[2] + '-' + __controlCodeId;

          localStorage.setItem('DataTables_' + settings.sInstance + '-' + wpath, JSON.stringify(data))
        },
        stateLoadCallback: function(settings) {
          var wpath = window.location.pathname.split(/\//);
          wpath = wpath[2] + '-' + __controlCodeId;

          return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance + '-' + wpath))
        },
        select: false,
        'processing': true,
        'serverSide': true,
        'orderCellsTop': true,
        'lengthMenu': [10, 25, 50, 100, 500, 1000],
        'pageLength': 10,
        'ajax': DataTable.pipeline({
          url: __dataTableUrl,
          pages: 5,
          'data': function(d) {
            $.extend(d, __dataTableExtra);
            return d;
          }
        }),
        // 'order': [[__tableOrderColumnIndex, __tableOrderType]],
        // 'dom': __tableDom,
        "dom": "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
        'language': {
          lengthMenu: "Mostrar _MENU_ registros",
          paginate: {
            previous: "<iconify-icon icon=\"ic:round-keyboard-arrow-left\"></iconify-icon>",
            next: "<iconify-icon icon=\"ic:round-keyboard-arrow-right\"></iconify-icon>"
          },
          search: "Buscar:",
          emptyTable: "No existen datos en la tabla."
        },
        "createdRow": function(row, data, dataIndex) {
          $(row).addClass("even:bg-slate-50 dark:even:bg-slate-700").removeClass("odd").removeClass("even");
        },
        "columnDefs": [{
          "targets": "_all",
          "createdCell": function(td, cellData, rowData, row, col) {
            $(td).addClass("table-td");
          }
        }]
      };

      function initTable() {
        __table = $('.datatableajax').DataTable(dataTableDefinition);
        __table.on('draw', function() {
          document.getElementsByClassName('deleteItem').forEach((item) => {
            item.addEventListener("click", deleteActivo);
          });
        });
      }

      initTable();
    }

  });
</script>
<script>
  var dropzone_entidad_id = 0;
</script>
<script src="{{ asset('js/general/custom-dropzone.js') }}"></script>
<style>
  .dark .select2-search {
    background-color: rgb(15 23 42 / 1)
  }

  .dark .select2-search input {
    background-color: rgb(15 23 42 / 1)
  }

  .dark .select2-results {
    background-color: rgb(15 23 42 / 1)
  }

  .dark .select2-container--default .select2-selection--single {
    background-color: rgb(15 23 42 / 1)
  }

  .dark .dropzone {
    background-color: rgb(15 23 42 / 1)
  }

  .dark .dropzone .dz-preview.dz-image-preview {
    background-color: rgb(15 23 42 / 1)
  }

  .dropzone-download:hover {
    text-decoration: underline;
    cursor: pointer;
  }
</style>