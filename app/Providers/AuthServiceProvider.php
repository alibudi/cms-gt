<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
         Gate::define('isAdmin', function($user) {
            $role = User::find($user->id)->role;
            foreach ($role as $r){
                if($r->id == 1){
                    return true;
                }
            }
            return null;
         });

         Gate::define('isEditor', function($user) {
            $role = User::find($user->id)->role;
            foreach ($role as $r){
                if($r->id == 2){
                    return true;
                }
            }
            return null;
         });

        
        //
    }
}
