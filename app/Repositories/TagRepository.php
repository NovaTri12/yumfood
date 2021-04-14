<?php

namespace App\Repositories;


use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TagRepository
{
    // Read Section
    public function readTagByID(int $tagId): ? Tag;
    public function readTags(array $queryParams): ? LengthAwarePaginator;


    //Create Section
    public function createTag(array $tag): ? Tag;

    //Update Section
    public function updateTag(int $id, array $data): ? Tag;

    //Delete Section
    public function deleteTag(int $tagId): ? Tag;

}
