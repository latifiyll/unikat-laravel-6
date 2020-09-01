<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category as ResourcesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return ResourcesCategory::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $request->id;
        // $category = Category::where('id',$request->id)->first();

        // dd($category);
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
        ]);
        if($validator->fails()){
            return response(['error'=> $validator->errors()->all()],422);
        }
        $category = new Category($request->except('image'));
        $category->save();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return new ResourcesCategory($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id',$id)->first();

        return new ResourcesCategory($category);
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
    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->update(array_merge(
            $request->except('_token','_method'),
        ));
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return new ResourcesCategory($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Kategoria u fshi me sukses',[$category]],200);
    }
}
