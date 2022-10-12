<?php

namespace App\Http\Controllers;

use App\Enums\MessageType;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Picture;
use App\Services\CopyAlbumImages;
use App\Services\DeleteAlbumImages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class AlbumController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AlbumRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AlbumRequest $request): RedirectResponse
    {
        $album = Album::query()->create(array_merge($request->validated(), [
            'user_id'   => auth()->user()->id,
        ]));

        return redirect()->route('albums.edit', $album->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Album $album): View
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AlbumRequest  $request
     * @param  \App\Models\Album                $album
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AlbumRequest $request, Album $album): RedirectResponse
    {
        $album->update($request->validated());

        $ids = collect($request->uploaded)->map(fn($id) => (int) $id)->toArray();

        Picture::whereIn('id', $ids)->update([
            'album_id'  => $album->id,
        ]);

        return redirect()->route('home')->with('status', [
            'message'   => __('Updated Successfully !'),
            'type'      => MessageType::SUCCESS->value,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album        $album
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Album $album): RedirectResponse
    {
        if(request('REMOVE')) {
            (new DeleteAlbumImages($album))->remove();
        }

        if(request()->to_album) {
            (new CopyAlbumImages($album, Album::find((int) request()->to_album)))->copy();
        }

        $album->delete();

        return back()->with('status', [
            'message'   => __('Deleted Successfully !'),
            'type'      => MessageType::DANGER->value,
        ]);
    }
}
