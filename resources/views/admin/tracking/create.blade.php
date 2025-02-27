@extends('layouts.app')
@section('title') New Tracking Time @stop
@section('content')
<div class="card">
    <div class="card-body flex flex-col p-6">
        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">New Tracking Time</div>
            </div>
        </header>
        <div class="card-text h-full">
            @php($is_edit = false)
            @php($entity = null)
            <form action="{{ route('tracking.store') }}" class="space-y-4 form_validate" method="POST">
                @include('admin.tracking.form')
            </form>
        </div>
    </div>
</div>
@stop