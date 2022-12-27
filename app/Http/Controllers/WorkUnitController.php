<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkUnitRequest;
use App\Http\Requests\UpdateWorkUnitRequest;
use App\Models\WorkUnit;

class WorkUnitController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $this->authorize('is-admin');

    $workUnits = WorkUnit::all();
    return view('work_units.index', compact('workUnits'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $this->authorize('is-admin');

    return view('work_units.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreWorkUnitRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreWorkUnitRequest $request) {
    $this->authorize('is-admin');

    $request->validate([
      'name' => 'required'
    ]);

    WorkUnit::create([
      'name' => $request->name,
      'is_active' => 1
    ]);
    return redirect()->route('work_units.index')->with('message', 'Data Unit Kerja baru berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\WorkUnit  $workUnit
   * @return \Illuminate\Http\Response
   */
  public function show(WorkUnit $workUnit) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\WorkUnit  $workUnit
   * @return \Illuminate\Http\Response
   */
  public function edit(WorkUnit $workUnit) {
    $this->authorize('is-admin');

    return view('work_units.edit', compact('workUnit'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateWorkUnitRequest  $request
   * @param  \App\Models\WorkUnit  $workUnit
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateWorkUnitRequest $request, WorkUnit $workUnit) {
    $this->authorize('is-admin');

    $request->validate([
      'name' => 'required'
    ]);

    $workUnit->update($request->all());
    return redirect()->route('work_units.index')->with('message', 'Data Unit Kerja yang dipilih berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\WorkUnit  $workUnit
   * @return \Illuminate\Http\Response
   */
  public function destroy(WorkUnit $workUnit) {
    $this->authorize('is-admin');

    $message = 'Data Unit Kerja yang dipilih berhasil ' . ($workUnit->is_active ? 'dinonaktifkan.' : 'diaktifkan.');

    $workUnit->update($workUnit->is_active ? ['is_active' => 0] : ['is_active' => 1]);
    return redirect()->route('work_units.index')->with('message', $message);
  }
}
