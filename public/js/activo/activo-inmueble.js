"use strict";

import { pisoTemplate } from "./activo-piso-template.js";
import { pisoInmuebleTemplate } from "./activo-piso-inmueble-template.js";
import { bloqueTemplate } from "./activo-bloque-template.js";
import { addEventListeners } from "./activo-events.js";
import { banoTemplate } from "./activo-bano-template.js";
import { cocinaTemplate } from "./activo-cocina-template.js";
import { dormitorioTemplate } from "./activo-dormitorio-template.js";
import { otroTemplate } from "./activo-otro-template.js";
import { tingladoTemplate } from "./activo-tinglado-template.js";
import { graderiaTemplate } from "./activo-graderia-template.js";
import { canchaTemplate } from "./activo-cancha-template.js";
import { parqueoTemplate } from "./activo-parqueo-template.js";
import { bauleraTemplate } from "./activo-baulera-template.js";

export async function renderBloques( results ) {
    // Clead container content
    document.getElementById( 'activo_bloques' ).innerHTML = '';

    (async function loop() {
        for( let i = 0; i < results.length; i++ ) {
            const html = await renderBloque( results[i], i);
            document.getElementById( 'activo_bloques' ).insertAdjacentHTML( 'beforeend', html );
        }

        addEventListeners();
    })();
}

async function renderBloque( values, index ) {
    let html = bloqueTemplate;
    const valueKeys = Object.keys( values );

    valueKeys.forEach( (key, num) => {
        html = html.replaceAll( `__${key}__`, !!values[key] ? values[key] : '' );
        
    })

    html = html.replaceAll( '__bloque#__', (index + 1) );
    html = html.replaceAll( '__bloque_id__', values[ 'id' ] );
    const pisoData = await getItemsData( pisoListUrl, values[ 'id' ] );
    html = html.replaceAll( '__bloque_pisos__', await renderItems( renderPiso, pisoData, values[ 'id' ] ) );
    html = html.replaceAll( '__bloque_show__', '' );
    html = html.replaceAll( '__edit_url__', bloqueEditUrl.replace( /-1/, values['id'] ) );
    html = html.replaceAll( '__list_url__', bloqueListUrl );
    html = html.replaceAll( '__delete_url__', bloqueDeleteUrl.replace( /-1/, values['id'] ) );
    html = html.replaceAll( '__add_piso_url__', pisoAddUrl.replace( /-1/, values['id'] ) );
    html = html.replaceAll( '__list_piso_url__', pisoListUrl.replace( /-1/, values['id'] ) );

    console.log('++++ render piso', 'piso-btn-' + values[ 'id' ]);
    // Render pisos
    document.getElementsByClassName( 'piso-btn-' + values[ 'id' ] ).forEach( (btn) => {
        console.log('++++ btn', btn);
        const btnUrl = btn.dataset.listUrl;
        console.log('++++ btnUrl', btnUrl);
    });

    return html;
}

function getBoolean( value ) {
    return value == 1 ? 'SI' : 'NO';
}

