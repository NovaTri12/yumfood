<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\VendorResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\CreateVendorRequest;
use App\Http\Requests\Vendor\UpdateVendorRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


use App\Services\Vendorservice;

class VendorController extends Controller
{

    private $vendorService;

    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function readVendors(Request $request)
    {
        $vendors = $this->vendorService->readVendors($request->query());

        return response()->json([
            'success' => true,
            'data'    => $vendors
        ]);
    }


    public function createVendor(CreateVendorRequest $request)
    {
        $vendor = $this->vendorService->createVendor($request->validated());

        if (!isset($vendor)) {
            return response()->json([
                'success' => false,
                'error'   => 'Failed to create new Vendor.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $vendor
        ]);
    }

    public function readVendorByID($vendorId)
    {
        $vendor = $this->vendorService->readVendorByID($vendorId);

        if(!isset($vendor)) {
            return response()->json([
                'success'   => false,
                'error'     => 'Vendor Not Found'
            ]);
        }

        return response()->json([
            'success' => true,
            'data'    => $vendor
        ]);
    }

    public function getVendorsByTag(Request $request, $tagName)
    {
        $vendors = $this->service->readVendorsByTagPaginated($tagName, $request->query());

        if (!isset($vendors)) {
            return response()->json([
                'success' => false,
                'error' => 'Vendor not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $vendors
        ]);
    }

    public function updateVendor(UpdateVendorRequest $request, int $id)
    {
        $vendor = $this->vendorService->updateVendor($id, $request->validated());

        if (!isset($vendor)) {
            return response()->json([
                'success' => false,
                'error'   => 'Failed to update vendor.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data'    => $vendor
        ]);
    }

    public function deleteVendor($vendorId)
    {
        $vendors = $this->vendorService->deleteVendor($vendorId);

        if (!isset($vendors)) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to delete Vendor.'
            ], 500);
        }

        return response()->json(['success' => true]);
    }
}
