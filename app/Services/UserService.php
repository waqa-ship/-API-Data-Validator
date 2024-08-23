<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }

    public function getUser()
    {
        return "hi user";
    }

    public function store_user($data)
    {
       
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = $this->userService->createUser($validated);
        return response()->json($user, 201);
    }

    public function update_product($id)
    {
        return "product is updated, $id";
    }
    public function delete_user()
    {
        return "delete data";
    }
    
}