function renderBano( value, index, parentId ) {
    let html = banoTemplate;
    const valueKeys = Object.keys( value );

    html = html.replace(/__bano#__/, index+1);
    html = html.replace(/__en_suit__/, getBoolean( value.en_suit ));
    html = html.replace(/__inodoro__/, getBoolean( value.inodoro ));
    html = html.replace(/__inodoro_calidad__/, value.inodoro_calidad);
    html = html.replace(/__inodoro_estado__/, value.inodoro_estado);
    html = html.replace(/__bidet__/, getBoolean( value.bidet ));
    html = html.replace(/__bidet_calidad__/, value.bidet_calidad);
    html = html.replace(/__bidet_estado__/, value.bidet_estado);
    html = html.replace(/__lavamanos__/, getBoolean( value.lavamanos ));
    html = html.replace(/__lavamanos_calidad__/, value.lavamanos_calidad);
    html = html.replace(/__lavamanos_estado__/, value.lavamanos_estado);
    html = html.replace(/__tina__/, getBoolean( value.tina ));
    html = html.replace(/__tina_calidad__/, value.tina_calidad);
    html = html.replace(/__tina_estado__/, value.tina_estado);
    html = html.replace(/__hidromasaje__/, getBoolean( value.hidromasaje ));
    html = html.replace(/__hidromasaje_calidad__/, value.hidromasaje_calidad);
    html = html.replace(/__hidromasaje_estado__/, value.hidromasaje_estado);
    html = html.replace(/__jacuzzi__/, getBoolean( value.jacuzzi ));
    html = html.replace(/__jacuzzi_calidad__/, value.jacuzzi_calidad);
    html = html.replace(/__jacuzzi_estado__/, value.jacuzzi_estado);
    html = html.replace(/__urinario__/, getBoolean( value.urinario ));
    html = html.replace(/__urinario_calidad__/, value.urinario_calidad);
    html = html.replace(/__urinario_estado__/, value.urinario_estado);
    html = html.replace(/__ducha__/, getBoolean( value.ducha ));
    html = html.replace(/__ducha_calidad__/, value.ducha_calidad);
    html = html.replace(/__ducha_estado__/, value.ducha_estado);
    html = html.replace(/__cabina_sanitaria__/, getBoolean( value.cabina_sanitaria ));
    html = html.replace(/__cabina_sanitaria_calidad__/, value.cabina_sanitaria_calidad);
    html = html.replace(/__cabina_sanitaria_estado__/, value.cabina_sanitaria_estado);
    html = html.replace(/__puerta__/, getBoolean( value.puerta ));
    html = html.replace(/__puerta_material__/, value.puerta_material);
    html = html.replace(/__puerta_estado__/, value.puerta_estado);
    html = html.replace(/__ventanas__/, getBoolean( value.ventanas ));
    html = html.replace(/__ventanas_material__/, value.ventanas_material);
    html = html.replace(/__ventanas_estado__/, value.ventanas_estado);
    html = html.replace(/__cabina_box__/, getBoolean( value.cabina_box ));
    html = html.replace(/__cabina_box_material__/, value.cabina_box_material);
    html = html.replace(/__cabina_box_estado__/, value.cabina_box_estado);
    html = html.replace(/__estanteria__/, getBoolean( value.estanteria ));
    html = html.replace(/__mezones__/, getBoolean( value.mezones ));
    

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_bano_url__/, banoEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_bano_url__/ig, banoListUrl.replace(/-1/, value.inmueble_piso_id));
    html = html.replace(/__delete_bano_url__/, banoDeleteUrl.replace(/-1/, value.id));

    valueKeys.forEach( (key, num) => {
        html = html.replaceAll( `__${key}__`, !!value[key] ? value[key] : '' );  
    })

    return html;
}

function renderCocina( value, index, parentId ) {
    let html = cocinaTemplate;

    html = html.replace(/__cocina#__/, index+1);
    html = html.replace(/__estanteria__/, getBoolean( value.estanteria ));
    html = html.replace(/__estanteria_material__/, value.estanteria_material );
    html = html.replace(/__estanteria_estado__/, value.estanteria_estado );
    html = html.replace(/__mezones__/, getBoolean( value.mezones ));
    html = html.replace(/__mezones_material__/, value.mezones_material );
    html = html.replace(/__mezones_estado__/, value.mezones_estado );
    html = html.replace(/__puerta__/, getBoolean( value.puerta ));
    html = html.replace(/__puerta_material__/, value.puerta_material );
    html = html.replace(/__puerta_estado__/, value.puerta_estado );
    html = html.replace(/__ventanas__/, getBoolean( value.ventanas ));
    html = html.replace(/__ventanas_material__/, value.ventanas_material );
    html = html.replace(/__ventanas_estado__/, value.ventanas_estado );
    html = html.replace(/__pisos_material__/, value.pisos_material );
    html = html.replace(/__pisos_estado__/, value.pisos_estado );
    html = html.replace(/__cielos_material__/, value.cielos_material );
    html = html.replace(/__cielos_estado__/, value.cielos_estado );
    html = html.replace(/__acabado_interior_material__/, value.acabado_interior_material );
    html = html.replace(/__acabado_interior_estado__/, value.acabado_interior_estado );

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_cocina_url__/, cocinaEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_cocina_url__/ig, cocinaListUrl.replace(/-1/, value.inmueble_piso_id));
    html = html.replace(/__delete_cocina_url__/, cocinaDeleteUrl.replace(/-1/, value.id));

    return html;
}

