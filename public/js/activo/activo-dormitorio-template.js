export const dormitorioTemplate = `
<!-- Begin: Dormitorio -->
<div class="bg-opacity-[0.16] dark:bg-opacity-[0.36] rounded-[6px] text-slate-900 dark:text-white relative overflow-hidden z-[1] bg-success-500 p-6 mt-6">
    <div class="overlay absolute right-0 top-0 w-full h-full z-[-1]">
        <img src="assets/images/all-img/big-shap3.png" alt="" class="ml-auto block">
    </div>
    <div class="flex flex-wrap justify-between items-center mb-4">
        <h4 class="text-xl mb-5 flex items-center text-xl">Dormitorio __dormitorio#__</h4>
        <div class="flex space-x-4 justify-end items-center rtl:space-x-reverse">
            <a href="javascript:;" class="btn inline-flex justify-center btn-outline-success btn-sm rounded-[25px] modal-form-btn"
                id="edit_dormitorio__parent_id__-__id__"
                data-url="__edit_dormitorio_url__"
                data-list-url="__list_dormitorio_url__"
                data-action="edit"
                data-type="dormitorio"
                data-parent-id="__parent_id__"
                data-title="Editar Dormitorio">
                <span class="flex items-center"><i class="fa fa-solid fa-pen-to-square  mr-2"></i>
                    <span>Editar Dormitorio</span>
                </span>
            </a>
            <a href="javascript:;" class="btn inline-flex justify-center btn-outline-danger btn-sm rounded-[25px] modal-form-btn"
                id="delete_dormitorio__parent_id__-__id__"
                data-url="__delete_dormitorio_url__"
                data-list-url="__list_dormitorio_url__"
                data-action="delete"
                data-type="dormitorio"
                data-parent-id="__parent_id__"
                data-title="Eliminar Dormitorio">
                <span class="flex items-center"><i class="fa fa-regular fa-trash-can mr-2"></i>
                    <span>Eliminar Dormitorio</span>
                </span>
            </a>
        </div>
    </div>
    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
        <tbody class="divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            <tr>
            <td class="table-td">
                Vestidor: (__vestidor__)
            </td>
            <td class="table-td">
                Ropero empotrado: (__ropero_empotrado__)<br> 
                Material: __ropero_empotrado_material__ <br>
                Estado: __ropero_empotrado_estado__
            </td>
            <td class="table-td">
                Puerta: (__puerta__)<br> 
                Material: __puerta_material__ <br>
                Estado: __puerta_estado__  
            </td>
            <td class="table-td">
                Ventanas: (__ventanas__)<br> 
                Material: __ventanas_material__ <br>
                Estado: __ventanas_estado__
            </td>
            </tr>
            <tr>
            <td class="table-td">
                Pisos <br> 
                Material: __pisos_material__ <br>
                Estado: __pisos_estado__
            </td>
            <td class="table-td">
                Cielos <br> 
                Material: __cielos_material__ <br>
                Estado: __cielos_estado__
            </td>
            <td class="table-td">
                Acabado Interior <br> 
                Material: __acabado_interior_material__ <br>
                Estado: __acabado_interior_estado__
            </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- End: Dormitorio -->
`;