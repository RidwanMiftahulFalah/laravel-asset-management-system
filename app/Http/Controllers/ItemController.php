<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\WorkUnit;

class ItemController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $this->authorize('is-admin');

    $items = Item::all();
    return view('items.index', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $this->authorize('is-admin');

    $categories = Category::all();
    $workUnits = WorkUnit::all();
    return view('items.create', compact(['categories', 'workUnits']));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreItemRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreItemRequest $request) {
    $this->authorize('is-admin');

    $request->validate([
      'name' => 'required',
      'is_disposable' => 'required',
      'stock' => 'required',
      'condition' => 'required',
      'usage_permission' => 'required',
      'category_id' => 'required',
      'work_unit_id' => 'required'
    ]);

    Item::create([
      'name' => $request->name,
      'is_disposable' => $request->is_disposable,
      'stock' => $request->stock,
      'description' => $request->description,
      'condition' => $request->condition,
      'usage_permission' => $request->usage_permission,
      'is_active' => true,
      'category_id' => $request->category_id,
      'work_unit_id' => $request->work_unit_id
    ]);
    return redirect()->route('items.index')->with('message', 'Data Aset baru berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function show(Item $item) {
    $this->authorize('is-admin');

    return view('items.show', compact('item'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function edit(Item $item) {
    $this->authorize('is-admin');

    $categories = Category::all();
    $workUnits = WorkUnit::all();

    return view('items.edit', compact(['item', 'categories', 'workUnits']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateItemRequest  $request
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateItemRequest $request, Item $item) {
    $this->authorize('is-admin');

    $request->validate([
      'name' => 'required',
      'is_disposable' => 'required',
      'stock' => 'required',
      'description' => 'required',
      'category_id' => 'required',
      'work_unit_id' => 'required'
    ]);

    $item->update($request->all());

    return redirect()->route('items.index')->with('message', 'Data Aset yang dipilih berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function destroy(Item $item) {
    $this->authorize('is-admin');

    $message = 'Data Aset yang dipilih berhasil ' . ($item->is_active ? 'dinonaktifkan.' : 'diaktifkan.');

    // For toggling item status, if the item status is active it will be updated to nonactive, vice-versa
    $item->update($item->is_active ? ['is_active' => 0] : ['is_active' => 1]);
    return redirect()->route('items.index')->with('message', $message);
  }
}
