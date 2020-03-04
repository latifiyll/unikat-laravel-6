<?php

namespace App\Http\Controllers;

use App\Charts\BuyersBySum;
use App\Charts\SalesByProduct;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{

    public function getCharts()
    {


        $sales = DB::table('sales')
        ->select('products.name as name')
        ->join('products', 'products.id', '=', 'sales.product_id')
        ->groupBy('product_id')
        ->pluck('name');
        // dd($response);
        // $sales = Sale::groupBy('product_id')->with('product')->get();
        $salesData = Sale::select(\DB::raw("COUNT(*) as count"))->groupBy('product_id')->pluck('count');

        $chart = new SalesByProduct;
        $chart->labels($sales);
        $chart->dataset('Produkti më i shitur', 'bar', $salesData)->options([
                'fill' => 'true',
                'backgroundColor' => '#51C1C0'
            ]);

        $buyers = DB::table('sales')
        ->select('buyers.full_name as fullName')
        ->join('buyers','buyers.id','=','sales.buyer_id')
        ->groupBy('buyer_id')
        ->pluck('fullName');

        $buyersData = Sale::select(\DB::raw("SUM(total_sum) as count"))->groupBy('buyer_id')->pluck('count');
                // dd($buyers);
        $chartBuyers = new BuyersBySum;
        $chartBuyers->labels($buyers);
        $chartBuyers->dataset('Blerjet në bazë të shumës /Euro' ,'bar', $buyersData)->options([
            'fill' => 'true',
            'backgroundColor' => '#51C1C0'
        ]);

        return view('index', compact('chart','chartBuyers'));
    }


}
