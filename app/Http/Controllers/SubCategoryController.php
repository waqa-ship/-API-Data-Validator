<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = SubCategory::get();
            return response()->json([
                'status' => 'success',
                'data' => $categories
            ], 200);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            $product = SubCategory::create($request->all());
            return response()->json($product, 201);
           } catch (\Throwable $th) {
            dd($th);
           }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $sh, $id)
    {
        // dd($id);
        // return SubCategory::find($id);

        return SubCategory::Find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $SubCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
        $product = SubCategory::findOrFail($id);
        // dd($product);
        $product->update($request->all());
        return response()->json([
            
            "status"=>"record updated",
            
            "data" => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            
            $data = SubCategory::destroy($id);
            return response()->json([
                'status' => 'record deleted',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
