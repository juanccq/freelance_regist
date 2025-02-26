@extends('layouts.app')
@section('title') Edit Time @stop
@section('top_title') Edit Time @stop
@section('content')
<div class="card">
    <div class="card-body flex flex-col p-6">
        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">Edit Time</div>
            </div>
        </header>
        @php($is_edit = true)
        <form action="{{ route('tracking.update', ['tracking_time' => $entity->id]) }}" class="space-y-4 form_validate" method="POST">
            @method('PUT')
            @include('admin.tracking.form')
        </form>
    </div>
</div> <!-- .card -->
@stop