<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class PreviewFrontend extends Command
{
    protected $signature = 'frontend:preview {--port=8197 : Local preview port}';
    protected $description = 'Run the frontend design preview locally without a database session';

    public function handle(): int
    {
        $port = filter_var($this->option('port'), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1024, 'max_range' => 65535]]);
        if ($port === false) {
            $this->error('Choose a port between 1024 and 65535.');
            return self::FAILURE;
        }

        $this->call('frontend:publish-assets');
        $this->info('Frontend preview: http://127.0.0.1:'.$port.'/frontend');
        $this->line('This local process uses its own file session. Press Ctrl+C to stop.');

        $process = new Process(
            [PHP_BINARY, '-S', '127.0.0.1:'.$port, '-t', public_path(), base_path('server.php')],
            base_path(),
            ['SESSION_DRIVER' => 'file', 'SESSION_COOKIE' => 'alpha_frontend_preview', 'CACHE_STORE' => 'file', 'CACHE_DRIVER' => 'file']
        );
        $process->setTimeout(null);

        return $process->run(function ($type, $buffer) {
            $this->output->write($buffer);
        });
    }
}
