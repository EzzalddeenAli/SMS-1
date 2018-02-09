<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Custom Validation
        Validator::extend('alpha_spaces', function ($attribute, $value) {

            // This will only accept alpha and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('alpha_num_spaces', function ($attribute, $value) {

            // This will only accept alpha_num and spaces.
            return preg_match('/(^[A-Za-z0-9 ]+$)+/', $value);
        });

        Validator::extend('level', function ($attribute, $value) {
            $levels = ['nursery', 'kinder', 'preparatory'];
            for ($i = 1; $i < 13; $i++) {
                array_push($levels, "grade$i");
            }

            $attribute = explode('.', $attribute);

            return in_array($attribute[1] !== null ? $attribute[1] : '', $levels);
        });

        Validator::extend('gender', function ($attribute, $value) {
            //check if valid gender
            return in_array($value, ['male', 'female']);
        });

        //Form Builder
        Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsDate', 'components.form.date', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsNumber', 'components.form.number', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsPhone', 'components.form.phone', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsUrl', 'components.form.url', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsEmail', 'components.form.email', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['name', 'attributes' => ['class' => 'btn btn-default']]);
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
