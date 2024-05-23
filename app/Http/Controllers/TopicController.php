<?php

namespace App\Http\Controllers;

use App\Core\Utill;
use App\Models\Topic;
use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;

class TopicController extends Controller
{
    private function subjects()
    {
        return Subject::with('chapters')->orderBy('display_order')->get();
    }

    /**
     * Display a listing of topics for a chapter.
     *
     * @param Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = $this->subjects();
        $topics = Topic::with('chapter.subject')->filter(['name' => $request->name, 'chapter_id' => $request->chapter_id, 'subject_id' => $request->subject_id])->paginate(Utill::perPageItem());

        return view('catalogue.topic.index', compact('topics', 'subjects'));
    }

    /**
     * Show the form for creating a new topic.
     *
     * @param Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = $this->subjects();
        return view('catalogue.topic.create', compact('subjects'));
    }

    /**
     * Store a newly created topic in storage.
     *
     * @param  StoreTopicRequest  $request
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = Topic::create($request->validated());

        return redirect()->route('topic.index')->with('success', 'Topic created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $subjects = $this->subjects();
        $chapters = $topic->chapter->subject->chapters;
        return view('catalogue.topic.edit', compact('topic', 'subjects', 'chapters'));
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

        return redirect()->route('topic.index', $topic->chapter)->with('success', 'Topic updated successfully!');
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

        return redirect()->route('topic.index', $topic->chapter)->with('success', 'Topic deleted successfully!');
    }
}