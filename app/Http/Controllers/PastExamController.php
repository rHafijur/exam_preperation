<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePastExamRequest;
use App\Models\PastExam;
use App\Models\PreparationType;

class PastExamController extends Controller
{
    /**
     * Display a listing of past exams for a preparation type.
     *
     * @param PreparationType $preparationType
     * @return \Illuminate\Http\Response
     */
    public function index(PreparationType $preparationType)
    {
        $pastExams = $preparationType->pastExams;

        return view('past_exams.index', compact('pastExams', 'preparationType'));
    }

    /**
     * Show the form for creating a new past exam.
     *
     * @param PreparationType $preparationType
     * @return \Illuminate\Http\Response
     */
    public function create(PreparationType $preparationType)
    {
        return view('past_exams.create', compact('preparationType'));
    }

    /**
     * Store a newly created past exam in storage.
     *
     * @param  StorePastExamRequest  $request
     * @param  PreparationType $preparationType
     * @return \Illuminate\Http\Response
     */
    public function store(StorePastExamRequest $request, PreparationType $preparationType)
    {
        $pastExam = $preparationType->pastExams()->create($request->validated());

        return redirect()->route('past_exams.index', $preparationType)->with('success', 'Past exam created successfully!');
    }

    // ... (Optional methods like edit, update, and delete can be added based on requirements)
}