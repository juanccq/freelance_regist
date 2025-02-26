export const tingladoTemplate = `
<div class="accordion-item">
    <h2 class="accordion-header" id="heading__tinglado#__">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <iconify-icon class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-success-500" icon="ph:circle-wavy-check"></iconify-icon>
        Tinglado __tinglado#__ - Superficie del predio: __superficie__ mts2
        </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="heading__tinglado#__" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="flex flex-wrap justify-between items-center mb-4 p-6">
                <div class="flex"></div>
                <div class="flex space-x-4 justify-end items-center rtl:space-x-reverse">
                <a href="javascript:;" class="btn inline-flex justify-center btn-outline-success btn-sm rounded-[25px] modal-form-btn"
                    id="edit_tinglado__parent_id__-__id__"
                    data-url="__edit_tinglado_url__"
                    data-list-url="__list_tinglado_url__"
                    data-action="edit"
                    data-type="tinglado"
                    data-parent-id="__parent_id__"
                    data-title="Editar Tinglado">
                    <span class="flex items-center"><i class="fa fa-solid fa-pen-to-square  mr-2"></i>
                        <span>Editar Tinglado</span>
                    </span>
                </a>
                <a href="javascript:;" class="btn inline-flex justify-center btn-outline-danger btn-sm rounded-[25px] modal-form-btn"
                    id="delete_tinglado__parent_id__-__id__"
                    data-url="__delete_tinglado_url__"
                    data-list-url="__list_tinglado_url__"
                    data-action="delete"
                    data-type="tinglado"
                    data-parent-id="__parent_id__"
                    data-title="Eliminar Tinglado">
                    <span class="flex items-center"><i class="fa fa-regular fa-trash-can mr-2"></i>
                        <span>Eliminar Tinglado</span>
                    </span>
                </a>
                </div>
            </div>
            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                <tr>
                    <td class="table-td text-transform-none">
                        Fundaciones (__fundaciones__) <br> 
                        Material: __fundaciones_material__ <br> 
                        Estado: __fundaciones_estado__
                    </td>
                    <td class="table-td text-transform-none">
                        Estructura (__estructura__) <br> 
                        Material: __estructura_material__ <br> 
                        Estado: __estructura_estado__
                    </td>
                    <td class="table-td text-transform-none">
                        Muros (__muros__) <br> 
                        Material: __muros_material__ <br> 
                        Estado: __muros_estado__
                    </td>
                </tr>
                <tr>
                    <td class="table-td text-transform-none">
                        Cubierta (__cubierta__) <br> 
                        Material: __cubierta_material__ <br> 
                        Estado: __cubierta_estado__
                    </td>
                    <td class="table-td text-transform-none">
                        Pisos (__pisos__) <br> 
                        Material: __pisos_material__ <br> 
                        Estado: __pisos_estado__
                    </td>
                    <td class="table-td text-transform-none">
                        Baño - Artefactos (__bano_artefactos__) <br> 
                        Incluye: __bano_elementos__ <br> 
                        Estado: __bano_artefactos_estado__
                    </td>
                </tr>
                <tr class="bg-slate-200 dark:bg-slate-700">
                    <td colspan="4" class="table-td">Colindancias</td>
                </tr>
                <tr>
                    <td class="table-td text-transform-none">Al Norte <br> __norte__</td>
                    <td class="table-td text-transform-none">Al Sur <br> __sur__</td>
                    <td class="table-td text-transform-none">Al Este <br> __este__</td>
                    <td class="table-td text-transform-none">Al Oeste <br> __oeste__</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
`;