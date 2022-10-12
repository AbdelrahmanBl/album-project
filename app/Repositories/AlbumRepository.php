<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Album;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class AlbumRepository implements RepositoryInterface
{
    public function query(): Builder
    {
        return Album::where('user_id', auth()->user()->id)
                    ->with('pictures')
                    ->withCount('pictures');
    }

    public function all(): Collection
    {
        return $this->query()->get();
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->query()->paginate();
    }
}
