<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class PublishFrontendAssets extends Command
{
    protected $signature = 'frontend:publish-assets {--public-path= : Public root, for example ../public_html}';
    protected $description = 'Copy only frontend assets into the frontend directory of the public root';

    public function handle(Filesystem $files): int
    {
        $source = resource_path('frontend/assets');
        $root = $this->option('public-path') ?: public_path();
        $target = rtrim($root, '/\\').DIRECTORY_SEPARATOR.'frontend-assets';

        if (!$files->isDirectory($source)) {
            $this->error('Frontend asset source is missing.');
            return self::FAILURE;
        }

        $files->ensureDirectoryExists($target);
        if (!$files->copyDirectory($source, $target)) {
            $this->error('Unable to copy frontend assets.');
            return self::FAILURE;
        }

        $this->info('Frontend assets published to '.$target);
        return self::SUCCESS;
    }
}
