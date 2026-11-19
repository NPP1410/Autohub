<?php

namespace App\Repositories\Frontend;

use App\Contracts\Frontend\ProductCatalog;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class DemoProductCatalog implements ProductCatalog
{
    private array $products;

    public function __construct()
    {
        $this->products = require resource_path('data/frontend-products.php');
    }

    public function search(array $filters, int $page = 1): LengthAwarePaginator
    {
        $terms = preg_split('/\s+/u', Str::lower(trim($filters['q'] ?? '')), -1, PREG_SPLIT_NO_EMPTY);
        $products = array_filter($this->products, function (array $product) use ($filters, $terms): bool {
            $haystack = Str::lower(implode(' ', [$product['sku'], $product['brand'], $product['name'], $product['size'], $product['description']]));
            foreach ($terms as $term) {
                if (!str_contains($haystack, $term)) return false;
            }
            if (!empty($filters['category']) && $product['category'] !== $filters['category']) return false;
            if (!empty($filters['brand']) && $product['brand'] !== $filters['brand']) return false;
            if (!empty($filters['in_stock']) && $product['stock'] <= 0) return false;
            if (isset($filters['min_price']) && $filters['min_price'] !== '' && $product['price_satang'] < (int) round((float) $filters['min_price'] * 100)) return false;
            if (isset($filters['max_price']) && $filters['max_price'] !== '' && $product['price_satang'] > (int) round((float) $filters['max_price'] * 100)) return false;
            return true;
        });
        usort($products, function (array $a, array $b) use ($filters): int {
            $comparison = match ($filters['sort'] ?? 'sku') {
                'price_asc' => $a['price_satang'] <=> $b['price_satang'],
                'price_desc' => $b['price_satang'] <=> $a['price_satang'],
                'name' => strnatcasecmp($a['brand'].' '.$a['name'], $b['brand'].' '.$b['name']),
                'stock' => $b['stock'] <=> $a['stock'],
                default => 0,
            };
            return $comparison ?: strcmp($a['sku'], $b['sku']);
        });
        $perPage = 12;
        $page = min(max(1, $page), max(1, (int) ceil(count($products) / $perPage)));
        return new LengthAwarePaginator(array_slice($products, ($page - 1) * $perPage, $perPage), count($products), $perPage, $page);
    }

    public function find(string $sku): ?array
    {
        foreach ($this->products as $product) {
            if ($product['sku'] === $sku) return $product;
        }
        return null;
    }

    public function facets(): array
    {
        $categories = ['tire' => ['label' => 'ยางรถยนต์', 'count' => 0], 'charger' => ['label' => 'EV Charger', 'count' => 0]];
        foreach ($this->products as $product) $categories[$product['category']]['count']++;
        $brands = array_values(array_unique(array_column($this->products, 'brand')));
        sort($brands);
        return ['categories' => $categories, 'brands' => $brands, 'total' => count($this->products), 'is_demo' => true];
    }
}