function renderDormitorio( value, index, parentId ) {
    let html = dormitorioTemplate;

    html = html.replace(/__dormitorio#__/, index+1);
    html = html.replace(/__vestidor__/, getBoolean( value.vestidor ));
    html = html.replace(/__ropero_empotrado__/, getBoolean( value.repero_empotrado ));
    html = html.replace(/__ropero_empotrado_material__/, value.ropero_empotrado_material );
    html = html.replace(/__ropero_empotrado_estado__/, value.ropero_empotrado_estado );
    html = html.replace(/__puerta__/, getBoolean( value.puerta ));
    html = html.replace(/__puerta_material__/, value.puerta_material );
    html = html.replace(/__puerta_estado__/, value.puerta_estado );
    html = html.replace(/__ventanas_material__/, value.ventanas_material );
    html = html.replace(/__ventanas_estado__/, value.ventanas_estado );
    html = html.replace(/__pisos_material__/, value.pisos_material );
    html = html.replace(/__pisos_estado__/, value.pisos_estado );
    html = html.replace(/__cielos_material__/, value.cielos_material );
    html = html.replace(/__cielos_estado__/, value.cielos_estado );
    html = html.replace(/__acabado_interior_material__/, value.acabado_interior_material );
    html = html.replace(/__acabado_interior_estado__/, value.acabado_interior_estado );

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_dormitorio_url__/ig, dormitorioEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_dormitorio_url__/ig, dormitorioListUrl.replace(/-1/, value.inmueble_piso_id));
    html = html.replace(/__delete_dormitorio_url__/ig, dormitorioDeleteUrl.replace(/-1/, value.id));

    return html;
}

function renderOtro( value, index, parentId ) {
    let html = otroTemplate;
    const valueKeys = Object.keys( value );

    html = html.replace(/__otro#__/, index+1);

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_otro_url__/ig, otroEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_otro_url__/ig, otroListUrl.replace(/-1/, value.inmueble_piso_id));
    html = html.replace(/__delete_otro_url__/ig, otroDeleteUrl.replace(/-1/, value.id));

    html = html.replace(/__puerta__/, getBoolean( value.puerta ));
    html = html.replace(/__ventanas__/, getBoolean( value.puerta ));

    valueKeys.forEach( (key, num) => {
        html = html.replaceAll( `__${key}__`, !!value[key] ? value[key] : '' );  
    })

    return html;
}

