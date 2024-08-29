<?php

namespace App\Services;
use App\Models\Banner;
class BannerService
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
         return Banner::get();        
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
     }
     public function store(array $data)
     {
         // Create the banner using the validated data
         $banner = Banner::create([
             'title' => $data['title'],
             'size' => $data['size'],
             'type' => $data['type'],
             'status' => $data['status'],
         ]);
 
         return $banner;
     }
     public function show($id){

        $banner = Banner::findorFail($id);
        return $banner;
    }
     public function update(array $data, $id)
    {
        // Find the banner by its ID
        $banner = Banner::findOrFail($id);

        // Update the banner with the new data
        $banner->update([
            'title' => $data['title'],
            'size' => $data['size'],
            'type' => $data['type'],
            'status' => $data['status'], 
        ]);

        return $banner;
    }
    public function destroy($id)
    {
        // Find the banner by its ID
        $banner = Banner::findOrFail($id);

        // Delete the banner
        $banner->delete();

        return true;
    }
}
