<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Item;
use App\Models\Room;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $items = Item::where('is_active', '=', 1)->where('condition', '=', 'Layak Pakai')->get();
    return view('transactions.index', compact('items'));
  }

  public function history() {
    $transactions = Transaction::orderBy('id', 'desc')->get();
    return view('transactions.history', compact('transactions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request) {
    $item = Item::find($request->id);
    $rooms = Room::all();
    return view('transactions.create', compact(['item', 'rooms']));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreTransactionRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreTransactionRequest $request) {
    $request->validate([
      'recipient_name' => 'required',
      'quantity' => 'required',
      'status' => 'required',
      'user_id' => 'required',
      'item_id' => 'required',
      'room_id' => 'required'
    ]);

    $isDisposable = Item::where('id', '=', $request->item_id)->value('is_disposable');

    Transaction::create([
      'recipient_name' => $request->recipient_name,
      'quantity' => $request->quantity,
      'checkout_date' => Carbon::now(),
      'status' => $isDisposable ? 'Selesai' : 'Pending',
      'user_id' => $request->user_id,
      'item_id' => $request->item_id,
      'room_id' => $request->room_id
    ]);
    return redirect()->route('transactions.index')->with('message', $isDisposable);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function show(Transaction $transaction) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function edit(Transaction $transaction) {
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateTransactionRequest  $request
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateTransactionRequest $request, Transaction $transaction) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function destroy(Transaction $transaction) {
    //
  }
}
