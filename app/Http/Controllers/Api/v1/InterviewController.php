<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Interview;
use App\Models\InterviewHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::get();

        return response()->json([
            'count' => $interviews->count(),
            'data' => $interviews,
        ]);
    }

    public function store(Request $request)
    {
        $interview = Interview::create($request->all());

        return response()->json([
            'message' => 'Interview store successfully!'
        ], 201);
    }

    public function show(Interview $interview)
    {
        return response()->json([
            'message' => 'Detail interview',
            'data' => $interview,
        ]);
    }

    public function reschedule(Request $request, Interview $interview)
    {
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview reschedule from {$interview->date} to {$request->new_date}"
        ]);

        $interview->date = $request->new_date;
        $interview->update();

        return response()->json([
            'message' => 'Interview reschedule',
        ]);
    }


    public function cancel(Request $request, Interview $interview)
    {
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview has canceled"
        ]);

        $interview->active = 0;
        $interview->status_finished = 'Canceled';
        $interview->update();

        return response()->json([
            'message' => 'Interview canceled',
        ]);
    }

    public function finish(Request $request, Interview $interview)
    {
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview has finished"
        ]);

        $interview->active = 0;
        $interview->status_finished = 'Finished';
        $interview->update();

        return response()->json([
            'message' => 'Interview finished',
        ]);
    }
}
