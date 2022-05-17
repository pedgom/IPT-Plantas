<?php

namespace App\Providers;

use App\Models\Policies\SettingPolicy;
use App\Models\Setting;
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
        Setting::class => SettingPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*Gate::define('view-setting-gate', function ($user, $setting) {
            return false;
        });*/

        /*Gate::define('access-dashboard', function ($user) {
            return true;
        });*/

        Gate::define('viewLarecipe', function(?User $user, $documentation) {
            //dd($documentation)

            //for guest users
            if(empty($user)){
                return false;
            }else{ // for authenticated users
                if($user->can('adminFullApp')){
                    return true;
                }elseif($user->can('adminApp')){
                    return true;
                }elseif($user->can('manageApp')){
                    return true;
                }elseif($user->can('accessAsClient')){
                    return true;
                }
            }
            return false;
        });
    }
}
