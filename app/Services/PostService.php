<?php

namespace App\Services;
use App\Models\Post;
class PostService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function search()
    {
       try {
        $post = Post::get();
        return $post;        
       } catch (\Throwable $th) {
        //throw $th;
       }
    }
    public function create($data)
    {
      try {
        $validatedData = $data->validate([
            // Define your validation rules here
            'title' => 'required|max:255',
            'description' => 'required',
            // Add other fields as necessary
        ]);
        // dd($validatedData);
        $post = Post::create($validatedData);
      } catch (\Throwable $th) {
        //throw $th;
      }
    }
    public function update($id, $data)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
         
            ]);
    
            // Update the post instance with the validated data
            $post = $post->update($validatedData);
            return $post;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function delete($id)
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
