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
    $items = Item::all();
    return view('items.index', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
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
    $request->validate([
      'name' => 'required',
      'disposable' => 'required',
      'stock' => 'required',
      'description' => 'required',
      'status' => 'required',
      'category_id' => 'required',
      'work_unit_id' => 'required'
    ]);

    Item::create($request->all());
    return redirect()->route('items.index')->with('message', 'Data Aset baru berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function show(Item $item) {
    return view('items.show', compact('item'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function edit(Item $item) {
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
    $request->validate([
      'name' => 'required',
      'disposable' => 'required',
      'stock' => 'required',
      'description' => 'required',
      'status' => 'required',
      'category_id' => 'required',
      'work_unit_id' => 'required'
    ]);

    $item->update($request->all());

    return redirect()->route('items.index')->with('message', 'Data Aset yang dipilih berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function destroy(Item $item) {
    $item->delete();
    return redirect()->route('items.index')->with('message', 'Data Aset yang dipilih berhasil dihapus');
  }
}
