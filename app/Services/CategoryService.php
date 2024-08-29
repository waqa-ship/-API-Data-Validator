<?php

namespace App\Services;
use App\Services\CategoryService;
use App\Models\Category;

class CategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct() 
    {
        //
    }
    public function index(){
        try {
            return Category::get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }
    public function store(array $data ){
            $category = Category ::create([
                'title' => $data['title'],
                'size' => $data['size'],
                'type' => $data['type'],
                'status' => $data['status'],
            ]);
    }
    public function show($id){
        try {
            $category = Category::findorFail($id);
            $category->update([
                'title' => $category->title,
                'size' => $category->size,
                'type' => $category->type,
                'status' => $category->status,
            ]);
            return $category;   
        } catch (\Throwable $th) {
            //throw $th;
        }
        
}
        public  function update(array $data ,$id){
            $category= Category::findOrFail($id);
            $category->update([
                'title' => $data['title'],
                'size' => $data['size'],
                'type' => $data['type'],
                'status' => $data['status'],
                ]);
            return $category; 
        }

        public function destroy($id){
            $category = Category::findOrFail($id);
            $category->delete();
            return $category;
        }
}
