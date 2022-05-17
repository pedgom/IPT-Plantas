<?php

namespace Tests\Feature;

use App\Models\Demo;
use App\Models\Lock;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DemoTest extends TestCase
{
    use RefreshDatabase;

    public function test_permissions_to_access_demos_pages()
    {
        $demo = Demo::factory()->create();
        //without login
        $response = $this->get(route('demos.index'));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('demos.create'));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('demos.show', 1));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('demos.edit', 1));
        $response->assertRedirect(route('login'));

        $usersIdsCanAccess=[1,2,3,4]; // SuperAdmin, Admin
        $users = User::whereIn('id', $usersIdsCanAccess)->get()->reverse(); // SuperAdmin
        foreach($users as $user){
            Lock::truncate(); // required to erase locks
            $response = $this->actingAs($user)->get(route('demos.index'));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('demos.create'));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('demos.show', $demo));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('demos.edit', 1));
            $response->assertStatus(200);
        }
    }

    public function test_superadmin_can_create_and_edit()
    {
        //check guests cannot create users
        $response = $this->post(route('demos.store'), [
            'demo_id' => null,
            'user_id' => null,
            'name' => 'Noop',
            'body' => 'Test user',
            'optional' => null,
            'body_optional' => 'teste',
            'value' => '12.22',
            'date' => '2022-02-22',
            'datetime' => '1999-01-22 10:12:40',
            'checkbox' => false,
            'privacy_policy' => true,
            'status' => Demo::STATUS_ACTIVE,
        ])->assertRedirect(route('login'));

        $usersIdsCanAccess=[1,2,3,4]; // SuperAdmin, Admin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            //create
            $response = $this->actingAs($user)->post(route('demos.store'), [
                'demo_id' => null,
                'user_id' => null,
                'name' => 'Noop-'.$user->id,
                'body' => 'Test user',
                'optional' => null,
                'body_optional' => 'teste',
                'value' => '12.22',
                'date' => '2022-02-22',
                'datetime' => '1999-01-22 10:12:40',
                'checkbox' => false,
                'privacy_policy' => true,
                'status' => Demo::STATUS_ACTIVE,
            ])->assertSessionHasNoErrors()
                ->assertStatus(302);
            $this->followRedirects($response)->assertSee('Noop-'.$user->id);

            //update
            $demo = Demo::where('id', 1)->first();
            $response = $this->actingAs($user)->patch(route('demos.update', 1), [
                'demo_id' => $demo->demo_id,
                'user_id' => $demo->user_id,
                'name' => $demo->name.'-'.$user->id,
                'body' => $demo->body,
                'optional' => $demo->optional,
                'body_optional' => $demo->body_optional,
                'value' => $demo->value,
                'date' => $demo->date,
                'datetime' => $demo->datetime,
                'checkbox' => $demo->checkbox,
                'privacy_policy' => $demo->privacy_policy,
                'status' => $demo->status,
            ])->assertSessionHasNoErrors()
                ->assertStatus(302);
            $this->followRedirects($response)->assertSee($demo->name.'-'.$user->id);
        }
    }

    /*public function test_non_superadmins_users_cannot_create_or_edit()
    {
        $usersIdsCanAccess=[2,3,4]; // Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $response = $this->actingAs($user)->post(route('demos.store'), [
                'demo_id' => null,
                'user_id' => null,
                'name' => 'Noop-'.$user->id,
                'body' => 'Test user',
                'optional' => null,
                'body_optional' => 'teste',
                'value' => '12.22',
                'date' => '2022-02-22',
                'datetime' => '1999-01-22 10:12:40',
                'checkbox' => false,
                'privacy_policy' => true,
                'status' => Demo::STATUS_ACTIVE,
            ])->assertStatus(403);

            //update
            $demo = Demo::where('id', 1)->first();
            $response = $this->actingAs($user)->patch(route('demos.update', 1), [
                'demo_id' => $demo->demo_id,
                'user_id' => $demo->user_id,
                'name' => $demo->name.'-'.$user->id,
                'body' => $demo->body,
                'optional' => $demo->optional,
                'body_optional' => $demo->body_optional,
                'value' => $demo->value,
                'date' => $demo->date,
                'datetime' => $demo->datetime,
                'checkbox' => $demo->checkbox,
                'privacy_policy' => $demo->privacy_policy,
                'status' => $demo->status,
            ])->assertStatus(403);
            //$this->followRedirects($response)->assertSee('Name-'.$user->id);
        }
    }*/

    public function test_only_superadmins_can_delete(){

        $usersIdsCanAccess=[1,2,3,4]; // SuperAdmin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $demo = Demo::factory()->create();
            //create
            $response = $this->actingAs($user)->delete(route('demos.destroy', $demo))
                ->assertStatus(302);
            $this->assertEquals(Demo::where('id', $demo->id)->first(),null);
            $demo = Demo::factory()->create();
        }
        /*$usersIdsCanAccess=[2,3,4]; // admin, Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $demo = Demo::factory()->create();
            //create
            $response = $this->actingAs($user)->delete(route('demos.destroy', $demo))
                ->assertStatus(403);
            $this->assertNotEquals(Demo::where('id', $demo->id)->first(),null);
        }*/
    }

    public function test_required_fields_validation()
    {
        $usersIdsCanAccess=[1]; // SuperAdmin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $response = $this->actingAs($user)->post(route('demos.store'), [
                'demo_id' => null,
                'user_id' => null,
                'name' => null,
                'body' => null,
                'optional' => null,
                'body_optional' => null,
                'value' => null,
                'date' => null,
                'datetime' => null,
                'checkbox' => null,
                'privacy_policy' => null,
                'status' => null,
            ])->assertSessionHasErrors(['name', 'body', 'checkbox', 'privacy_policy', 'status']);
            $response = $this->actingAs($user)->post(route('demos.store'), [
                'demo_id' => null,
                'user_id' => null,
                'name' => 'Noop-'.$user->id,
                'body' => 'Test user',
                'optional' => null,
                'body_optional' => null,
                'value' => null,
                'date' => null,
                'datetime' => null,
                'checkbox' => false,
                'privacy_policy' => true,
                'status' => Demo::STATUS_ACTIVE,
            ])->assertSessionHasNoErrors();
        }
    }
}
