"use strict";

import { updateList } from "./activo-inmueble.js";
import { addEventListeners } from "./activo-events.js";

document.addEventListener( 'DOMContentLoaded', () => {

    $('#modal_tinglado').on('hidden.bs.modal', function (e) {
        const btnCancelar = document.getElementById( 'btn_modal_cancelar' );
        const listUrl = btnCancelar.dataset.listUrl;
        const type = btnCancelar.dataset.type;
        const parentId = btnCancelar.dataset?.parentId;
        console.log('++++ listUrl', listUrl);
        updateList( listUrl, parentId, type ).then( () => { console.log('List updated'); } );
        addEventListeners();
    })

    // Auto render the bloque list
    updateList( pisoListUrl, '', 'piso-inmueble' ).then( () => { 
        console.log('Piso list updated');
    } );

    updateList( parqueoListUrl, '', 'parqueo' ).then( () => { 
        console.log('Parqueo list updated');
    } );

    updateList( bauleraListUrl, '', 'baulera' ).then( () => { 
        console.log('Baulera list updated');
    } );
} );