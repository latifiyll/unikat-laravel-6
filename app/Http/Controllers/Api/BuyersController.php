<?php

namespace App\Http\Controllers\Api;

use App\Buyer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Buyers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BuyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::all();

        return Buyers::collection($buyers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        if($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()],422);
        }
        $buyer = Buyer::create(array_merge(
            $request->except('_token')
        ));

        return new Buyers($buyer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buyer = Buyer::find($id);

        return new Buyers($buyer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        if($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()],422);
        }
        $buyer = Buyer::find($id);
        $buyer->update(array_merge(
            $request->except('_token','_method')
        ));

        return new Buyers($buyer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buyer = Buyer::find($id);
        if(!$buyer)
        {
            return response(['message' => "Can't find this user"],404);
        }
        $buyer->delete();

        return new Buyers($buyer);
    }
}
