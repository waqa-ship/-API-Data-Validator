<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class ProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }

    public function getService()
    {
        return "Service is called";
    }

    public function store_user($data)
    {
       
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        
        return response()->json($user, 201);
    }

    public function update_product($id)
    {
        return "product is updated, $id";
    }
    public function delete_product()
    {
        return "product is deleted";
    }
    
}
