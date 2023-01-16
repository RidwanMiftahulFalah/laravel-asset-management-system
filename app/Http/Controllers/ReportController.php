<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller {
  public function index() {
    $this->authorize('is-admin');
    
    return view('reports.index');
  }

  public function createTransactionsPDF(Request $request) {
    $this->authorize('is-admin');
  
    $requestAllData = false;
    $startDate = $request->start_date;
    $endDate = $request->end_date;

    if (!$startDate && !$endDate) {
      $requestAllData = true;
      $transactions = Transaction::all();
    } else if ($startDate && !$endDate) {
      $transactions = Transaction::where('date', '>=', $startDate)->get();
    } else if (!$startDate && $endDate) {
      $transactions = Transaction::where('date', '<=', $endDate)->get();
    } else {
      if ($startDate > $endDate) {
        return redirect()->route('reports.index')->with('message', 'Tanggal Awal tidak boleh lebih besar dari Tanggal Akhir');
      }

      $transactions = Transaction::where('date', '>=', $startDate)->where('date', '<=', $endDate)->get();
    }

    if (!$transactions->count()) {
      return redirect()->route('reports.index')->with('message', 'Data tidak ditemukan.');
    }

    if($requestAllData) {
      $startDate = $transactions->first()->date;
      $endDate = $transactions->last()->date;
    }

    $pdf = Pdf::loadView('reports.transactions', [
      'transactions' => $transactions,
      'startDate' => $startDate,
      'endDate' => $endDate,
      'requestAllData' => $requestAllData,
    ]);
    return $pdf->download('Laporan Transaksi.pdf');
  }
}
