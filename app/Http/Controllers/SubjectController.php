<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\PreparationType; // Assuming association with PreparationType

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preparationTypes = PreparationType::all(); // For selecting associated preparation type

        return view('subjects.create', compact('preparationTypes'));
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

        // Attach the subject to the selected preparation type(s) (if applicable)
        $subject->preparationTypes()->attach($request->preparation_type_ids);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully!');
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
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $preparationTypes = PreparationType::all(); // For selecting associated preparation types
        
        return view('subjects.edit', compact('subject', 'preparationTypes'));
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

        // Update the attached preparation types based on the request
        $subject->preparationTypes()->sync($request->preparation_type_ids);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
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

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
    }
}