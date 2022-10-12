<?php

namespace App\Services;

use App\Models\Album;

class CopyAlbumImages
{
    /**
     * the album.
     *
     * @var \App\Models\Album
     */
    protected $album;

    /**
     * copy to album.
     *
     * @var \App\Models\Album
     */
    protected $toAlbum;

    /**
     * __construct
     *
     * @param  \App\Models\Album        $album
     * @param  \App\Models\Album|null   $to_album
     * @return void
     */
    public function __construct(Album $album, ?Album $to_album)
    {
        $this->album    = $album;

        $this->toAlbum  = $to_album;
    }

    /**
     * copy album's images to another album.
     *
     * @return void
     */
    public function copy(): void
    {
        if($this->toAlbum) {
            $this->album->pictures()->update([
                'album_id'  => $this->toAlbum->id,
            ]);
        }
    }
}
