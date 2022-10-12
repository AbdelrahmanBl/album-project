<?php

namespace App\Services;

use App\Models\Album;

class DeleteAlbumImages
{
    /**
     * images of album.
     *
     * @var array
     */
    protected $images = [];


    /**
     * the album.
     *
     * @var \App\Models\Album $album
     */
    protected $album;

    /**
     * __construct
     *
     * @param  \App\Models\Album $album
     * @return void
     */
    public function __construct(Album $album)
    {
        $this->album = $album;
    }

    /**
     * remove all album's images.
     *
     * @return void
     */
    public function remove(): void
    {
        $this->images = $this->album->pictures()->get();

        $this->deleteAllImages();
    }

    /**
     * delete all images with files.
     *
     * @return void
     */
    protected function deleteAllImages(): void
    {
        foreach($this->images as $image) {
            $image->delete();
        }
    }
}
