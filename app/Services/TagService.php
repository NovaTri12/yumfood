<?php

namespace App\Services;

use App\Models\Tag;
use App\Repositories\TagRepository;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use DB;
use Illuminate\Support\Collection;

class TagService
{
    private $tag;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tag = $tagRepository;
    }

    public function readTagByID(int $tagId): ? Tag
    {
        return $this->tag->readTagByID($tagId);
    }

    public function readTags(array $queryParams): ? LengthAwarePaginator
    {
        return $this->tag->readTags($queryParams);
    }


    public function createTag(array $data): ? Tag
    {
        return $this->tag->createTag($data);
    }

    public function updateTag(int $id, array $data): ? Tag
    {
        $tag = null;

        DB::transaction(function () use (&$tag, $data, $id) {
            $tag = $this->tag->updateTag($id, $data);
        });

        return $tag;
    }

    public function deleteTag(int $tagId): ? Tag
    {
        return $this->tag->deleteTag($tagId);
    }
}
