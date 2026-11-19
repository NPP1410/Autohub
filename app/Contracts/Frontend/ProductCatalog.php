<?php

namespace App\Contracts\Frontend;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductCatalog
{
    /** Normalized product arrays; see docs/frontend-catalog.md for the data contract. */
    public function search(array $filters, int $page = 1): LengthAwarePaginator;
    public function find(string $sku): ?array;
    public function facets(): array;
}