async function renderTinglado( value, index, parentId ) {
    console.log('++++ renderTinglado', value, index, parentId);
    let html = tingladoTemplate;
    const valueKeys = Object.keys( value );

    html = html.replace(/__tinglado#__/ig, index+1);

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_tinglado_url__/ig, tingladoEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_tinglado_url__/ig, tingladoListUrl.replace(/-1/, value.inmueble_piso_id));
    html = html.replace(/__delete_tinglado_url__/ig, tingladoDeleteUrl.replace(/-1/, value.id));

    html = html.replace(/__fundaciones__/, getBoolean( value.fundaciones ));
    html = html.replace(/__estructura__/, getBoolean( value.estructura ));
    html = html.replace(/__muros__/, getBoolean( value.muros ));
    html = html.replace(/__cubierta__/, getBoolean( value.cubierta ));
    html = html.replace(/__pisos__/, getBoolean( value.pisos ));
    html = html.replace(/__bano_artefactos__/, getBoolean( value.bano_artefactos ));

    const banoElementos = [];

    if( !!value.ba_inodoro ) { banoElementos.push('Inodoro'); }
    if( !!value.ba_lavamanos ) { banoElementos.push('Lavamanos'); }
    if( !!value.ba_urinario ) { banoElementos.push('Urinario'); }
    if( !!value.ba_base_ducha ) { banoElementos.push('Base de ducha'); }
    if( !!value.ba_banera ) { banoElementos.push('Bañera'); }
    if( !!value.ba_cabina_sanitaria ) { banoElementos.push('Cabina sanitaria'); }

    html = html.replace(/__bano_elementos__/, banoElementos.join(', '));

    valueKeys.forEach( (key, num) => {
        html = html.replaceAll( `__${key}__`, !!value[key] ? value[key] : '' );  
    })

    return html;
}

async function renderGraderia( value, index, parentId ) {
    let html = graderiaTemplate;
    const valueKeys = Object.keys( value );

    html = html.replace(/__graderia#__/ig, index+1);

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_graderia_url__/ig, graderiaEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_graderia_url__/ig, graderiaListUrl.replace(/-1/, value.inmueble_piso_id));
    html = html.replace(/__delete_graderia_url__/ig, graderiaDeleteUrl.replace(/-1/, value.id));

    valueKeys.forEach( (key, num) => {
        html = html.replaceAll( `__${key}__`, !!value[key] ? value[key] : '' );  
    })

    return html;
}

async function renderCancha( value, index, parentId ) {
    let html = canchaTemplate;
    const valueKeys = Object.keys( value );

    html = html.replace(/__cancha#__/ig, index+1);

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_cancha_url__/ig, canchaEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_cancha_url__/ig, canchaListUrl.replace(/-1/, value.inmueble_piso_id));
    html = html.replace(/__delete_cancha_url__/ig, canchaDeleteUrl.replace(/-1/, value.id));
    html = html.replace(/__pisos__/, getBoolean( value.pisos ));
    html = html.replace(/__parantes__/, getBoolean( value.parantes ));
    html = html.replace(/__tableros__/, getBoolean( value.tableros ));
    html = html.replace(/__alumbrado__/, getBoolean( value.alumbrado ));

    valueKeys.forEach( (key, num) => {
        html = html.replaceAll( `__${key}__`, !!value[key] ? value[key] : '' );  
    })

    return html;
}

async function renderParqueo( value, index, parentId ) {
    let html = parqueoTemplate;
    const valueKeys = Object.keys( value );

    html = html.replace(/__parqueo#__/ig, index+1);

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_parqueo_url__/ig, parqueoEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_parqueo_url__/ig, parqueoListUrl.replace(/-1/, value.datos_inmueble_id));
    html = html.replace(/__delete_parqueo_url__/ig, parqueoDeleteUrl.replace(/-1/, value.id));
    html = html.replace(/__muros__/, getBoolean( value.muros ));
    html = html.replace(/__cubierta__/, getBoolean( value.cubierta ));
    html = html.replace(/__puerta__/, getBoolean( value.puerta ));
    html = html.replace(/__ventana__/, getBoolean( value.ventana ));

    valueKeys.forEach( (key, num) => {
        html = html.replaceAll( `__${key}__`, !!value[key] ? value[key] : '' );  
    })

    return html;
}

