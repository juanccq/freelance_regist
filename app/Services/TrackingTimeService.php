<?php

namespace App\Services;

use App\Models\User;
use App\Models\VwTrackingTime;
use App\Jobs\GenerateCsvAndSendEmail;

class TrackingTimeService
{

    public function sendReport()
    {

        $userId = auth()->user()->id;
        $trackingTime = VwTrackingTime::where('user_id', $userId)->get()->toArray();
        // $email = auth()->user()->email;
        $email = 'juan.c.c.q@gmail.com';

        GenerateCsvAndSendEmail::dispatch($email, $trackingTime);
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

    public function buildQuery($model, $search)
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
}
