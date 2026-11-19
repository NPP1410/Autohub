# Frontend menu update from Alpha-auto 2

Source: `C:\Users\garfi\OneDrive\Documents\Alpha-auto 2\Alpha-auto`

## Imported screens

The following new designs are served through the existing authenticated `/frontend/{page}.php` routes:

- New Model: `new-model.php`
- Top Sale: `top-sale.php`
- Promotion and campaign details: `promotion.php`, `promotion-detail.php`
- Point Reward: `point-reward.php`
- Download Catalogue: `catalogue.php`
- Contact Us: `contact.php`
- Warranty registration: `register-claim.php`
- Claim submission and listing: `claim-product.php`, `claim-list.php`
- Notifications: `notifications.php`
- Privacy policy draft: `privacy-policy.php`

The sidebar links to these screens; claim/member submenus expand on the current screen. Tire EV/EV Charger links use the existing searchable catalog category filter. Profile/account details and the CSRF-protected logout remain connected to the real frontend account. The topbar search submits `q` to the existing product search; notification badge selectors support the new notifications demo.

Legacy `claims.php` redirects to `claim-list.php`, and `rewards.php` redirects to `point-reward.php`. The original `orders.php` redirect remains unchanged.

## File organization

- Native PHP pages: `resources/views/frontend/pages/`
- Updated sidebar: `resources/views/frontend/partials/inc_topmenu.php`
- Additional client-side modules: `resources/views/frontend/partials/menu-scripts.php`
- Scoped additional styles: `resources/frontend/assets/css/menu-pages.css`
- Province option list: `resources/views/frontend/partials/inc_thai_provinces.php`
- Demo PDF: `resources/frontend/assets/downloads/catalogue-yokohama-tire-sample.pdf`

Only new pages/modules and missing assets were imported. The existing main stylesheet, frontend account/login/reset/Google code, profile persistence, catalog repository and backend were preserved. Shared includes and local assets were rewritten to Laravel resource/public paths. The new source's password recovery and profile mock handlers were deliberately excluded from the imported scripts so they cannot intercept real authentication or profile forms.

## Current limits

These new screens retain designer sample data and in-memory interactions. They do not save warranties/claims, upload attachments to the server, redeem points, send contact messages or persist notification read state. Prototype forms explain that they have not submitted actual data and use the common SweetAlert feedback for validation completion. The privacy text is a draft supplied with the design and needs business review before publication as the company's actual policy. New Model/Top Sale/promotion data are still the designer's fixtures rather than the structured product repository.

No SQL import or migration is required for this menu update. Existing account/Google migrations remain required for those previously implemented features.

## Publish and test

```sh
php artisan frontend:publish-assets
php artisan test --filter=FrontendMenusTest
```

Deployment already runs the asset publisher for `public_html`. Tests check authentication, all new page renders, asset/PDF existence, navigation and preservation of real profile/search/reset behavior using an isolated SQLite account database. The additional JavaScript modules were syntax-checked separately.


## Follow-up design update 19112026

The next source package adds Point Reward details, site-wide layout consistency, updated reward styling and sample credit/point summaries. See [frontend-design-update-19112026.md](frontend-design-update-19112026.md) for the exact comparison and merge decisions.
