<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\TrackingTime;
use App\Http\Requests\StoreTimeRequest;
use App\Http\Requests\UpdateTimeRequest;
use Session;

class TrackingTimeController extends Controller
{
    public function indexAjax(Request $request)
    {
        $filter = json_decode($request->input('json'), true);

        [$data, $total] = $this->getIndexResults($filter['search']['value']);
        // dd($data);

        $resultArray = [
            'draw'              => $filter['draw'],
            'recordsTotal'      => $total,
            'recordsFiltered'   => $total,
            'data'              => $data
        ];

        return response()->json($resultArray);
    }

    public function getIndexResults($search): array
    {
        $entities = $this->buildQuery('VwTrackingTime', $search);
        $data = [];

        foreach ($entities as $entity) {
            $data[] = [
                $entity->project,
                $entity->task,
                $entity->date,
                $entity->duration_minutes,
                $this->getActions($entity->id)
            ];
        }

        return [$data, $entities->count()];
    }

    protected function buildQuery($model, $search)
    {
        // dd($model);
        $viewObj = "\\App\\Models\\{$model}";
        $query = $viewObj::where('user_id', '1');

        $searchableFields = $viewObj::$searchableFields;;
        // DB::enableQueryLog();
        if (strlen($search > 0)) {

            $searchItems = explode(' ', $search);


            $query->where(function ($q) use ($searchableFields, $searchItems) {
                foreach ($searchableFields as $field) {
                    foreach ($searchItems as $part) {
                        $q->orWhere($field, 'like', '%' . $part . '%');
                    }
                }
            });
        }
        // $query->get();
        // dd(DB::getQueryLog());

        return $query->get();
    }

    protected function getActions(int $id, array $options = null)
    {
        if (is_null($options)) {
            $options = [
                'ver',
                'editar',
                'duplicar',
                'eliminar'
            ];
        }

        $actions = '<div class="flex space-x-3 rtl:space-x-reverse">
            <div class="relative">
                <div class="dropdown relative">
                    <button class="text-xl text-center block w-full " type="button" id="teamDropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                    </button>
                    <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">';

        if (in_array('editar', $options)) {
            $actions .= $this->getActionButton(route('tracking.edit', ['tracking_time' => $id]), 'Editar');
        }

        if (in_array('eliminar', $options)) {
            $actions .= '<li>
                            <a href="javascript:;" 
                                class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white deleteItem"
                                data-id="' . $id . '">
                                Eliminar
                            </a>
                        </li>';
        }

        $actions .= '</ul>
                </div>
            </div>
        </div>';

        return $actions;
    }

    private function getActionButton(string $route, string $title): string
    {
        return '<li>
                    <a href="' . $route . '" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600dark:hover:text-white">
                        ' . $title . '
                    </a>
                </li>';
    }

    public function create()
    {
        $projects = auth()->user()->projects;
        $tasks = Task::whereIn('project_id', $projects->pluck('id'))->get();

        return view('admin.tracking.create', compact('projects', 'tasks'));
    }

    public function store(StoreTimeRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $trackingTime = TrackingTime::create($data);

        return redirect()->route('dashboard');
    }

    public function edit(TrackingTime $trackingTime)
    {
        $entity = $trackingTime;
        $projects = auth()->user()->projects;
        $tasks = Task::whereIn('project_id', $projects->pluck('id'))->get();

        return view('admin.tracking.edit', compact('entity', 'projects', 'tasks'));
    }

    public function update(UpdateTimeRequest $request, TrackingTime $trackingTime)
    {
        $trackingTime->update($request->all());
        Session::flash('success', 'Successfully updated!');
        return redirect()->route('dashboard');
    }


    public function destroy(TrackingTime $trackingTime)
    {
        TrackingTime::destroy($trackingTime->id);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully deleted!'
        ]);
    }
}
