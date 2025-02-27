export const pisoInmuebleTemplate = `
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBloque__piso#__" aria-expanded="false" aria-controls="collapseBloque">
        <iconify-icon class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-success-500" icon="ph:circle-wavy-check"></iconify-icon>
        Denominación: __piso_title__
        </button>
    </h2>
    <div id="collapseBloque__piso#__" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="flex flex-wrap justify-between items-center mb-4">
                <div class="flex"></div>
                <div class="flex space-x-4 justify-end items-center rtl:space-x-reverse">
                    <a href="javascript:;" class="btn inline-flex justify-center btn-outline-success btn-sm rounded-[25px] modal-form-btn"
                            id="edit_piso__bloque_id__-__id__"
                            data-url="__edit_piso_url__"
                            data-list-url="__list_piso_url__"
                            data-action="edit"
                            data-type="piso-inmueble"
                            data-parent-id="__bloque_id__"
                            data-title="Editar Piso">
                        <span class="flex items-center"><i class="fa fa-solid fa-pen-to-square mr-2"></i>
                            <span>Editar Piso</span>
                        </span>
                    </a>
                    <a href="javascript:;" class="btn inline-flex justify-center btn-outline-danger btn-sm rounded-[25px] modal-form-btn"
                        id="delete_piso__bloque_id__-__id__"
                        data-url="__delete_piso_url__"
                        data-list-url="__list_piso_url__"
                        data-action="delete"
                        data-type="piso-inmueble"
                        data-parent-id="__bloque_id__"
                        data-title="Eliminar Piso">
                        <span class="flex items-center"><i class="fa fa-regular fa-trash-can mr-2"></i>
                            <span>Eliminar Piso</span>
                        </span>
                    </a>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-body p-6">
                    <div class="card-text">
                        <p class="text-slate-600 dark:text-slate-300 mb-6"> <span class="text-lg">Descripción:</span> __piso_descripcion__</p>
                        <a href="javascript:;" class="btn btn-info modal-form-btn"
                            id="add_bano__bloque_id__-__id__"
                            data-url="__add_bano_url__"
                            data-list-url="__list_bano_url__"
                            data-action="add"
                            data-type="bano"
                            data-parent-id="__bloque_id__-__id__"
                            data-title="Agregar Baño">
                            + Agregar Baño
                        </a>
                        <a href="javascript:;" class="btn btn-warning modal-form-btn"
                            id="add_cocina__bloque_id__-__id__"
                            data-url="__add_cocina_url__"
                            data-list-url="__list_cocina_url__"
                            data-action="add"
                            data-type="cocina"
                            data-parent-id="__bloque_id__-__id__"
                            data-title="Agregar Cocina"> + Agregar Cocina</a>
                        <a href="javascript:;" class="btn btn-success modal-form-btn"
                            id="add_dormitorio__bloque_id__-__id__"
                            data-url="__add_dormitorio_url__"
                            data-list-url="__list_dormitorio_url__"
                            data-action="add"
                            data-type="dormitorio"
                            data-parent-id="__bloque_id__-__id__"
                            data-title="Agregar Dormitorio"> + Agregar Dormitorio</a>
                        <a href="javascript:;" class="btn btn-light modal-form-btn"
                            id="add_otro__bloque_id__-__id__"
                            data-url="__add_otro_url__"
                            data-list-url="__list_otro_url__"
                            data-action="add"
                            data-type="otro"
                            data-parent-id="__bloque_id__-__id__"
                            data-title="Agregar Otro"> + Agregar Otro</a>

                        <div id="piso-bano-__bloque_id__-__id__">
                            __piso_banos__
                        </div>
                        <div id="piso-cocina-__bloque_id__-__id__">
                            __piso_cocinas__
                        </div>
                        <div id="piso-dormitorio-__bloque_id__-__id__">
                            __piso_dormitorios__
                        </div>
                        <div id="piso-otro-__bloque_id__-__id__">
                            __piso_otros__
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
`;