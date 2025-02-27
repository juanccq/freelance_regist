@extends('layouts.app')
@section('title') Cambiar Contraseña @stop
@section('top_title') Cambiar Contraseña @stop
@section('content')
<div class="card">
    <div class="card-body flex flex-col p-6">
        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">Cambiar Contraseña</div>
            </div>
        </header>
        <div class="card-text h-full">
            <form action="{{route('profile.change-password-post')}}" method="POST" class="space-y-4 form_validate">
                <!-- BEGIN: Form -->
                <div class="from-group">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="new_password" class="form-label">Nueva contraseña</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Nueva Contraseña" required minlength="5">

                            @if($errors->has('new_password'))
                            <p class="help-block">
                                {{ $errors->first('new_password') }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="from-group">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="new_password_repeated" class="form-label">Repetir nueva contraseña</label>
                            <input type="password" name="new_password_repeated" class="form-control" placeholder="Repetir nueva contraseña" required minlength="5">

                            @if($errors->has('new_password_repeated'))
                            <p class="help-block">
                                {{ $errors->first('new_password_repeated') }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="btn-group">
                    <button class="btn btn-xl inline-flex justify-center btn-success mt-5 mr-6 ml-auto">
                        <span class="flex items-center">
                            <i class="fa-solid fa-save text-xl ltr:mr-2 rtl:ml-2 "></i>
                            <!-- <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons-outline:save"></iconify-icon> -->
                            <span>Guardar</span>
                        </span>
                    </button>
                </div>
                <!-- END: Form -->
            </form>
        </div>
    </div>
</div> <!-- .card -->
@stop