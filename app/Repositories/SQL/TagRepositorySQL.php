<?php

namespace App\Repositories\SQL;

use App\Models\Tag;
use App\Repositories\TagRepository;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Auth;
use Carbon\Carbon;
use Request;

class TagRepositorySQL implements TagRepository
{

    public function readTagByID(int $tagId): ?Tag
    {
        return Tag::find($tagId);
    }

    public function readTags(array $queryParams): ?LengthAwarePaginator
    {
        $tags = Tag::pagination($queryParams);
        return $tags;
    }

    public function createTag(array $data): ?Tag
    {
        $tags = Tag::firstOrCreate([
            'name' => $data['name'] ?? null,
        ]);
        if (!isset($tags)) return null;

        return $tags;
    }

    public function updateTag(int $id, array $data): ? Tag
    {
        $tag = $this->readTagByID($id);
        if (!isset($tag)) return null;

        $tag->name = $data['name'];
        $tag->updated_at = now();
        $tag->save();


        return $tag;
    }

    public function deleteTag(int $tagId): ?Tag
    {
        $tag = $this->readTagByID($tagId);
        if (!isset($tag)) return null;

        $tag->delete();

        return $tag;
    }

}
