<?php

namespace App\Http\Controllers;

use App\Core\Utill;
use App\Models\PastExam;
use App\Models\PreparationType;
use App\Http\Requests\StorePastExamRequest;

class PastExamController extends Controller
{
    /**
     * Display a listing of past exams for a preparation type.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastExams = PastExam::orderBy('year', 'desc')->paginate(Utill::perPageItem());

        return view('catalogue.past_exam.index', compact('pastExams'));
    }

    /**
     * Show the form for creating a new past exam.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogue.past_exam.create');
    }

    /**
     * Store a newly created past exam in storage.
     *
     * @param  StorePastExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePastExamRequest $request)
    {
        $pastExam = PastExam::create($request->validated());

        return redirect()->route('past_exam.index')->with('success', 'Past exam created successfully!');
    }

    // ... (Optional methods like edit, update, and delete can be added based on requirements)
}
