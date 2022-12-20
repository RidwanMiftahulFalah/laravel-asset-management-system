<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('categories.index', [
      'categories' => Category::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('categories.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreCategoryRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCategoryRequest $request) {
    $request->validate([
      'name' => 'required'
    ]);

    Category::create($request->all());
    return redirect()->route('categories.index')->with('message', 'Kategori berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category) {
    return view('categories.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateCategoryRequest  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCategoryRequest $request, Category $category) {
    $request->validate([
      'name' => 'required'
    ]);

    $category->update($request->all());
    return redirect()->route('categories.index')->with('message', 'Data Kategori Berhasil Diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category) {
    $category->delete();
    return redirect()->route('categories.index')->with('message', 'Kategori berhasil dihapus.');
  }
}
