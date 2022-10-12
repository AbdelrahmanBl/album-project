<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Models\Picture;
use Illuminate\Http\JsonResponse;

class UploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UploadRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UploadRequest $request): JsonResponse
    {
        $picture = Picture::query()->create([
            'path'      => $request->file('file'),
            'name'      => pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME),
        ]);

        return response()->json([
            'id'    => $picture->id,
        ]);
    }
}
