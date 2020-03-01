<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('id', 'DESC')
        ->groupBy('buyer_id')
        ->select([
        'sales.buyer_id',
        DB::raw('sum(sales.total_sum) AS totalSum'),
        ])
        ->get();

        // dd($sales[0]["totalSum"]);



        return view('sales.index',compact('sales'));
    }
}
