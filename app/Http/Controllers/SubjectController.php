<?php

namespace App\Http\Controllers;

use App\Core\Utill;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\PreparationType; // Assuming association with PreparationType

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::orderBy('display_order')->filter(['name' => $request->name])->paginate(Utill::perPageItem());

        return view('catalogue.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('catalogue.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->validated());


        return redirect()->route('subject.index')->with('success', 'Subject created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        // Consider including associated preparation types or other relevant data
        return view('catalogue.subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {

        return view('catalogue.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSubjectRequest  $request
     * @param  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());

        return redirect()->route('subject.index')->with('success', 'Subject updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully!');
    }
}
