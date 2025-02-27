<?php $is_read = isset($is_read) ? $is_read : false; ?>
@csrf
<!-- BEGIN: Form -->
<div class="card">
    <div class="card-body flex flex-col p-6">
        <div class="card-text h-full ">
            <div class="from-group">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    <div class="input-area">
                        <label for="name">Project</label>
                        <select name="project_id" id="" class="form-control" required>
                            @foreach($projects as $project)
                            <option value="{{ $project->id }}"
                                @isset($entity) @if($entity->project_id === $project->id) selected="selected" @endif @endisset>
                                {{ $project->name }}
                            </option>
                            @endforeach
                        </select>

                        @if($errors->has('project_id'))
                        <p class="help-block">
                            {{ $errors->first('project_id') }}
                        </p>
                        @endif
                    </div>
                    <div class="flex justify-between items-end space-x-6">
                        <div class="input-area w-full">
                            <label for="code">Task</label>
                            <select name="task_id" id="" class="form-control" required>
                                @foreach($tasks as $task)
                                <option value="{{ $task->id }}"
                                    @isset($entity) @if($entity->task_id === $task->id) selected="selected" @endif @endisset>
                                    {{ $task->name }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('task_id'))
                            <p class="help-block">
                                {{ $errors->first('task_id') }}
                            </p>
                            @endif
                        </div>
                    </div>

                    <div class="input-area">
                        <label for="date">Date</label>
                        <input type="text" name="date" id="date"
                            value="{{ isset($entity) ? $entity->date : date('Y-m-d') }}"
                            class="form-control py-2 flatpickr flatpickr-input active" required>

                        @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                        @endif
                    </div>
                    <div class="flex justify-between items-end space-x-6">
                        <div class="input-area w-full">
                            <label for="duration_minutes">Duration</label>
                            <input type="number" name="duration_minutes"
                                value="{{ isset($entity) ? $entity->duration_minutes : 1 }}"
                                class="form-control" min="1" required>

                            @if($errors->has('duration_minutes'))
                            <p class="help-block">
                                {{ $errors->first('duration_minutes') }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-group">
                @if(!$is_read)
                <button class="btn btn-xl inline-flex justify-center btn-success mt-5 mr-6 ml-auto">
                    <span class="flex items-center">
                        <i class="fa-solid fa-save text-xl ltr:mr-2 rtl:ml-2 "></i>
                        <span>Guardar</span>
                    </span>
                </button>
                @endif
                <a href="{{ route('dashboard') }}" class="btn btn-sm inline-flex justify-center btn-danger mt-5 ml-auto">
                    <span class="flex items-center">
                        <i class="fa-solid fa-ban text-xl ltr:mr-2 rtl:ml-2 "></i>
                        <span>Cancelar</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END: Form -->