# Frontend account login and password reset

Frontend accounts are separate from admin users and from the company/contact data in `tb_customer`. A single company may eventually have multiple frontend accounts. `frontend_users.customer_id` is optional and may be connected to the future customer-management workflow. No existing customer records, backend users or permissions are modified.

## Installation

Review the database selected by the environment before running the new migration. If your local `.env` points to the host, this command changes that host database:

```sh
php artisan migrate --path=database/migrations/2026_11_19_000001_create_frontend_auth_tables.php
php artisan config:clear
```

On the current host use `/usr/local/php83/bin/php` instead of `php`. The existing deploy workflow will run the migration when these changes are merged into main. Only the new `frontend_users` and `frontend_password_reset_tokens` tables are created by this migration.

Create the initial account without exposing a password in command history:

```sh
php artisan frontend:create-user dealer@example.com --name="Dealer name"
```

Enter and confirm the password at the hidden prompts (at least eight characters, letters and numbers). No account or shared default password is seeded automatically. Optionally specify `--customer-id=123` only when that existing `tb_customer` record is ready. The command refuses duplicate accounts rather than overwriting their passwords.

## Routes and session behavior

- GET/POST `/frontend/signin.php`: sign-in form and credential check.
- POST `/frontend/logout.php`: customer-only logout with CSRF protection.
- GET/POST `/frontend/forgot-password.php`: request an email reset link.
- GET `/frontend/reset-password/{token}`: reset form.
- POST `/frontend/reset-password.php`: validate and consume the reset token.
- `/frontend` and customer pages require an active `frontend` account. Admin login alone does not authorize them.
- Registration and Google Sign In are not enabled; accounts are provisioned by the command until onboarding is implemented.

The `frontend` guard and `frontend` password broker never use the admin provider or reset-token table. Session IDs are regenerated on login/logout. Customer logout preserves an admin session, if one exists. Accounts disabled after login are blocked on the next request. A changed password invalidates older customer sessions and rotates the remember token.

## Email configuration

The machine currently uses `MAIL_MAILER=log`: a request generates the reset email in `storage/logs/laravel.log`; it does not send a real email. Do not share those reset links or commit logs. Configure SMTP for real delivery and set `APP_URL` to the canonical URL of the environment. Locally the requested URL is `http://localhost:8004`; on the host it should be `https://alpha.field.orangeworkshop.info` (without `/frontend` appended).

Reset links use the configured APP_URL, not the untrusted request Host header. Links expire in 60 minutes, tokens are hashed in a separate table, and each successful reset consumes its token. Forgot-password responses are identical for unknown, inactive and recently notified accounts. Attempts are rate-limited using file cache by default; configure `FRONTEND_AUTH_RATE_LIMIT_STORE` to a shared cache for multiple servers.

## Current limits

This adds customer account authentication only. Other supplied screens still contain designer sample data, not real orders, payments or ERP information. Customer-company authorization and real business records must be added when those modules are implemented. Test those separately before exposing actual company data.

## Verification

`FrontendAuthenticationTest` and `FrontendPreviewTest` use a dedicated SQLite in-memory connection and run only this new migration there. They never migrate or write to the configured host database.

```sh
php artisan test --filter="FrontendAuthenticationTest|FrontendPreviewTest"
```


## Profile editing and notifications

`/frontend/edit-profile.php` displays the signed-in account and saves name, email, phone, birth date, personal address and biography. The new migration `2026_11_19_000002_add_profile_fields_to_frontend_users.php` adds the optional personal fields; deploy runs it automatically. For an existing local installation, run this specific migration after the frontend auth migration:

```sh
php artisan migrate --path=database/migrations/2026_11_19_000002_add_profile_fields_to_frontend_users.php
php artisan frontend:publish-assets
```

Changing email requires the current password and a unique email. Changing password requires the current password and matching confirmation, rotates remembered-login tokens and invalidates older frontend sessions. Password attempts are limited to five per minute per account/IP. Current password fields are never flashed back into the session after validation errors.

Profile fields are separate from company/contact information in `tb_customer`; customer IDs, activation, permissions, company credit and payment details cannot be edited here. Avatar upload is not included; the old temporary preview controls and mock card/credit information were removed.

SweetAlert2 is shipped as a local frontend asset, with a common partial `resources/views/frontend/partials/sweetalert.php`. It handles login/logout, forgot/reset password, profile and validation feedback, confirms logout and replaces existing native alerts in product/order demos. Account-changing actions remain CSRF-protected POST requests. Messages use text-safe options, with an inline/native fallback if scripts are unavailable. Existing product/order demos still do not submit real orders.

## Google sign-in

Google OAuth sign-in is implemented separately from password login. Initial linking requires the existing frontend password; later logins match the stored unique Google subject and verified email. Unknown or inactive users cannot sign up through Google. Credentials and the additional migration are required before activation. See [frontend-google-signin.md](frontend-google-signin.md) for local and production setup.
