@extends('layouts.app')
@section('title') Historial @stop
@section('top_title') Historial @stop
@section('content')
@include('partials.breadcumbs')
<div class="card">
    <header class=" card-header noborder">
        <h4 class="card-title">@yield('top_title')</h4>
        @yield('top_button')
    </header>
    <div class="card-body px-6 pb-6">
        <div class="overflow-x-auto -mx-6 dashcode-data-table">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden ">
            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                <thead class="bg-slate-200 dark:bg-slate-700">
                <tr>
                    <th scope="col" class=" table-th ">
                        Nombre
                    </th>
                    <th scope="col" class=" table-th ">
                        Cargo
                    </th>
                    <th scope="col" class=" table-th ">
                        Telefono
                    </th>
                    <th scope="col" class=" table-th ">
                        Fecha de alta
                    </th>
                    <th scope="col" class=" table-th ">
                        Fecha de baja
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                    @foreach ($entidad->encargados as $encargado)
                        @if( in_array( config('global.rolenames.admin-entidad'), $encargado->getRoleNames()->toArray() ) )
                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                <td class="table-td">{{ $encargado->name }}</td>
                                <td class="table-td">{{ $encargado->cargo }}</td>
                                <td class="table-td">{{ $encargado->telefono }}</td>
                                <td class="table-td">{{ $encargado->entidadUser->created_at->format('d/m/Y') }}</td>
                                <td class="table-td">
                                    @if(!is_null( $encargado->entidadUser->updated_at ) and $encargado->entidadUser->activo == 0)
                                        {{ $encargado->entidadUser->updated_at->format('d/m/Y') }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div> <!-- .card -->
@stop
