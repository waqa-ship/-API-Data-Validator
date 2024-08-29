<?php

namespace App\Http\Controllers;

use App\Models\SignBoard;
use Illuminate\Http\Request;

class SignBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signboards = SignBoard::all();
        return response()->json($signboards);
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
        // dd($request);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $signboard = SignBoard::create($validatedData);
        return response()->json($signboard, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    try {
        // Attempt to find the SignBoard by its ID
        $signBoard = SignBoard::findOrFail($id);

        // If found, return the SignBoard data in a JSON response
        return response()->json($signBoard, 200);
    } catch (\Exception $e) {
        // If an exception occurs, return a 404 response with the error message
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage() // Corrected to getMessage()
        ], 404);
    }
}


    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SignBoard $signBoard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'size' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'status' => 'required|boolean',
            ]);
            
            // Find the signboard by ID and update it
            $signBoard = SignBoard::findOrFail($id);
            $signBoard->update([
                "title" => $request->title,
                "size" => $request->size,
                "type" => $request->type,
                "status" => $request->status,
            ]);
    
            // Return a JSON response with a success message
            return response()->json([
                'success' => true,
                'message' => 'Signboard updated successfully',
                'data' => $signBoard,
            ], 200);
    
        } catch (\Exception $e) {
            // If an error occurs, catch the exception and return a JSON response
            return response()->json([
                'success' => false,
                'message' => 'Failed to update signboard: ' . $e->getMessage(),
            ], 500); // Internal Server Error
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Attempt to find the SignBoard by ID and delete it
            $signBoard = SignBoard::findOrFail($id);
            $signBoard->delete();
    
            // Return a JSON response indicating success
            return response()->json([
                "success" => true,
                "message" => "Record deleted successfully"
            ], 200);
        } catch (\Exception $e) {
            // If an error occurs, catch the exception and return a JSON response
            return response()->json([
                "success" => false,
                "message" => "Failed to delete record: " . $e->getMessage()
            ], 500); // Internal Server Error
        }
    }
    
}
