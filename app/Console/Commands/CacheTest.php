<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CacheTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:new {key} {value}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '存缓存';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $info = cache([$this->argument('key') => $this->argument('value')], now()->addSeconds(60));
        $info ? $this->info('success') : $this->error('failed');
    }
}
