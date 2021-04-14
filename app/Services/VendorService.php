<?php

namespace App\Services;

use App\Models\Vendor;
use App\Models\Tag;
use App\Repositories\VendorRepository;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use DB;
use Illuminate\Support\Collection;

class VendorService
{
    private $vendor;

    public function __construct(VendorRepository $vendorRepository)
    {
        $this->vendor = $vendorRepository;
    }

    public function readVendorByID(int $vendorId): ? Vendor
    {
        return $this->vendor->readVendorByID($vendorId);
    }

    public function readVendors(array $queryParams): ? LengthAwarePaginator
    {
        return $this->vendor->readVendors($queryParams);
    }


    public function createVendor(array $data): ? Vendor
    {
        return $this->vendor->createVendor($data);
    }

    public function readVendorsByTagPaginated(string $tagName, array $queryParams): ? LengthAwarePaginator
    {
        return $this->vendor->readVendorsByTagPaginated($tagName, $queryParams);
    }

    public function getVendors(array $queryParams): ? Collection
    {
        return $this->vendor->getVendors( $queryParams);
    }


    public function updateVendor(int $id, array $data): ? Vendor
    {
        $vendor = null;

        DB::transaction(function () use (&$vendor, $data, $id) {
            $vendor = $this->vendor->updateVendor($id, $data);
        });

        return $vendor;
    }

    public function deleteVendor(int $vendorId): ? Vendor
    {
        return $this->vendor->deleteVendor($vendorId);
    }


}
