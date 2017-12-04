<?php

namespace App\Providers;

use App\Assignment;
use App\Policies\AssignmentPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
//        Assignment::class => AssignmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-grade', function ($user, $subject) {
            return $user->id == $subject->teacher_id;
        });

        //resource gate eg: assignments.view, assignments.update
        Gate::resource('assignments', 'App\Policies\AssignmentPolicy');
    }
}
