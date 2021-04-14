<?php

namespace App\Repositories\SQL;

use App\Models\Vendor;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\Dishes;
use App\Repositories\VendorRepository;
use App\Repositories\TagRepository;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Auth;
use Carbon\Carbon;
use Request;

class VendorRepositorySQL implements VendorRepository
{

    public function readVendorByID(int $vendorId): ?Vendor
    {
        return Vendor::find($vendorId);
    }

    public function readVendors(array $queryParams): ?LengthAwarePaginator
    {
        $vendors = Vendor::pagination($queryParams);
        return $vendors;
    }

    public function createVendor(array $data): ?Vendor
    {
        $vendor = Vendor::create([
            'name' => $data['name'],
            'logo' => $data['logo'],
        ]);
        if (!isset($vendor)) return null;

        if (isset($vendor)) {
            if (isset($data['tags'])) {
                $this->createVendorTag($vendor->id, $data['tags']);
            }

            if (isset($data['dishes'])) {
                $this->createVendorDish($vendor->id, $data['dishes']);
            }
        }
        return $vendor;
    }

    public function createVendorDish(int $vendorId, array $dishes)
    {
        Dishes::create([
            'vendor_id' => $vendorId,
            'name'      => $dishes['name'],
            'price'     => $dishes['price']
        ]);
    }

    public function createVendorTag(int $vendorId, array $tags)
    {
        foreach ($tags as $tag) {
            $vendortag = Tag::firstOrCreate([
                'name' => $tag,
            ]);

            Taggable::firstOrCreate([
                'taggable_id' => $vendorId,
                'tag_id' => $vendortag->id ?? null,
                'taggable_type' => 'App\Vendor',
            ]);
        }
    }

    public function updateVendor(int $id, array $data): ?Vendor
    {
        $vendor = $this->readVendorByID($id);
        if (!isset($vendor)) return null;

        $vendor->name = $data['name'];
        $vendor->logo = $data['logo'];
        $vendor->updated_at = now();
        $vendor->save();

        if (!isset($vendor)) return null;

        if (isset($vendor)) {
            if (isset($data['tags'])) {
                $this->updateVendorTag($vendor->id, $data['tags']);
            }
            if (isset($data['dishes'])) {
                $this->updateVendorDish($vendor->id, $data['dishes']);
            }
        }

        return $vendor;
    }

    public function updateVendorTag(int $vendorId, array $tags)
    {
        foreach ($tags as $tag) {
            $vendortag = Tag::firstOrCreate([
                'name' => $tag,
            ]);

            Taggable::firstOrCreate([
                'taggable_id' => $vendorId,
                'tag_id' => $vendortag->id ?? null,
                'taggable_type' => 'App\Vendor',
            ]);
        }
    }

    public function updateVendorDish(int $vendorId, array $dishes)
    {
        $dish = Dishes::firstOrCreate([
            'vendor_id' => $vendorId,
            'name' => $dishes['name'],
            'price' => $dishes['price'],
        ]);

        return $dish;
    }

    public function readVendorsByTagPaginated(string $tagName, array $queryParams): ?LengthAwarePaginator
    {
        $vendor = $this->readVendorByTag($tagName);

        if (!isset($vendor)) return null;

        return $vendor->tags()->pagination($queryParams);
    }

    public function readVendorByTag(string $tagName): ?Tag
    {
        return Tag::where('name', $tagName)->first();
    }

    public function getVendors(array $queryParams): Collection
    {
        $tags = new Tag;

        if (isset($queryParams['tags']) && $queryParams['tags'] != '') {
            $tags = $tags->where('name', 'LIKE', '%' . $queryParams['tags'] . '%');
        }
        if (isset($queryParams['limit'])) {
            $tags = $tags->take($queryParams['limit']);
        }
        if (isset($queryParams['skip'])) {
            $tags = $tags->skip($queryParams['skip']);
        }

        $tags = $tags->get();

        return $tags;
    }

    public function deleteVendor(int $vendorId): ?Vendor
    {
        $vendor = $this->readVendorByID($vendorId);
        if (!isset($vendor)) return null;

        $vendor->delete();

        return $vendor;
    }
}
