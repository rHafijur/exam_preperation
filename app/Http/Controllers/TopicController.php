<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use App\Models\Chapter;

class TopicsController extends Controller
{
    /**
     * Display a listing of topics for a chapter.
     *
     * @param Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function index(Chapter $chapter)
    {
        $topics = $chapter->topics;

        return view('topics.index', compact('topics', 'chapter'));
    }

    /**
     * Show the form for creating a new topic.
     *
     * @param Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function create(Chapter $chapter)
    {
        return view('topics.create', compact('chapter'));
    }

    /**
     * Store a newly created topic in storage.
     *
     * @param  StoreTopicRequest  $request
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request, Chapter $chapter)
    {
        $topic = $chapter->topics()->create($request->validated());

        return redirect()->route('topics.index', $chapter)->with('success', 'Topic created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTopicRequest  $request
     * @param  Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $topic->update($request->validated());

        return redirect()->route('topics.index', $topic->chapter)->with('success', 'Topic updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index', $topic->chapter)->with('success', 'Topic deleted successfully!');
    }
}