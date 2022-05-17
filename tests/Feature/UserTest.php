<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use OwenIt\Auditing\Models\Audit;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_permissions_to_access_user_page_pages()
    {
        /*$this->artisan('db:seed')
            ->expectsConfirmation('Do you wish to refresh migration before seeding, it will clear all old data ?', 'yes')
            ->expectsConfirmation('Create Permissions and Roles for user? [y|N]', 'yes')
            ->expectsConfirmation('Create default permissions? [y|N]', 'yes')
            ->expectsConfirmation('Do you want to create a superAdmin user account? [y|N]', 'yes')
            ->expectsConfirmation('Do you want to apply all seeds? [y|N]', 'yes');
        */
        //without login
        $response = $this->get(route('users.index'));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('users.create'));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('users.show', 1));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('users.edit', 1));
        $response->assertRedirect(route('login'));

        $usersIdsCanAccess=[1,2]; // SuperAdmin, Admin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->get(route('users.index'));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('users.create'));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('users.show', 1));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('users.edit', 1));
            $response->assertStatus(200);
        }

        $usersIdsCanAccess=[3,4]; // Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->get(route('users.index'));
            $response->assertStatus(403);
            $response = $this->actingAs($user)->get(route('users.create'));
            $response->assertStatus(403);
            $response = $this->actingAs($user)->get(route('users.show', 1));
            $response->assertStatus(403);
            $response = $this->actingAs($user)->get(route('users.edit', 1));
            $response->assertStatus(403);
            //own profile
            $response = $this->actingAs($user)->get(route('users.show', $user->id));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('users.edit', $user->id));
            $response->assertStatus(200);
        }
    }


    public function test_admin_can_register_and_update_users_including_own_profile()
    {
        //check guests cannot create users
        $response = $this->post(route('users.store'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'roles'=>'User',
        ])->assertRedirect(route('login'));

        $usersIdsCanAccess=[1,2]; // SuperAdmin, Admin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            //create
            $response = $this->actingAs($user)->post(route('users.store'), [
                'name' => 'Test User',
                'email' => 'test'.$user->id.'@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'roles'=>'User',
            ])->assertSessionHasNoErrors()
                ->assertStatus(302);
            $this->followRedirects($response)->assertSee('test'.$user->id.'@example.com');

            //update
            $testUser = User::where('id', 1)->first();
            $response = $this->actingAs($user)->patch(route('users.update', 1), [
                'name' => 'Name-'.$user->id,
                'email' => $testUser->email,
                'roles' => 'SuperAdmin',
            ])->assertSessionHasNoErrors()
                ->assertStatus(302);
            $this->followRedirects($response)->assertSee('Name-'.$user->id);
        }
    }

    public function test_non_admins_users_cannot_create_or_edit_other_profiles_only_their_owns()
    {
        $usersIdsCanAccess=[3,4]; // Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->post(route('users.store'), [
                'name' => 'Test User',
                'email' => 'test'.$user->id.'@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'roles'=>'User',
            ])->assertStatus(403);

            //update
            $testUser = User::where('id', 1)->first();
            $response = $this->actingAs($user)->patch(route('users.update', 1), [
                'name' => 'Name-'.$user->id,
                'email' => $testUser->email,
                'roles' => 'SuperAdmin',
            ])->assertStatus(403);
            //$this->followRedirects($response)->assertSee('Name-'.$user->id);

            //update own profile
            $response = $this->actingAs($user)->patch(route('users.update', $user->id), [
                'name' => 'Name-'.$user->id,
                'email' => $user->email,
            ])->assertSessionHasNoErrors()
                ->assertStatus(302);
            $this->followRedirects($response)->assertSee('Name-'.$user->id);
        }
    }

    public function test_only_users_with_permissions_can_delete_other_users(){

        $usersIdsCanAccess=[1,2]; // SuperAdmin, Admin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $testUser = User::factory()->create();
            $response = $this->actingAs($user)->delete(route('users.destroy', $testUser))
                ->assertStatus(302);
            $this->assertEquals(User::where('id', $testUser->id)->first(),null);
            $testUser = User::factory()->create();
            $response = $this->actingAs($user)->delete(route('users.delete', $testUser))
                ->assertStatus(200)->assertJson(['success' => true]);
        }
        $usersIdsCanAccess=[3,4]; // Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $testUser = User::factory()->create();

            $response = $this->actingAs($user)->delete(route('users.destroy', $testUser))
                ->assertStatus(403);
            $this->assertNotEquals(User::where('id', $testUser->id)->first(),null);
            $response = $this->actingAs($user)->delete(route('users.delete', $testUser))
                ->assertStatus(403);
            $this->assertNotEquals(User::where('id', $testUser->id)->first(),null);
        }
    }

    public function test_required_fields_validation()
    {
        $usersIdsCanAccess=[1]; // SuperAdmin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        //check an admin creating a user
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->post(route('users.store'), [
                'name' => null,
                'email' => null,
                'password' => null,
                'password_confirmation' => null,
                'roles'=> null,
            ])->assertSessionHasErrors(['name', 'email', 'password', 'roles']);
        }

        $usersIdsCanAccess=[3,4]; // Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->patch(route('users.update', $user->id), [
                'name' => null,
                'email' => null,
                'password' => null,
                'password_confirmation' => null,
            ])->assertSessionHasErrors(['name', 'email']);

            $response = $this->actingAs($user)->patch(route('users.update', $user->id), [
                'name' => $user->name,
                'email' => $user->email,
            ])->assertSessionHasNoErrors();
        }
    }
}
