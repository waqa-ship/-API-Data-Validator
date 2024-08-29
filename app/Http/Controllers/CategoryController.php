<?php

namespace App\Http\Controllers;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest; // Ensure this matches your FormRequest class path

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller

{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService=$categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $category=$this->categoryService->index();
            return response()->json([
                'status' => 'success',
                'data' => $category
            ], 200);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function store(Request $request)
    {
       try {
        $category = Category::create($request->all());
        return response()->json([
            "status" => "success",
            "data" => $category
            
            ], 201);
       } catch (\Throwable $th) {
        dd($th);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the category by its ID
        $category = Category::find($id);

        // If the category is not found, return a 404 error response
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // If the category is found, return it as a JSON response
        return response()->json($category);
    }


    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $category = $this->categoryService->update($request->validated(),$id);
            return response()->json([
                'success' => true,
                'message' => 'category updated successfully',
                'data' => $category,
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                "success" =>"fasle",
                "message"=>'Failed to update category:' .$e->getMessage(),
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        try {
            $this->categoryService->destroy($id);
            return response()->json([
                'status' => 'record deleted',
                'message' =>"record deleted"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => "Failed to delet the record".$e->getMessage()
            ], 500);
        }
    }
}
