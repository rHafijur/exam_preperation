<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreparationTypeRequest;
use App\Http\Requests\UpdatePreparationTypeRequest;
// use App\Http\Requests\ShowPreparationTypeRequest;
use App\Models\PreparationType;

class PreparationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preparationTypes = PreparationType::all();

        return view('preparation_types.index', compact('preparationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preparation_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePreparationTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreparationTypeRequest $request)
    {
        $preparationType = PreparationType::create($request->validated());

        return redirect()->route('preparation_types.index')->with('success', 'Preparation type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  ShowPreparationTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function show( PreparationType $preparationType)
    {
        return view('preparation_types.show', compact('preparationType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PreparationType $preparationType
     * @return \Illuminate\Http\Response
     */
    public function edit(PreparationType $preparationType)
    {
        return view('preparation_types.edit', compact('preparationType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePreparationTypeRequest  $request
     * @param  PreparationType $preparationType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePreparationTypeRequest $request, PreparationType $preparationType)
    {
        $preparationType->update($request->validated());

        return redirect()->route('preparation_types.index')->with('success', 'Preparation type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PreparationType $preparationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreparationType $preparationType)
    {
        $preparationType->delete();

        return redirect()->route('preparation_types.index')->with('success', 'Preparation type deleted successfully!');
    }
}