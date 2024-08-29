<?php
// namespace App\Services;
namespace App\Http\Controllers;
use App\Services\BannerService;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $banner = $this->bannerService->index();
            return response()->json([
                'status' => 200,
                'data' => (is_object($banner)) ? $banner:[],
                'error' => (is_object($banner)) ?[]: $banner
            ], 200);
    }
    public function store(BannerRequest $request)
    {
        try { 
            $banner = $this->bannerService->store($request->validated());

            return response()->json([
                "status"=>200,
                "data"=>$banner
                ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function show($id)
    {
        try {
            $banner = $this->bannerService->show($id);
            return response()->json($banner, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage() 
            ], 404);
        }
    }

    public function update(BannerRequest $request, $id)
    {
        try {
            $banner = $this->bannerService->update($request->validated(), $id);
            return response()->json([
                'success' => true,
                'message' => 'Banner updated successfully',
                'data' => $banner,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Banner: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            $this->bannerService->destroy($id);
            return response()->json([
                "success" => true,
                "message" => "Record deleted successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Failed to delete record: " . $e->getMessage()
            ], 500);
        }
    }
}
