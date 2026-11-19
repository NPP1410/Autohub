<?php

namespace App\Support;

class FrontendAsset
{
    public static function url(string $path): string
    {
        $source = resource_path('frontend/assets/'.$path);
        $url = asset('frontend-assets/'.$path);
        // Source hashes survive deployment to a separate public_html directory.
        return is_file($source) ? $url.'?v='.substr(hash_file('sha256', $source), 0, 12) : $url;
    }
}