async function renderBaulera( value, index, parentId ) {
    let html = bauleraTemplate;
    const valueKeys = Object.keys( value );

    html = html.replace(/__baulera#__/ig, index+1);

    html = html.replace(/__parent_id__/ig, parentId);
    html = html.replace(/__id__/ig, value.id);
    html = html.replace(/__edit_baulera_url__/ig, bauleraEditUrl.replace(/-1/, value.id));
    html = html.replace(/__list_baulera_url__/ig, bauleraListUrl.replace(/-1/, value.datos_inmueble_id));
    html = html.replace(/__delete_baulera_url__/ig, bauleraDeleteUrl.replace(/-1/, value.id));
    html = html.replace(/__muros__/, getBoolean( value.muros ));
    html = html.replace(/__cubierta__/, getBoolean( value.cubierta ));
    html = html.replace(/__puerta__/, getBoolean( value.puerta ));
    html = html.replace(/__ventana__/, getBoolean( value.ventana ));

    valueKeys.forEach( (key, num) => {
        html = html.replaceAll( `__${key}__`, !!value[key] ? value[key] : '' );  
    })

    return html;
}

async function renderPiso( data, index, bloqueId ) {
    let html = pisoTemplate;

    html = html.replace(/__id__/ig, data.id);
    html = html.replace(/__bloque_id__/ig, bloqueId);
    html = html.replace(/__piso_title__/, data.denominacion);
    html = html.replace(/__piso_descripcion__/, !!data.descripcion ? data.descripcion : '');
    html = html.replace(/__edit_piso_url__/, pisoEditUrl.replace(/-1/, data.id));
    html = html.replace(/__list_piso_url__/, pisoListUrl.replace(/-1/, bloqueId));
    html = html.replace(/__delete_piso_url__/, pisoDeleteUrl.replace(/-1/, data.id));

    html = html.replace(/__add_bano_url__/, banoAddUrl.replace(/-1/, data.id));
    html = html.replace(/__list_bano_url__/, banoListUrl.replace(/-1/, data.id));

    html = html.replace(/__add_cocina_url__/, cocinaAddUrl.replace(/-1/, data.id));
    html = html.replace(/__list_cocina_url__/, cocinaListUrl.replace(/-1/, data.id));

    html = html.replace(/__add_dormitorio_url__/, dormitorioAddUrl.replace(/-1/, data.id));
    html = html.replace(/__list_dormitorio_url__/, dormitorioListUrl.replace(/-1/, data.id));

    html = html.replace(/__add_otro_url__/, otroAddUrl.replace(/-1/, data.id));
    html = html.replace(/__list_otro_url__/, otroListUrl.replace(/-1/, data.id));
    
    const banosData = await getItemsData( banoListUrl, data.id );
    html = html.replace(/__piso_banos__/, await renderItems( renderBano, banosData, bloqueId+'-'+data.id ));

    const cocinasData = await getItemsData( cocinaListUrl, data.id );
    html = html.replace(/__piso_cocinas__/, await renderItems( renderCocina, cocinasData, bloqueId+'-'+data.id ));

    const dormitoriosData = await getItemsData( dormitorioListUrl, data.id );
    html = html.replace(/__piso_dormitorios__/, await renderItems( renderDormitorio, dormitoriosData, bloqueId+'-'+data.id ));

    const otrosData = await getItemsData( otroListUrl, data.id );
    html = html.replace(/__piso_otros__/, await renderItems( renderOtro, otrosData, bloqueId+'-'+data.id ));

    return html;
}

async function renderPisoInmueble( data, index, parentId ) {
    let html = pisoInmuebleTemplate;
    
    html = html.replace(/__id__/ig, data.id);
    html = html.replace(/__piso#__/ig, index);
    html = html.replace(/__bloque_id__/ig, parentId);
    html = html.replace(/__piso_title__/, data.denominacion);
    html = html.replace(/__piso_descripcion__/, !!data.descripcion ? data.descripcion : '');
    html = html.replace(/__edit_piso_url__/, pisoEditUrl.replace(/-1/, data.id));
    html = html.replace(/__list_piso_url__/, pisoListUrl.replace(/-1/, parentId));
    html = html.replace(/__delete_piso_url__/, pisoDeleteUrl.replace(/-1/, data.id));

    html = html.replace(/__add_bano_url__/, banoAddUrl.replace(/-1/, data.id));
    html = html.replace(/__list_bano_url__/, banoListUrl.replace(/-1/, data.id));

    html = html.replace(/__add_cocina_url__/, cocinaAddUrl.replace(/-1/, data.id));
    html = html.replace(/__list_cocina_url__/, cocinaListUrl.replace(/-1/, data.id));

    html = html.replace(/__add_dormitorio_url__/, dormitorioAddUrl.replace(/-1/, data.id));
    html = html.replace(/__list_dormitorio_url__/, dormitorioListUrl.replace(/-1/, data.id));

    html = html.replace(/__add_otro_url__/, otroAddUrl.replace(/-1/, data.id));
    html = html.replace(/__list_otro_url__/, otroListUrl.replace(/-1/, data.id));
    
    const banosData = await getItemsData( banoListUrl, data.id );
    html = html.replace(/__piso_banos__/, await renderItems( renderBano, banosData, parentId+'-'+data.id ));

    const cocinasData = await getItemsData( cocinaListUrl, data.id );
    html = html.replace(/__piso_cocinas__/, await renderItems( renderCocina, cocinasData, parentId+'-'+data.id ));

    const dormitoriosData = await getItemsData( dormitorioListUrl, data.id );
    html = html.replace(/__piso_dormitorios__/, await renderItems( renderDormitorio, dormitoriosData, parentId+'-'+data.id ));

    const otrosData = await getItemsData( otroListUrl, data.id );
    html = html.replace(/__piso_otros__/, await renderItems( renderOtro, otrosData, parentId+'-'+data.id ));

    return html;
}

async function getItemsData( itemUrl, itemId ) {
    const url = itemUrl.replace( /-1/, itemId );
    const results = await fetch(url);
    return await results.json();
}

async function renderItems(renderFunc, values, parentId, containerId) {
    let html = '';

    html = ( async function loop() {
        let html = '';

        for( let i = 0; i < values.length; i++ ) {
            console.log('++++ piso', values[i]);
            html += await renderFunc( values[i], i, parentId );
        }

        if( typeof containerId !== 'undefined' ) {
            console.log('++++ containerId', containerId, document.getElementById( containerId ));
            document.getElementById( containerId ).innerHTML = html;
            addEventListeners();
        }
        else {
            return html;

        }
    })();

    return html;
}

export async function updateList( url, parentId, type ) {
    console.log('++++ updateList', url, parentId, type);
    const results = await fetch(url);
    const responseData = await results.json();

    if( type === 'bloque' ) {
        await renderBloques( responseData );
    }
    else if( type === 'piso' ) {
        await renderItems( renderPiso, responseData, parentId, 'piso-'+parentId );
    }
    else if( type === 'piso-inmueble' ) {
        await renderItems( renderPisoInmueble, responseData, parentId, 'piso-'+parentId );
    }
    else if( type === 'bano' ) {
        await renderItems( renderBano, responseData, parentId, 'piso-bano-'+parentId );
    }
    else if( type === 'cocina' ) {
        await renderItems( renderCocina, responseData, parentId, 'piso-cocina-'+parentId );
    }
    else if( type === 'dormitorio' ) {
        await renderItems( renderDormitorio, responseData, parentId, 'piso-dormitorio-'+parentId );
    }
    else if( type === 'otro' ) {
        await renderItems( renderOtro, responseData, parentId, 'piso-otro-'+parentId );
    }
    else if( type === 'tinglado' ) {
        await renderItems( renderTinglado, responseData, parentId, 'bloque_area_tinglado' );
    }
    else if( type === 'graderia' ) {
        await renderItems( renderGraderia, responseData, parentId, 'bloque_area_graderia' );
    }
    else if( type === 'cancha' ) {
        await renderItems( renderCancha, responseData, parentId, 'bloque_area_cancha' );
    }
    else if( type === 'parqueo' ) {
        await renderItems( renderParqueo, responseData, parentId, 'bloque_parqueo' );
    }
    else if( type === 'baulera' ) {
        await renderItems( renderBaulera, responseData, parentId, 'bloque_baulera' );
    }
}