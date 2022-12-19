<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkUnitRequest;
use App\Http\Requests\UpdateWorkUnitRequest;
use App\Models\WorkUnit;

class WorkUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkUnitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkUnit  $workUnit
     * @return \Illuminate\Http\Response
     */
    public function show(WorkUnit $workUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkUnit  $workUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkUnit $workUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkUnitRequest  $request
     * @param  \App\Models\WorkUnit  $workUnit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkUnitRequest $request, WorkUnit $workUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkUnit  $workUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkUnit $workUnit)
    {
        //
    }
}
