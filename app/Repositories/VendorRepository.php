<?php

namespace App\Repositories;


use App\Models\Vendor;
use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface VendorRepository
{
    // Read Section
    public function readVendorByID(int $vendorId): ? Vendor;
    public function readVendors(array $queryParams): ? LengthAwarePaginator;
    public function getVendors(array $queryParams): ? Collection;
    public function readVendorsByTagPaginated(string $tagName, array $queryParams): ? LengthAwarePaginator;
    public function readVendorByTag(string $tagName): ? Tag;


    //Create Section
    public function createVendor(array $vendor): ? Vendor;
    public function createVendorTag(int $vendorId, array $tags);

    //Update Section
    public function updateVendor(int $id, array $data): ? Vendor;

    //Delete Section
    public function deleteVendor(int $vendorId): ? Vendor;


}
