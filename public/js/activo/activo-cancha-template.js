export const canchaTemplate = `
<div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <iconify-icon class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-success-500" icon="ph:circle-wavy-check"></iconify-icon>
            Cancha __cancha#__ - Superficie del predio: __superficie__ mts2
        </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="flex flex-wrap justify-between items-center mb-4 p-6">
                <div class="flex"></div>
                <div class="flex space-x-4 justify-end items-center rtl:space-x-reverse">
                    <a href="javascript:;" class="btn inline-flex justify-center btn-outline-success btn-sm rounded-[25px] modal-form-btn"
                        id="edit_cancha__parent_id__-__id__"
                        data-url="__edit_cancha_url__"
                        data-list-url="__list_cancha_url__"
                        data-action="edit"
                        data-type="cancha"
                        data-parent-id="__parent_id__"
                        data-title="Editar Cancha">
                        <span class="flex items-center"><i class="fa fa-solid fa-pen-to-square  mr-2"></i>
                            <span>Editar Cancha</span>
                        </span>
                    </a>
                    <a href="javascript:;" class="btn inline-flex justify-center btn-outline-danger btn-sm rounded-[25px] modal-form-btn"
                        id="delete_cancha__parent_id__-__id__"
                        data-url="__delete_cancha_url__"
                        data-list-url="__list_cancha_url__"
                        data-action="delete"
                        data-type="cancha"
                        data-parent-id="__parent_id__"
                        data-title="Eliminar Cancha">
                        <span class="flex items-center"><i class="fa fa-regular fa-trash-can mr-2"></i>
                            <span>Eliminar Cancha</span>
                        </span>
                    </a>
                </div>
            </div>
            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                <tr>
                    <td colspan="2" class="table-td text-transform-none">__detalle__</td>
                    <td colspan="2" class="table-td text-transform-none">Medidas: __superficie__ mts2</td>
                    
                </tr>
                <tr>
                    <td class="table-td text-transform-none">
                        Pisos (__pisos__) <br> 
                        Material: __pisos_material__ <br> 
                        Estado: __pisos_estado__
                    </td>
                    <td class="table-td text-transform-none">
                        Parantes (__parantes__) <br> 
                        Material: __parantes_material__ <br> 
                        Estado: __parantes_estado__
                    </td>
                    <td class="table-td text-transform-none">
                        Tableros (__tableros__) <br> 
                        Material: __tableros_material__ <br> 
                        Estado: __tableros_estado__
                    </td>
                    <td class="table-td text-transform-none"> 
                        Alumbrado (__alumbrado__) <br> 
                        Estado: __alumbrado_estado__</td>
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