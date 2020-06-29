<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('build {project}', function ($project) {
    if ($this->confirm('Do you wish to do:[y|n]?')){
        for ($i=0;$i<10000000000;$i++){
            echo 12;
        }
        $this->info("Building {$project}!");
    }else{
        $this->info('canceled');
    }

});
