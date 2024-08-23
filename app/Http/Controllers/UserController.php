<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->userService->getUser();
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Code for creating a new resource
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $this->userService->store_user($request->all());
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Code for displaying a specific resource
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Code for editing a resource
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        // Call the update_user method with the $id
        $user = $this->userService->update_user($id);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $user = $this->userService->delete_user();
        return $user;
    }
}
