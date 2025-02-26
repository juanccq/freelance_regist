<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="dark sf-js-enabled">

<head>
    @include('partials.head')
</head>

<body class=" font-inter dashcode-app" id="body_class">
    <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
    <main class="app-wrapper">
        <!-- BEGIN: Sidebar -->
        @include('partials.sidebar')
        <!-- End: Sidebar -->
        <!-- BEGIN: Settings -->
        @include('partials.settings')
        <!-- End: Settings -->
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <!-- BEGIN: Header -->
                @include('partials.header')
                <!-- END: Header -->
                <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <div id="content_layout">
                                @include('partials.messages')
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN: Modal Registro historico de encargados -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="large_modal" tabindex="-1" aria-labelledby="large_modal" aria-hidden="true">
                <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                rounded-md outline-none text-current">
                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-secondary-500">
                                <h3 class="text-xl font-medium text-white dark:text-white">
                                    Registro histórico de encargados
                                </h3>
                                <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                            dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                    11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Cerrra</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-4">
                                <h6 class="text-base text-slate-900 dark:text-white leading-6">
                                    %nombre_entidad%
                                </h6>
                                <!-- <p class="text-base text-slate-600 dark:text-slate-400 leading-6"></p> -->
                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 bg-slate-200 dark:bg-slate-700">
                                    <thead class="">
                                        <tr>

                                            <th scope="col" class=" table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700 ">
                                                #
                                            </th>

                                            <th scope="col" class=" table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700 ">
                                                Nombre
                                            </th>

                                            <th scope="col" class=" table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700 ">
                                                Cargo
                                            </th>

                                            <th scope="col" class=" table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700 ">
                                                Teléfono
                                            </th>

                                            <th scope="col" class=" table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700 ">
                                                Fecha de alta
                                            </th>

                                            <th scope="col" class=" table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700 ">
                                                Fecha de baja
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        <!-- rows will be added by JS -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-black-500">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Registro historico de encargados -->

            <!-- BEGIN: Footer For Desktop and tab -->
            <footer class="md:block hidden" id="footer">
                <div class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
                    <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">

                    </div>
                </div>
            </footer>
            <!-- END: Footer For Desktop and tab -->
            <div class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center
    backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
                <a href="">
                    <div>
                        <span class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900 ">
                            <iconify-icon icon="heroicons-outline:key"></iconify-icon>
                        </span>
                        <span class="block text-[11px] text-slate-600 dark:text-slate-300"> Contraseña </span>
                    </div>
                </a>
                <a href="profile.html" class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700 h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
                    <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
                        <img src="{{ asset('images/users/user-ex.jpg') }}" alt="" class="w-full h-full rounded-full border-2 border-slate-100">
                    </div>
                </a>
                <a href="#">
                    <div>
                        <span class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white text-slate-900">
                            <iconify-icon icon="heroicons:power"></iconify-icon>
                        </span>
                        <span class=" block text-[11px] text-slate-600 dark:text-slate-300"> Salir</span>
                    </div>
                </a>
            </div>
        </div>
    </main>
    </div>
    @include('partials.javascripts')
    @yield('javascripts_extra')
</body>

</html>