<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\TrackingTime;
use App\Http\Requests\StoreTimeRequest;
use App\Http\Requests\UpdateTimeRequest;
use App\Services\TrackingTimeService;
use Session;

class TrackingTimeController extends Controller
{
    public function indexAjax(Request $request, TrackingTimeService $trackingTimeService)
    {
        $filter = json_decode($request->input('json'), true);

        [$data, $total] = $trackingTimeService->getIndexResults($filter['search']['value']);
        // dd($data);

        $resultArray = [
            'draw'              => $filter['draw'],
            'recordsTotal'      => $total,
            'recordsFiltered'   => $total,
            'data'              => $data
        ];

        return response()->json($resultArray);
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

    public function report(TrackingTimeService $trackingTimeService)
    {
        $trackingTimeService->sendReport();
        Session::flash('success', 'CSV generation started. You will receive an email shortly.');

        return redirect()->route('dashboard');
    }
}
