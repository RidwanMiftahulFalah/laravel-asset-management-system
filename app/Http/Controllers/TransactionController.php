<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Item;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    if ($request->search) {
      $items = Item::where('name', 'like', '%' . $request->search . '%')->where('is_active', '=', 1)->where('condition', '=', 'Layak Pakai')->where('stock', '>=', 1)->paginate(10);
    } else {
      $items = Item::where('is_active', '=', 1)->where('condition', '=', 'Layak Pakai')->where('stock', '>=', 1)->paginate(10);
    }
    return view('transactions.index', compact('items'));
  }

  public function history() {
    $transactions = Transaction::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->paginate(10);
    return view('transactions.history', compact('transactions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request) {
    $item = Item::find($request->item_id);

    if ($item->stock < 1) {
      return redirect()->route('transactions.index')->with('error', 'Stok Aset kosong.');
    }

    if ($item->is_active == false) {
      return redirect()->route('transactions.index')->with('error', 'Aset berstatus nonaktif, silakan aktifkan terlebih dahulu.');
    }

    if ($item->condition !== 'Layak Pakai') {
      return redirect()->route('transactions.index')->with('error', 'Kondisi Aset tidak layak pakai (Rusak / Hilang), silakan perbarui data kondisi aset terlebih dahulu.');
    }

    return view('transactions.create', compact(['item']));
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
      'placement_location' => 'required'
    ]);

    $isDisposable = Item::where('id', '=', $request->item_id)->value('is_disposable');

    Transaction::create([
      'recipient_name' => $request->recipient_name,
      'quantity' => $request->quantity,
      'date' => Carbon::now(),
      'placement_location' => $request->placement_location,
      'status' => $isDisposable ? 'Selesai' : 'Pending',
      'user_id' => Auth::id(),
      'item_id' => $request->item_id
    ]);

    $currentStock = Item::where('id', '=', $request->item_id)->value('stock');

    Item::where('id', '=', $request->item_id)->update([
      'stock' => $currentStock - $request->quantity
    ]);

    return redirect()->route('transactions.index')->with('message', 'Transaksi berhasil.');
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
    return view('transactions.edit', compact('transaction'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateTransactionRequest  $request
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateTransactionRequest $request, Transaction $transaction) {
    $request->validate([
      'condition' => 'required'
    ]);

    // Update transaction status from 'Pending' to 'Selesai'
    $transaction->update([
      'status' => 'Selesai'
    ]);

    // Update item stock based on asset condition when transaction is finished. If the user state that the asset is not 'Hilang', then the stock will be updated to 1, otherwise stock will remain 0.
    // Update item condition.
    Item::where('id', '=', $request->item_id)->update([
      'stock' => $request->condition != 'Hilang' ? 1 : 0,
      'condition' => $request->condition
    ]);

    // Redirect to transaction history page.
    return redirect()->route('transactions.history')->with('message', 'Status Transaksi berhasil diperbarui.');
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
