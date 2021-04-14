<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\VendorResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Services\TagService;

class TagController extends Controller
{
    private $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function readTags(Request $request)
    {
        $tags = $this->tagService->readTags($request->query());

        return response()->json([
            'success' => true,
            'data'    => $tags
        ]);
    }


    public function createTag(CreateTagRequest $request)
    {
        $tags = $this->tagService->createTag($request->validated());

        if (!isset($tags)) {
            return response()->json([
                'success' => false,
                'error'   => 'Failed to create new Tags.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $tags
        ]);
    }

    public function readTagByID($tagId)
    {
        $tags = $this->tagService->readTagByID($tagId);

        if(!isset($tags)) {
            return response()->json([
                'success'   => false,
                'error'     => 'Tags Not Found'
            ]);
        }

        return response()->json([
            'success' => true,
            'data'    => $tags
        ]);
    }
    public function updateTag(UpdateTagRequest $request, int $id)
    {
        $tag = $this->tagService->updateTag($id, $request->validated());

        if (!isset($tag)) {
            return response()->json([
                'success' => false,
                'error'   => 'Failed to update tag.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data'    => $tag
        ]);
    }

    public function deleteTag($tagId)
    {
        $tags = $this->tagService->deleteTag($tagId);

        if (!isset($tags)) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to delete Tag.'
            ], 500);
        }

        return response()->json(['success' => true]);
    }

}
