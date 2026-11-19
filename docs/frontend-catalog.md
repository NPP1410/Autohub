# Frontend product catalog

## Screens and behavior

- `/frontend/product.php`: signed-in customer catalog, 12 products per page.
- `/frontend/search.php`: same catalog and filters; retained for the existing search menu.
- `/frontend/product-detail.php?sku=DEMO-T001`: selected product details. Unknown SKU returns 404. Original design links without an SKU open the first fixture for compatibility.
- Search `q` matches all whitespace-separated terms across SKU, brand, name, tire size and description, case-insensitively.
- Filters: `category` (`tire`, `charger`), `brand`, `min_price`/`max_price` in baht and `in_stock=1`.
- Sort: `sku` (default), `name`, `price_asc`, `price_desc`, `stock`. Equal values use SKU as the stable tie-breaker.
- Filters and pagination are GET URLs, so they can be bookmarked/shared. Submitting new filters resets pagination. Grid/list controls use the existing frontend JavaScript and scoped catalog styles.
- Empty results display a reset action. Out-of-range page numbers show the last available page. Invalid query types/ranges are validated by Laravel and use the existing error feedback flow.

The 18 fixed fixtures are in `resources/data/frontend-products.php`. Demo SKUs, prices, stock, descriptions and product images are illustrative; the notice makes that visible. No database import, migration, product writes, checkout or actual cart submission is part of this change. The separate order-product, cart and dashboard designs still contain their original samples.

## Swapping the source after receiving SQL

`ProductController` depends on `App\Contracts\Frontend\ProductCatalog`. `AppServiceProvider` currently binds that interface to `DemoProductCatalog`. Add a database-backed implementation and change that binding; keep the views/routes unchanged. Do not import sample products into backend tables.

The adapter exposes:

1. `search(array $filters, int $page): LengthAwarePaginator` — apply filtering, stable ordering and pagination in SQL for a real catalog; never load the whole production catalog into memory.
2. `find(string $sku): ?array` — return one visible product or null.
3. `facets(): array` — `categories` keyed by stable category code with `label` and `count`, `brands` as a list, `total` and `is_demo` boolean.

Each normalized product contains:

| Field | Meaning |
| --- | --- |
| `sku` | Stable, unique product identifier, also used by detail links |
| `name`, `brand` | Display strings |
| `category` | Key present in facets.categories |
| `size` | Tire-size string, empty for products without a size |
| `price_satang` | Integer amount in THB satang |
| `compare_at_satang` | Nullable integer comparison price; shown only if above current price |
| `stock` | Nonnegative available quantity for the selected sale unit |
| `unit` | Sale-unit label |
| `image` | Approved public asset path, passed to asset() |
| `description` | Plain text, escaped by the view |

Confirm customer-specific prices, VAT inclusion, stock availability versus reserved quantity, category mapping, unit conversion and image paths with the backend team before mapping their SQL. Real ordering must recheck price/stock on the server; catalog display is not a reservation. Use `is_demo=false` only once the adapter returns actual validated data.

## Local/deploy assets and verification

```sh
php artisan frontend:publish-assets
php artisan test --filter=FrontendCatalogTest
```

The existing host deployment command publishes `catalog.css` automatically. Tests run against isolated in-memory SQLite for frontend accounts, without touching the database selected in `.env`. They exercise search, combined filters, sorting, pagination, escaping, missing product and replacement of the catalog adapter.
