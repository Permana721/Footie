<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearCache extends Command
{
    protected $signature = 'cache:clear-custom';
    protected $description = 'Clear cache if it is full';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');

        $this->info('Cache cleared successfully.');
    }
}
