export const parqueoTemplate = `
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseParqueo__parqueo#__" aria-expanded="false" aria-controls="collapseParqueo__parqueo#__">
        <iconify-icon class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-success-500" icon="ph:circle-wavy-check"></iconify-icon>
        Parqueo __parqueo#__ - Superficie: __superficie__ mts2
        </button>
    </h2>
    <div id="collapseParqueo__parqueo#__" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <div class="flex flex-wrap justify-between items-center mb-4">
            <div class="flex"> </div>
            <div class="flex space-x-4 justify-end items-center rtl:space-x-reverse">
            <a href="javascript:;" class="btn inline-flex justify-center btn-outline-success btn-sm rounded-[25px] modal-form-btn"
                    id="edit_parqueo-__id__"
                    data-url="__edit_parqueo_url__"
                    data-list-url="__list_parqueo_url__"
                    data-action="edit"
                    data-type="parqueo"
                    data-parent-id=""
                    data-title="Editar Parqueo">
                <span class="flex items-center"><i class="fa fa-solid fa-pen-to-square  mr-2"></i>
                    <span>Editar Parqueo</span>
                </span>
            </a>
            <a href="javascript:;" class="btn inline-flex justify-center btn-outline-danger btn-sm rounded-[25px] modal-form-btn"
                    id="delete_parqueo-__id__"
                    data-url="__delete_parqueo_url__"
                    data-list-url="__list_parqueo_url__"
                    data-action="delete"
                    data-type="parqueo"
                    data-parent-id=""
                    data-title="Eliminar Parqueo">
                <span class="flex items-center"><i class="fa fa-regular fa-trash-can mr-2"></i>
                    <span>Eliminar Parqueo</span>
                </span>
            </a>
            </div>
        </div>
        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            <tr>
                <td class="table-td">
                    Pisos <br> 
                    Material: __pisos_material__ <br> 
                    Estado: __pisos_estado__ 
                </td>
                <td class="table-td">
                    Muros (__muros__)<br> 
                    Material: __muros_material__ <br> 
                    Estado: __muros_estado__
                </td>
                <td class="table-td">
                    Cubierta (__cubierta__) <br> 
                    Material: __cubierta_material__ <br> 
                    Estado: __cubierta_estado__
                </td>
                <td class="table-td">
                    Puerta (__puerta__) <br> 
                    Material: __puerta_material__ <br> 
                    Estado: __puerta_estado__
                </td>
                <td class="table-td">
                    Ventana (__ventana__) <br> 
                    Material: __ventana_material__ <br> 
                    Estado: __ventana_estado__
                </td>
            </tr>
            </tbody>
        </table>
        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            <thead>
                <tr class="bg-slate-200 dark:bg-slate-700">
                <td colspan="4" class="table-th">Colindancias</td>
                </tr>
            </thead>
            <tr>
                <td class="table-td">Al norte: __norte__ </td>
                <td class="table-td">Al sur: __sur__</td>
                <td class="table-td">Al este: __este__</td>
                <td class="table-td">Al oeste: __oeste__</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
`;