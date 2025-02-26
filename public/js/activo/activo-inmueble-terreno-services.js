"use strict";

import { updateList } from "./activo-inmueble.js";
import { addEventListeners } from "./activo-events.js";

document.addEventListener( 'DOMContentLoaded', () => {

    $('#modal_tinglado').on('hidden.bs.modal', function (e) {
        const btnCancelar = document.getElementById( 'btn_modal_cancelar' );
        const listUrl = btnCancelar.dataset.listUrl;
        const type = btnCancelar.dataset.type;
        const parentId = btnCancelar.dataset?.parentId;
        updateList( listUrl, parentId, type ).then( () => { console.log('List updated'); } );
        addEventListeners();
    })

    // Auto render the bloque list
    updateList( bloqueListUrl, '', 'bloque' ).then( () => { 
        console.log('Bloque list updated');
    } );

    updateList( tingladoListUrl, '', 'tinglado' ).then( () => { 
        console.log('Tinglado list updated');
    } );

    updateList( graderiaListUrl, '', 'graderia' ).then( () => { 
        console.log('Graderia list updated');
    } );

    updateList( canchaListUrl, '', 'cancha' ).then( () => { 
        console.log('Cancha list updated');
    } );
} );