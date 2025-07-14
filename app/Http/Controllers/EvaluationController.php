<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEvaluationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvaluationRequest $request)
    {
        // return $request;
        try {
            $evaluation = new Evaluation();
            $evaluation->course_id = $request->courseId;
            $evaluation->student_id = Auth::id();
            $evaluation->course_content = $request->content;
            $evaluation->course_trainer = $request->trainer;
            $evaluation->course_exercises = $request->exercises;
            $evaluation->platform_ease = $request->platformEase;
            $evaluation->recommendation = $request->recommendation;
            $evaluation->save();
            return redirect()->back()->with(['success' => 'شكرا لتعبئة الاستبيان فذلك يساعدنا كثيرا لتطوير دوراتنا']);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم عملية الاضافة']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show($courseId)
    {
        try {
            $evaluations = Evaluation::with('course')->where('course_id', $courseId)->get();
            $evaluationCount = $this->evaluate($evaluations);
            return view("admin.course.list-evaluation")->with([
                'evaluationCount' => $evaluationCount,
                'evaluations' => $evaluations,
            ]);
        } catch (\Throwable$th) {
            return back()->with(['error' => 'لا توجد استبيانات لهذه الدورة لعرضها']);
        }

    }

    public function evaluate($evaluation)
    {
        $content = $this->getCountEvaluate($evaluation->map(function ($itm) {
            return $itm = $itm->course_content;
        }));
        $trainer = $this->getCountEvaluate($evaluation->map(function ($itm) {
            return $itm = $itm->course_trainer;
        }));
        $exercises = $this->getCountEvaluate($evaluation->map(function ($itm) {
            return $itm = $itm->course_exercises;
        }));
        $platformEase = $this->getCountEvaluate($evaluation->map(function ($itm) {
            return $itm = $itm->platform_ease;
        }));

        return [
            'content' => $content,
            'trainer' => $trainer,
            'exercises' => $exercises,
            'platformEase' => $platformEase,
        ];
    }

    public function getCountEvaluate($evaluate)
    {
        $ex = 0;
        $good = 0;
        $week = 0;
        $count = 0;
        foreach ($evaluate as $ev) {
            $count++;
            switch ($ev) {
                case '1':
                    $ex++;
                    break;
                case '2':
                    $good++;
                    break;
                case '3':
                    $week++;
                    break;
                default:
                    break;
            }
        }

        return [
            'excellent' => round(($ex * 100) / $count),
            'good' => round(($good * 100) / $count),
            'week' => round(($week * 100) / $count),
            'excellentDeg' => 360 * (round(($ex * 100) / $count) / 100),
            'goodDeg' => 360 * (round(($good * 100) / $count) / 100),
            'weekDeg' => 360 * (round(($week * 100) / $count) / 100),
            'count' => $count,
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvaluationRequest  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
