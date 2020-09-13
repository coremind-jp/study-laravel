<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        $this->registerCustomValidation();
        
        $this->registerComponents();
    }

    protected function registerCustomValidation()
    {
        Validator::extend('as_extend', function (
            $attribute,
            $value,
            $parameters,
            $validator
        ) {
            return $value === 'extend';
        });
    }

    protected function registerComponents()
    {
        $list = [
            'header' => App\View\Components\Header::class,
            'inline-component' => App\View\Components\InlineComponent::class,
        ];
        
        foreach ($list as $name => $component) {
            Blade::component('components.'.$name, $component);
        }
    }
}
