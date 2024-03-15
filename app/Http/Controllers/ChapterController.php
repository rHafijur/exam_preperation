<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Models\Chapter;
use App\Models\Subject;

class ChapterController extends Controller
{
    /**
     * Display a listing of chapters for a subject.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function index(Subject $subject)
    {
        $chapters = $subject->chapters;

        return view('chapters.index', compact('chapters', 'subject'));
    }

    /**
     * Show the form for creating a new chapter.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject)
    {
        return view('chapters.create', compact('subject'));
    }

    /**
     * Store a newly created chapter in storage.
     *
     * @param  StoreChapterRequest  $request
     * @param  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChapterRequest $request, Subject $subject)
    {
        $chapter = $subject->chapters()->create($request->validated());

        return redirect()->route('chapters.index', $subject)->with('success', 'Chapter created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        return view('chapters.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateChapterRequest  $request
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->validated());

        return redirect()->route('chapters.index', $chapter->subject)->with('success', 'Chapter updated successfully!');
    }

    // ... (Optional methods like destroy can be added based on requirements)
}