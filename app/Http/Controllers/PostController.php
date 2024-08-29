<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
class PostController extends Controller
{
    protected $postServices;
    public function __construct(PostService $postServices)
    {
        $this->postServices = $postServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $post = $this->postServices->search();
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
            $post = $this->postServices->create($request);
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
 public function update(Request $request, Post $post)
{
    try {
         $this->authorize('update', $post);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'tags' => 'nullable|array|exists:tags,id',
        ]);

        $post->update($validatedData);
        $post->tags()->sync($request->input('tags', []));

        return response()->json([
            'message' => 'Post updated successfully.',
            'data' => $post->load('category', 'tags')
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error updating post: ' . $e->getMessage()
        ], $e instanceof AuthorizationException ? 403 : 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $this->postServices->delete($post);
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
