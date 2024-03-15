<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMcqQuestionRequest;
use App\Http\Requests\UpdateMcqQuestionRequest;
use App\Models\McqQuestion;
use App\Models\Chapter;
use App\Models\Topic;

class McqQuestionController extends Controller
{
    /**
     * Display a listing of MCQ questions for a topic.
     *
     * @param Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function index(Topic $topic)
    {
        $mcqQuestions = $topic->mcqQuestions;

        return view('mcq_questions.index', compact('mcqQuestions', 'topic'));
    }

    /**
     * Show the form for creating a new MCQ question.
     *
     * @param Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function create(Topic $topic)
    {
        return view('mcq_questions.create', compact('topic'));
    }

        /**
     * Store a newly created MCQ question in storage.
     *
     * @param  StoreMcqQuestionRequest  $request
     * @param  Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMcqQuestionRequest $request, Topic $topic)
    {
        $mcqQuestion = $topic->mcqQuestions()->create($request->validated());

        return redirect()->route('mcq_questions.index', $topic)->with('success', 'MCQ question created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  McqQuestion $mcqQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(McqQuestion $mcqQuestion)
    {
        return view('mcq_questions.edit', compact('mcqQuestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMcqQuestionRequest  $request
     * @param  McqQuestion $mcqQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMcqQuestionRequest $request, McqQuestion $mcqQuestion)
    {
        $mcqQuestion->update($request->validated());

        return redirect()->route('mcq_questions.index', $mcqQuestion->topic)->with('success', 'MCQ question updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  McqQuestion $mcqQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(McqQuestion $mcqQuestion)
    {
        $mcqQuestion->delete();

        return redirect()->route('mcq_questions.index', $mcqQuestion->topic)->with('success', 'MCQ question deleted successfully!');
    }
}