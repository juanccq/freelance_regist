@extends('layouts.app')
@section('title') Historial @stop
@section('top_title') Historial @stop
@section('content')
<div class="space-y-5 profile-page">
    <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0 space-y-6 justify-between items-end relative z-[1]">
        <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>
        <div class="profile-box flex-none md:text-start text-center">
            <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                <div class="flex-none">
                    <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4 ring-slate-100 relative">
                        <img src="/images/users/user-ex.jpg" alt="perfil de usuario" class="w-full h-full object-cover rounded-full">
                    </div>
                </div>
                <div class="flex-1">
                    <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                        <a href="{{route('profile.change-password')}}">Cambiar contraseña</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- end profile box -->
        <div class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
            <!-- <div class="flex-1">
                <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                    412
                </div>
                <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                    Activos sin asignar
                </div>
            </div> -->
            <!-- end single -->

            <!-- end single -->
            <!-- <div class="flex-1">
                <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                    612
                </div>
                <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                    <strong>TOTAL de activos</strong>
                </div>
            </div> -->
            <!-- end single -->
        </div>
        <!-- profile info-500 -->
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="lg:col-span-4 col-span-12">
            <div class="card h-full">
                <header class="card-header">
                    <h4 class="card-title">Información</h4>
                </header>
                <div class="card-body p-6">
                    <ul class="list space-y-8">
                        <li class="flex space-x-3 rtl:space-x-reverse">
                            <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                <iconify-icon icon="heroicons:envelope"></iconify-icon>
                            </div>
                            <div class="flex-1">
                                <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                    EMAIL
                                </div>
                                <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50">
                                    {{ Auth::user()->email }}
                                </a>
                            </div>
                        </li>
                        <!-- end single list -->
                        <!-- <li class="flex space-x-3 rtl:space-x-reverse">
                            <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                <iconify-icon icon="heroicons:phone-arrow-up-right"></iconify-icon>
                            </div>
                            <div class="flex-1">
                                <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                    TELÉFONO
                                </div>
                                <a href="tel:0189749676767" class="text-base text-slate-600 dark:text-slate-50">
                                    {{ Auth::user()->telefono }}
                                </a>
                            </div>
                        </li> -->
                        <!-- end single list -->
                        <!-- <li class="flex space-x-3 rtl:space-x-reverse">
                            <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                            <iconify-icon icon="heroicons:map"></iconify-icon>
                            </div>
                            <div class="flex-1">
                            <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                OFICINA
                            </div>
                            <div class="text-base text-slate-600 dark:text-slate-50">
                                Avenida 16 de Julio # 320, Zona central, La Paz, Bolivia
                            </div>
                            </div>
                        </li> -->
                        <!-- end single list -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="lg:col-span-8 col-span-12">
            <div class="card ">
                <header class="card-header">
                    <h4 class="card-title">Otra información
                    </h4>
                </header>
                <div class="card-body">
                    <!-- <div id="areaChart"></div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop