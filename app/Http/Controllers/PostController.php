<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Class\Human;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $post = Post::get();
            return response()->json([
                'status' => 'success',
                'data' => $post
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
            $validatedData = $request->validate([
                // Define your validation rules here
                'title' => 'required|max:255',
                'description' => 'required',
                // Add other fields as necessary
            ]);
            // dd($validatedData);
    
            $post = Post::create($validatedData);
            return response()->json([
                'message' => 'Post created successfully!',
                'post' => $post
            ], 201);
            // dd($post);
        } catch (ValidationException $ve) {
            return response()->json(['errors' => $ve->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the post.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Post $post)
    // {
        
        
        
    //     try {
    //         // Update the post instance with the request data
    //         $post->update($request->all());
    
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Post is updated successfully.',
    //             'data' => $post
    //         ], 200);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => $th->getMessage()
    //         ], 500);
    //     }
    // }
    public function update(Request $request, Post $post)
{
    try {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the post instance with the validated data
        $post = $post->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Post is updated successfully.',
            'data' => $post
        ], 200);
    } catch (ValidationException $ve) {
        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $ve->errors()
        ], 422);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'message' => $th->getMessage()
        ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $delete = $post->delete(); // Delete the specific post instance

            return response()->json([
                'status' => 'record deleted',
                'data' => $delete
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }



}
