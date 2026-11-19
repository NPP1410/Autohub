# Alpha Auto frontend preview

The supplied PHP design is integrated as a separate Laravel view module. The root `/` and legacy `/public` URLs redirect to `/frontend`. The `/webpanel` routes, admin controllers, permissions, database and login remain unchanged.

## URLs

- `/frontend`: customer dashboard design preview.
- `/frontend/signin.php`: customer sign-in design preview, independent of admin authentication.
- `/frontend/product.php`, `/frontend/product-detail.php`, `/frontend/cart.php`, `/frontend/checkout.php`, etc. retain their original page names.
- Existing backend: `/webpanel/login` and `/webpanel`.

These are design previews with the original sample data. Customer login and password reset are now implemented separately; see [frontend-authentication.md](frontend-authentication.md). Orders, payment, credit, VAT, promotions and TR Cloud still use design data and are not implemented. Checkout uses the designer's sample totals and 10% VAT; do not use them as production pricing/tax rules. Sign-in now checks an active frontend account and creates only a frontend login; customer accounts and admin accounts are independent. Local browser interactions remain demos.

## File ownership

- `app/Http/Controllers/Frontend/PageController.php`: allowed pages only.
- `routes/frontend.php`: all customer preview routes, under the `frontend.` name prefix.
- `resources/views/frontend/pages/*.php`: native PHP views rendered by Laravel (not executable public scripts).
- `resources/views/frontend/partials/*.php`: frontend header, menu, footer and shared demo data. Includes use absolute resource paths and retain PHP variable scope.
- `resources/frontend/assets/`: authoritative CSS, JS, images and fonts, tracked in Git.
- `public/frontend-assets/`: generated local asset copy, intentionally ignored by the existing public ignore rule.

Backend assets are not reused. The common frontend header sets a base URL under `/frontend/`, so original relative PHP links resolve inside the frontend module. CSS/JS/image URLs use explicit `asset('frontend-assets/...')` helpers, including when Laravel is installed in a URL subdirectory.

## Assets and deployment

After changing frontend assets, publish locally:

```sh
php artisan frontend:publish-assets
```

On the current host, the Laravel project and document root are siblings. The deployment workflow runs:

```sh
/usr/local/php83/bin/php artisan frontend:publish-assets --public-path=../public_html
```

This copies assets **only into `public_html/frontend-assets`**. It does not overwrite the host's `index.php`, `.htaccess`, `.env`, backend assets or uploaded files outside that directory. No files are deleted.

## Original template gaps

The source did not include claims, rewards, notifications, registration, password reset or search screens. Password reset and catalog search have now been implemented; registration directs users to contact an administrator. Claims, rewards and notifications now have authenticated sample screens from the second design package; see [frontend-menu-update.md](frontend-menu-update.md). Their backend persistence is still pending. See [frontend-catalog.md](frontend-catalog.md) for the structured demo catalog and database-adapter contract. The original `orders.php` link points to the supplied purchase-history design. Frontend logout is a CSRF-protected POST and preserves the admin login.

The source fonts directory is empty; Bootstrap icon fonts currently rely on the CDN included by the designer. External Google Fonts, icon and datepicker libraries require network access. An isolated neutral avatar replaces the missing demo profile image.

The static directory is `frontend-assets`, not `frontend`: it must not shadow the Laravel `/frontend` route on Apache or PHP's development server.

## Local preview server

```sh
php artisan frontend:preview
```

Open `http://127.0.0.1:8197/frontend` or `http://127.0.0.1:8197/frontend/signin.php`. The command binds only to localhost and uses a separate file-session cookie for the preview child process. It does not change `.env`, the configured database or the admin session. Stop with Ctrl+C. The regular Apache URL still requires the project's existing database/session configuration to be valid. Frontend login now requires the new frontend auth tables and an account even on this preview server; file sessions do not replace the account database.


## Additional frontend menus

The Alpha-auto 2 design update adds 12 screens, including warranty/claims, promotions, rewards, catalogue downloads, contact, notifications and a privacy-policy draft. See [frontend-menu-update.md](frontend-menu-update.md) for imported files and remaining sample-only behavior. Functional account, Google login, reset password, profile and searchable product catalog were preserved.
