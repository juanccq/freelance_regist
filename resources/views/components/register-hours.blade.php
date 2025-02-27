@if(auth()->check() && !auth()->user()->is_admin)
<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">¡Atención!</strong>
    <span class="block sm:inline">Recuerda que debes registrar tus horas trabajadas.</span>
</div>

<form method="POST" action="{{ route('tracking-time.store') }}">
    @csrf

    <div>
        <x-label for="project" value="{{ __('Proyecto') }}" />
        <select id="project" class="block mt-1 w-full" name="project" required>
            <option value="">Selecciona un proyecto</option>
            @foreach($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <x-label for="tasks" value="{{ __('Tarea') }}" />
        <select id="tasks" class="block mt-1 w-full" name="tasks" required>
            <option value="">Selecciona una tarea</option>
            @foreach($tasks as $task)
            <option value="{{ $task->id }}">{{ $task->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-4">
        <x-label for="description" value="{{ __('Descripción') }}" />
        <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="description" />
    </div>

    <div class="mt-4">
        <x-label for="date" value="{{ __('Fecha') }}" />
        <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autocomplete="date" />
    </div>

    <div>
        <x-label for="hours" value="{{ __('Horas trabajadas') }}" />
        <x-input id="hours" class="block mt-1 w-full" type="number" name="hours" :value="old('hours')" required autofocus autocomplete="hours" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ms-4">
            {{ __('Registrar horas') }}
        </x-button>
    </div>

</form>
@endif