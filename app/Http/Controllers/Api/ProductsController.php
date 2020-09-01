<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ResourcesProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return ResourcesProduct::collection($products);
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
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category_id' => 'required|int',
            'type_id' => 'required|int',
            'quantity' => 'required|int',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ]);
        if($validator->fails())
        {
            return response(['errors' => $validator->errors()->all()],422);
        }
        $product = Product::create(array_merge(
            $request->except('image','_token')
        ));
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->addMediaFromRequest('image')->toMediaCollection('product_image');
        }

        return new ResourcesProduct($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return new ResourcesProduct($product);
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
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category_id' => 'required|int',
            'type_id' => 'required|int',
            'quantity' => 'required|int',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()],422);
        }
        $product = Product::where('id',$id)->first();

        $product->update(array_merge(
            $request->except('_token','_method')
        ));

        return new ResourcesProduct($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return new ResourcesProduct($product);
    }
}
