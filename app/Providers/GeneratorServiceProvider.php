<?php
namespace App\Providers;

use App\Generators\StringGenerator;
use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('string.generator', function () {
            return new StringGenerator();
        });
    }
}