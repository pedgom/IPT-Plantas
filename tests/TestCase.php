<?php

namespace Tests;

//use Database\Seeders\DatabaseSeeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected function setUp(): void{
        parent::setUp();

        //$this->seed(DatabaseSeeder::class);
        $this->artisan('db:seed')
            ->expectsConfirmation('Do you wish to refresh migration before seeding, it will clear all old data ?', 'yes')
            ->expectsConfirmation('Create Permissions and Roles for user? [y|N]', 'yes')
            ->expectsConfirmation('Create default permissions? [y|N]', 'yes')
            ->expectsConfirmation('Do you want to create a superAdmin user account? [y|N]', 'yes')
            ->expectsConfirmation('Do you want to apply all seeds? [y|N]', 'yes');

        //user id = 1 - SuperAdmin
        //user id = 2 - Admin
        //user id = 3 - Manager
        //user id = 4 - User

        $user = User::factory()->create();
        $user->assignRole(Role::where('name', 'Admin')->first()->name);

        $user = User::factory()->create();
        $user->assignRole(Role::where('name', 'Manager')->first()->name);

        $user = User::factory()->create();
        $user->assignRole(Role::where('name', 'User')->first()->name);
    }
}
