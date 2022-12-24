<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;

class RoomController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $rooms = Room::all();
    return view('rooms.index', compact('rooms'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('rooms.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreRoomRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRoomRequest $request) {
    $request->validate([
      'name' => 'required'
    ]);

    Room::create($request->all());
    return redirect()->route('rooms.index')->with('message', 'Data Ruangan baru berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Room  $room
   * @return \Illuminate\Http\Response
   */
  public function show(Room $room) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Room  $room
   * @return \Illuminate\Http\Response
   */
  public function edit(Room $room) {
    return view('rooms.edit', compact('room'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateRoomRequest  $request
   * @param  \App\Models\Room  $room
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRoomRequest $request, Room $room) {
    $request->validate([
      'name' => 'required'
    ]);

    $room->update($request->all());
    return redirect()->route('rooms.index')->with('message', 'Data Ruangan yang dipilih berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Room  $room
   * @return \Illuminate\Http\Response
   */
  public function destroy(Room $room) {
    $message = 'Data Ruangan yang dipilih berhasil ' . ($room->is_active ? 'dinonaktifkan.' : 'diaktifkan.');

    $room->update($room->is_active ? ['is_active' => 0] : ['is_active' => 1]);
    return redirect()->route('rooms.index')->with('message', $message);
  }
}
