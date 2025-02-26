export const banoTemplate = `
<!-- Begin: Banio -->
<div class="bg-opacity-[0.16] dark:bg-opacity-[0.36] rounded-[6px] text-slate-900 dark:text-white relative overflow-hidden z-[1] bg-info-500 p-6 mt-6">
    <div class="overlay absolute right-0 top-0 w-full h-full z-[-1]">
        <img src="assets/images/all-img/big-shap2.png" alt="" class="ml-auto block">
    </div>
    <div class="flex flex-wrap justify-between items-center mb-4">
        <h4 class="text-xl mb-5 flex items-center text-xl">Baño __bano#__</h4>
        <div class="flex space-x-4 justify-end items-center rtl:space-x-reverse">
            <a href="javascript:;" class="btn inline-flex justify-center btn-outline-success btn-sm rounded-[25px] modal-form-btn"
                id="edit_bano__parent_id__-__id__"
                data-url="__edit_bano_url__"
                data-list-url="__list_bano_url__"
                data-action="edit"
                data-type="bano"
                data-parent-id="__parent_id__"
                data-title="Editar Baño">
                <span class="flex items-center"><i class="fa fa-solid fa-pen-to-square  mr-2"></i>
                    <span>Editar Baño</span>
                </span>
            </a>
            <a href="javascript:;" class="btn inline-flex justify-center btn-outline-danger btn-sm rounded-[25px] modal-form-btn"
                id="delete_bano__parent_id__-__id__"
                data-url="__delete_bano_url__"
                data-list-url="__list_bano_url__"
                data-action="delete"
                data-type="bano"
                data-parent-id="__parent_id__"
                data-title="Eliminar Baño">
                <span class="flex items-center"><i class="fa fa-regular fa-trash-can mr-2"></i>
                    <span>Eliminar Baño</span>
                </span>
            </a>
        </div>
    </div>
    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
        <tbody class="divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            <tr colspan="4" class="bg-slate-200 dark:bg-slate-700">
            <td class="table-td">En Suit: __en_suit__</td>
            </tr>
            <tr>
            <td class="table-td">
                Inodoro (__inodoro__)<br> 
                Calidad: __inodoro_calidad__ <br>
                Estado: __inodoro_estado__  
            </td>
            <td class="table-td">
                Bidet (__bidet__)<br> 
                Calidad: __bidet_calidad__ <br>
                Estado: __bidet_estado__  
            </td>
            <td class="table-td">
                Lavamanos (__lavamanos__)<br> 
                Calidad: __lavamanos_calidad__ <br>
                Estado: __lavamanos_estado__  
            </td>
            <td class="table-td">
                Tina (__tina__)<br> 
                Calidad: __tina_calidad__ <br>
                Estado: __tina_estado__  
            </td>
            </tr>
            <tr>
            <td class="table-td">
                Hidromasaje: (__hidromasaje__)<br> 
                Calidad: __hidromasaje_calidad__ <br>
                Estado: __hidromasaje_estado__  
            </td>
            <td class="table-td">
                Jacuzzi: (__jacuzzi__)<br> 
                Calidad: __jacuzzi_calidad__ <br>
                Estado: __jacuzzi_estado__  
            </td>
            <td class="table-td">
                Urinario: (__urinario__)<br> 
                Calidad: __urinario_calidad__ <br>
                Estado: __urinario_estado__  
            </td>
            <td class="table-td">
                Ducha: (__ducha__)<br> 
                Calidad: __ducha_calidad__ <br>
                Estado: __ducha_estado__  
            </td>
            </tr>
            <tr>
                <td class="table-td">
                    Cabina sanitaria: (__cabina_sanitaria__)<br> 
                    Calidad: __cabina_sanitaria_calidad__ <br>
                    Estado: __cabina_sanitaria_estado__  
                </td>
                <td class="table-td">
                    Puerta: (__puerta__)<br> 
                    Material: __puerta_material__ <br>
                    Estado: __puerta_estado__  
                </td>
                <td class="table-td">
                    Ventana: (__ventanas__)<br> 
                    Material: __ventanas_material__ <br>
                    Estado: __ventanas_estado__  
                </td>
                <td class="table-td">
                    Cabina box: (__cabina_box__)<br> 
                    Calidad: __cabina_box_material__ <br>
                    Estado: __cabina_box_estado__  
                </td>
            </tr>

            <tr>
                <td class="table-td">
                    Estantería: (__estanteria__)<br> 
                    Material: __estanteria_material__ <br>
                    Estado: __estanteria_estado__  
                </td>
                <td class="table-td">
                    Mezones: (__mezones__)<br> 
                    Material: __mezones_material__ <br>
                    Estado: __mezones_estado__  
                </td>
                <td class="table-td">
                    Pisos:<br> 
                    Material: __pisos_material__ <br>
                    Estado: __pisos_estado__  
                </td>
                <td class="table-td">
                    Cielos: <br> 
                    Material: __cielos_material__ <br>
                    Estado: __cielos_estado__  
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- End: Banio  -->
`;