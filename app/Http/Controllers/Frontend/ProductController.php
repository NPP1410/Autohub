<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Frontend\ProductCatalog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function __construct(private ProductCatalog $catalog) {}

    public function index(Request $request)
    {
        $facets = $this->catalog->facets();
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:150'],
            'category' => ['nullable', Rule::in(array_keys($facets['categories']))],
            'brand' => ['nullable', Rule::in($facets['brands'])],
            'in_stock' => ['nullable', 'boolean'],
            'min_price' => ['nullable', 'numeric', 'min:0', 'max:10000000'],
            'max_price' => array_merge(['nullable', 'numeric', 'min:0', 'max:10000000'], $request->filled('min_price') ? ['gte:min_price'] : []),
            'sort' => ['nullable', Rule::in(['sku', 'name', 'price_asc', 'price_desc', 'stock'])],
            'page' => ['nullable', 'integer', 'min:1', 'max:1000000'],
        ]);
        $filters['q'] = trim($filters['q'] ?? '');
        $products = $this->catalog->search($filters, (int) ($filters['page'] ?? 1));
        unset($filters['page']);
        $products->withPath(route('frontend.catalog.index'))->appends($filters);
        return view('frontend.pages.product', compact('products', 'filters', 'facets'));
    }

    public function show(Request $request)
    {
        $data = $request->validate(['sku' => ['nullable', 'string', 'max:100']]);
        // Preserve existing links from the original design that do not yet include an SKU.
        $sku = $data['sku'] ?? ($this->catalog->search([], 1)->items()[0]['sku'] ?? '');
        $product = $this->catalog->find($sku);
        abort_if($product === null, 404);
        $facets = $this->catalog->facets();
        return view('frontend.pages.product-detail', compact('product', 'facets'));
    }
}