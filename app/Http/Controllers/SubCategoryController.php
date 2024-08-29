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
    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'subcatagory_name' => 'required|string|max:255',
                
            ]);
    
            $subCategory = SubCategory->update($validatedData );
            $subCategory->update($validatedData);
    
            return response()->json([
                "status" => "success",
                "message" => "Record updated successfully",
                "data" => $subCategory
            ], 200);
        } catch (ValidationException $ve) {
            return response()->json([
                "status" => "error",
                "message" => "Validation failed",
                "errors" => $ve->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "An error occurred while updating the record",
                "error" => $e->getMessage()
            ], 500);
        }
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
