<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller {
  public function index() {
    return view('reports.index');
  }

  public function createTransactionsPDF(Request $request) {
    $requestAllData = false;

    if (!$request->start_date && !$request->end_date) {
      $requestAllData = true;
      $transactions = Transaction::all();
    } else if ($request->start_date && !$request->end_date) {
      $transactions = Transaction::where('date', '>=', $request->start_date)->get();
    } else if (!$request->start_date && $request->end_date) {
      $transactions = Transaction::where('date', '<=', $request->end_date)->get();
    } else {
      if ($request->start_date > $request->end_date) {
        return redirect()->route('reports.index')->with('message', 'Tanggal Awal tidak boleh lebih besar dari Tanggal Akhir');
      }

      $transactions = Transaction::where('date', '>=', $request->start_date)->where('date', '<=', $request->end_date)->get();
    }

    if (!$transactions->count()) {
      return redirect()->route('reports.index')->with('message', 'Data tidak ditemukan.');
    }

    $pdf = Pdf::loadView('reports.transactions', [
      'transactions' => $transactions,
      'startDate' => $request->start_date,
      'endDate' => $request->end_date,
      'requestAllData' => $requestAllData,
    ]);
    return $pdf->download('Laporan Transaksi.pdf');
  }
}
