<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $income = Transaction::where('status', '=', 'SUCCESS')->sum('total');
        $sales = Transaction::count();
        $transactions = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $chart = [
            'pending' => Transaction::where('status', 'PENDING')->count(),
            'failed' => Transaction::where('status', 'FAILED')->count(),
            'success' => Transaction::where('status', 'SUCCESS')->count(),
        ];
        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'transactions' => $transactions,
            'chart' => $chart
        ]);
    }
}
