export const graderiaTemplate = `
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <iconify-icon class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-success-500" icon="ph:circle-wavy-check"></iconify-icon>
            Gradería __graderia#__ - Superficie del predio: __superficie__ mts2
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="flex flex-wrap justify-between items-center mb-4 p-6">
                <div class="flex"></div>
                <div class="flex space-x-4 justify-end items-center rtl:space-x-reverse">
                <a href="javascript:;" class="btn inline-flex justify-center btn-outline-success btn-sm rounded-[25px] modal-form-btn"
                    id="edit_graderia__parent_id__-__id__"
                    data-url="__edit_graderia_url__"
                    data-list-url="__list_graderia_url__"
                    data-action="edit"
                    data-type="graderia"
                    data-parent-id="__parent_id__"
                    data-title="Editar Gradería">
                    <span class="flex items-center"><i class="fa fa-solid fa-pen-to-square  mr-2"></i>
                        <span>Editar Gradería</span>
                    </span>
                </a>
                <a href="javascript:;" class="btn inline-flex justify-center btn-outline-danger btn-sm rounded-[25px] modal-form-btn"
                    id="delete_graderia__parent_id__-__id__"
                    data-url="__delete_graderia_url__"
                    data-list-url="__list_graderia_url__"
                    data-action="delete"
                    data-type="graderia"
                    data-parent-id="__parent_id__"
                    data-title="Eliminar Gradería">
                    <span class="flex items-center"><i class="fa fa-regular fa-trash-can mr-2"></i>
                        <span>Eliminar Gradería</span>
                    </span>
                </a>
                </div>
            </div>
            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                <tr>
                    <td class="table-td text-transform-none">Medidas <br> __medidas__ ml</td>
                    <td class="table-td text-transform-none">Estructura <br> __estructura__</td>
                    <td class="table-td text-transform-none">Estado <br> __estado__</td>
                    
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