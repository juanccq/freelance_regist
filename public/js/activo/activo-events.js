"use strict";

import { updateList } from "./activo-inmueble.js";

export function addEventListeners() {
    console.log('++++ addEventListeners');
    const buttons = document.getElementsByClassName('modal-form-btn');

    for (let button of buttons) {
        button.removeEventListener('click', clickListener);
        button.addEventListener('click', clickListener, false);
    }
}

/**
     * Make a DELETE request to url
     * 
     * @param {String} deleteURL 
     * @returns 
     */
async function makeDeleteRequest(deleteURL) {
    const hRequest = new Request(deleteURL);

    const response = await fetch(hRequest, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ method: 'DELETE' })
    })

    return await response.json();
}

function deleteItem(url, listUrl, type, parentId) {
    Swal.fire({
        title: 'Are you sure to delete?',
        text: "Una vez eliminado, este registro y todos los registros relacionados se perderán y no podran ser recuperados.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar !'
    }).then(async (result) => {
        if (result.value) {
            const response = await makeDeleteRequest(url);

            if (response.status == 200) {
                Swal.fire(
                    'Eliminado !',
                    'El registro fue eliminado',
                    'success'
                );

                await updateList(listUrl, parentId, type);
                addEventListeners();
            }
            else {
                Swal.fire("No se pudo eliminar el registro");
            }
        } else {
            Swal.fire("Su registro esta a salvo, no se elimino nada.");
        }
    })
}

const clickListener = function () {
    const id = this.id;
    const action = this.dataset.action;
    const url = this.dataset.url;
    const listUrl = this.dataset.listUrl;
    const title = this.dataset?.title;
    const type = this.dataset.type;
    const parentId = this.dataset?.parentId;

    if (action === 'add' || action === 'edit') {
        addEditItem(url, title, listUrl, type, parentId);
    }
    else if (action === 'delete') {
        deleteItem(url, listUrl, type, parentId);
    }
}

function sendModalForm(event) {
    const modalIframe = document.getElementById('modal_form');
    const modalContent = modalIframe.contentDocument || modalIframe.contentWindow.document;
    const modalForm = modalContent.querySelector('form');
    modalForm.submit();
}

function closeModalForm(event) {
    console.log('++++ modal will be closed');
    $('#modal_tinglado').modal('hide');
}

function addEditItem(url, title, listUrl, type, parentId) {
    // Change iframe url
    document.getElementById('modal_form').src = url;

    // Open modal
    $('#modal_tinglado').modal('show');

    // Set modal settings
    document.querySelector('#modal_tinglado h3').innerHTML = title;

    const btnCancelar = document.getElementById('btn_modal_cancelar');
    btnCancelar.dataset.listUrl = listUrl;
    btnCancelar.dataset.type = type;
    btnCancelar.dataset.parentId = parentId;
    btnCancelar.addEventListener('click', closeModalForm);

    const btnGuardar = document.getElementById('btn_modal_guardar');
    btnGuardar.removeEventListener('click', sendModalForm);
    btnGuardar.addEventListener('click', sendModalForm);
}
