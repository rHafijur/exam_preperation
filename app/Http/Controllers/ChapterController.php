<?php

namespace App\Http\Controllers;

use App\Core\Utill;
use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;

class ChapterController extends Controller
{
    private function subjects()
    {
        return Subject::orderBy('display_order')->get();
    }
    /**
     * Display a listing of chapters for a subject.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = $this->subjects();
        $chapters = Chapter::with('subject')->filter(['subject_id' => $request->subject_id])->paginate(Utill::perPageItem());

        return view('catalogue/chapter.index', compact('chapters', 'subjects'));
    }

    /**
     * Show the form for creating a new chapter.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = $this->subjects();
        return view('catalogue/chapter.create', compact('subjects'));
    }

    /**
     * Store a newly created chapter in storage.
     *
     * @param  StoreChapterRequest  $request
     * @param  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChapterRequest $request)
    {
        // dd($request->validated());
        $chapter = Chapter::create($request->validated());

        return redirect()->route('chapter.index')->with('success', 'Chapter created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        $subjects = $this->subjects();
        return view('catalogue/chapter.edit', compact('chapter', 'subjects'));
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

        return redirect()->route('chapter.index', $chapter->subject)->with('success', 'Chapter updated successfully!');
    }

    // ... (Optional methods like destroy can be added based on requirements)
}
