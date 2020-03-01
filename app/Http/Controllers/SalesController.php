<?php

namespace App\Http\Controllers;

use App\Product;
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

        return view('sales.index',compact('sales'));
    }

    public function show(Request $request,$id)
    {
        $sales = Sale::where('buyer_id',$id)->get();

        $totalSum = Sale::where('buyer_id',$id)->select([
            DB::raw('sum(sales.total_sum) AS totalSum'),
        ])->get();
        return view('sales.show', compact('sales','totalSum'));
    }
}
