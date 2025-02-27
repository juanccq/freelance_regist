export const bloqueTemplate = `
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBloque__id__" 
            aria-expanded="false" aria-controls="collapseBloque__id__">
            <iconify-icon class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-success-500" icon="ph:circle-wavy-check"></iconify-icon>
            Bloque  __bloque#__
        </button>
    </h2>
    <div id="collapseBloque__id__" class="accordion-collapse collapse __bloque_show__" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="flex flex-wrap justify-between items-center mb-4 p-6">
                <div class="flex"></div>
                <div class="flex space-x-4 justify-end items-center rtl:space-x-reverse">
                    <a href="javascript:;" class="btn inline-flex justify-center btn-outline-success btn-sm rounded-[25px] modal-form-btn"
                        id="edit_bloque__id__"
                        data-url="__edit_url__"
                        data-list-url="__list_url__"
                        data-action="edit"
                        data-type="bloque"
                        data-title="Editar Bloque">
                        <span class="flex items-center">
                            <i class="fa fa-solid fa-pen-to-square  mr-2"></i>
                            <span>Editar Bloque</span>
                        </span>
                    </a>
                    <a href="javascript:;" class="btn inline-flex justify-center btn-outline-danger btn-sm rounded-[25px] modal-form-btn"
                        id="delete_bloque__id__"
                        data-url="__delete_url__"
                        data-list-url="__list_url__"
                        data-action="delete"
                        data-type="bloque">
                        <span class="flex items-center"><i class="fa fa-regular fa-trash-can mr-2"></i>
                            <span>Eliminar Bloque</span>
                        </span>
                    </a>
                </div>
            </div>
            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                    <tr>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">Fundaciones</h5>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> __fundaciones__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __fundaciones_estado__
                    </td>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">Estructura</h5>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> __estructura__ <br>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __estructura_estado__
                    </td>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">Muros </h5>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> __muros__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __muros_estado__
                    </td>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">Cubiertas </h5> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> __cubierta__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __cubierta_estado__
                    </td>
                    </tr>
                    <tr>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">Escaleras </h5>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> __escaleras__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __escaleras_estado__
                    </td>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">Barandas </h5> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> __barandas__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __barandas_estado__
                    </td>
                    </tr>
                    <tr>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">ESCALERAS ELECTROMECANICAS</h5> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Cantidad: __escalera_elec_cantidad__ <br>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Marca: __escalera_elec_marca__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Tamaño: __escalera_elec_tamano__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __escalera_elec_estado__ 
                    </td>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">PORTONES ELECTRICOS</h5> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Cantidad: __portones_elec_cantidad__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Material: __portones_elec_material__ <br> 
                    </td>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">ASCENSOR  </h5>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Cantidad: __ascensor_cantidad__ <br>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Marca: __ascensor_marca__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Pisos: __ascensor_pisos__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __ascensor_pisos__ 
                    </td>
                    <td class="table-td">
                        <h5 class="card-title text-slate-900">ASCENSOR VEHICULOS</h5>
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Cantidad: __ascensor_vehicular_cantidad__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Marca: __ascensor_vehicular_marca__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Pisos: __ascensor_vehicular_pisos__ <br> 
                        <iconify-icon class="relative top-[1px]" icon="heroicons-outline:chevron-double-right"></iconify-icon> Estado: __ascensor_vehicular_estado__ 
                    </td>
                    </tr>
                    <tr>
                    </tr>
                </tbody>
            </table>

            <div class="p-6">
                <a href="javascript:;" class="btn btn-secondary block-btn modal-form-btn piso-btn-__bloque_id__"
                    id="add_piso__bloque_id__"
                    data-url="__add_piso_url__"
                    data-title="Registro de nuevo Piso"
                    data-type="piso"
                    data-action="add"
                    data-parent-id="__bloque_id__"
                    data-list-url="__list_piso_url__"> + Agregar Piso</a>
            </div>

            <div id="piso-__bloque_id__">
            __bloque_pisos__
            </div>
        </div>
    </div>
</div>
`;