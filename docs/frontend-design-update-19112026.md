# Design comparison: Alpha-auto-19112026

Compared `C:\Users\garfi\OneDrive\Documents\Alpha-auto-19112026\Alpha-auto` against the previous supplied design `Alpha-auto 2\Alpha-auto`, then merged functional differences into the current Autohub frontend.

## Source differences

Two added files: `point-reward-detail.php`, `css/site-consistency.css`.

Nine changed files: `edit-profile.php`, `inc_header.php`, `inc_topbar.php`, `inc_topmenu.php`, `point-reward.php`, `css/layout.css`, `css/layout.css.map`, `css/layout.scss`, `css/point-reward.css`. No removed files. Other files matched byte-for-byte, excluding `.DS_Store` metadata.

## Applied changes

- Added authenticated `/frontend/point-reward-detail.php?reward=ev-charger` and detail pages for all eight supplied rewards. Fixture data is separated into `resources/data/frontend-rewards.php`.
- Updated reward listing links to pass each reward key. The supplied source had all links opening the same default reward; related links now pass the correct key too. Unknown/non-string keys return 404; no query parameters are used as include/file paths.
- Added reward-detail sidebar search over the rendered related rewards.
- Updated Point Reward layout, responsive pagination styling and the dedicated `point-reward.css`.
- Added `site-consistency.css` to standardize frontend page padding, typography and topbar layout while excluding `.login-page`.
- Added member credit/point summaries in profile and topbar, explicitly marked as examples. They are not database balances and cannot be edited/saved as credit or points.
- Added stylesheet content hashes through `App\Support\FrontendAsset`. URLs change with file contents, and resolve from tracked asset sources so they work with the separate host `public_html` layout.

## Preserved current project behavior

Real frontend login, Google linking/sign-in, password reset and eye buttons, profile updates, catalog filters and search, menu routes, authenticated identity and POST logout remain unchanged. The new designer profile was not copied over the functional profile. New member-summary markup was merged into it instead.

The sidebar source changes were formatting/spacing only, so its current working navigation was preserved. SCSS/source-map changes were generated counterparts of the supplied CSS changes; compiled additional styles were merged into `menu-pages.css` without replacing the existing main stylesheet or catalog styles. No image, download, JavaScript or other page changes were found in this source package.

Reward benefits/dates, points and credit are still examples from the designer; no redemption or ledger persistence is added. No migrations, SQL import or host changes are needed for this update. Existing deployment publishes the modified frontend assets automatically when the user merges and pushes main.
