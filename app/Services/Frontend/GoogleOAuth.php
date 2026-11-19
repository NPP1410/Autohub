<?php

namespace App\Services\Frontend;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use UnexpectedValueException;

class GoogleOAuth
{
    public function configured(): bool
    {
        $uri = (string) config('services.frontend_google.redirect_uri', '');
        $parts = parse_url($uri);
        $secure = $parts && (($parts['scheme'] ?? '') === 'https' ||
            (($parts['scheme'] ?? '') === 'http' && in_array($parts['host'] ?? '', ['localhost', '127.0.0.1'], true)));
        return $secure && !isset($parts['fragment']) && !isset($parts['user']) && !isset($parts['pass'])
            && filled(config('services.frontend_google.client_id')) && filled(config('services.frontend_google.client_secret'));
    }

    public function authorizationUrl(string $state, string $verifier): string
    {
        return 'https://accounts.google.com/o/oauth2/v2/auth?'.http_build_query([
            'client_id' => config('services.frontend_google.client_id'),
            'redirect_uri' => config('services.frontend_google.redirect_uri'),
            'response_type' => 'code', 'scope' => 'openid email profile',
            'state' => $state, 'prompt' => 'select_account',
            'code_challenge' => rtrim(strtr(base64_encode(hash('sha256', $verifier, true)), '+/', '-_'), '='),
            'code_challenge_method' => 'S256',
        ], '', '&', PHP_QUERY_RFC3986);
    }

    public function identity(string $code, string $verifier): array
    {
        // Codes are exchanged on the server. Access/refresh/ID tokens are never persisted.
        $token = Http::asForm()->acceptJson()->connectTimeout(5)->timeout(15)
            ->withOptions(['allow_redirects' => false])->post('https://oauth2.googleapis.com/token', [
                'client_id' => config('services.frontend_google.client_id'),
                'client_secret' => config('services.frontend_google.client_secret'),
                'redirect_uri' => config('services.frontend_google.redirect_uri'),
                'grant_type' => 'authorization_code', 'code' => $code, 'code_verifier' => $verifier,
            ])->throw()->json();
        if (!is_array($token) || !is_string($token['access_token'] ?? null) || $token['access_token'] === '') {
            throw new UnexpectedValueException('Missing Google access token.');
        }
        // Use Google's authenticated UserInfo endpoint; do not trust browser-supplied email or decoded JWT payloads.
        $user = Http::acceptJson()->withToken($token['access_token'])->connectTimeout(5)->timeout(15)
            ->withOptions(['allow_redirects' => false])->get('https://openidconnect.googleapis.com/v1/userinfo')->throw()->json();
        if (!is_array($user) || ($user['email_verified'] ?? false) !== true ||
            !is_string($user['sub'] ?? null) || $user['sub'] === '' || strlen($user['sub']) > 255 ||
            !is_string($user['email'] ?? null) || strlen($user['email']) > 254 || !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            throw new UnexpectedValueException('Google identity is not verified.');
        }
        return ['subject' => $user['sub'], 'email' => Str::lower(trim($user['email']))];
    }
}