<?php

namespace App\Interfaces;

// Database
use Illuminate\Database\Eloquent\Builder;

// Support
use Illuminate\Support\Collection;

// Contracts
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    public function query(): Builder;

    public function all(): Collection;

    public function paginate(): LengthAwarePaginator;
}
