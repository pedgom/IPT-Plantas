<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use OwenIt\Auditing\Models\Audit;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    public function test_permissions_to_access_settings_pages()
    {
        //without login
        $response = $this->get(route('settings.index'));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('settings.create'));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('settings.show', 1));
        $response->assertRedirect(route('login'));
        $response = $this->get(route('settings.edit', 1));
        $response->assertRedirect(route('login'));

        $usersIdsCanAccess=[1]; // SuperAdmin, Admin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->get(route('settings.index'));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('settings.create'));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('settings.show', 1));
            $response->assertStatus(200);
            $response = $this->actingAs($user)->get(route('settings.edit', 1));
            $response->assertStatus(200);
        }
        $usersIdsCanAccess=[2,3,4]; // Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->get(route('settings.index'));
            $response->assertStatus(403);
            $response = $this->actingAs($user)->get(route('settings.create'));
            $response->assertStatus(403);
            $response = $this->actingAs($user)->get(route('settings.show', 1));
            $response->assertStatus(403);
            $response = $this->actingAs($user)->get(route('settings.edit', 1));
            $response->assertStatus(403);
        }
    }


    public function test_superadmin_can_create_and_edit()
    {
        //check guests cannot create users
        $response = $this->post(route('settings.store'), [
            'type' => Setting::TYPE_TEXTFIELD,
            'group' => 'test',
            'name' => 'Field Name',
            'slug' => 'field-name',
            'options' => null,
            'value' => 'Este é um teste',
            'order' => 1,
        ])->assertRedirect(route('login'));

        $usersIdsCanAccess=[1]; // SuperAdmin, Admin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            //create
            $response = $this->actingAs($user)->post(route('settings.store'), [
                'type' => Setting::TYPE_TEXTFIELD,
                'group' => 'test',
                'name' => 'Field Name',
                'slug' => 'field-name-'.$user->id,
                'options' => null,
                'value' => 'Este é um teste',
                'order' => 1,
            ])->assertSessionHasNoErrors()
                ->assertStatus(302);
            $this->followRedirects($response)->assertSee('field-name-'.$user->id);

            //update
            $setting = Setting::where('id', 1)->first();
            $response = $this->actingAs($user)->patch(route('settings.update', 1), [
                'type' => $setting->type,
                'group' => $setting->group,
                'name' => $setting->name,
                'slug' => $setting->slug.'-'.$user->id,
                'options' => $setting->options,
                'value' => $setting->value,
                'order' => $setting->order,
            ])->assertSessionHasNoErrors()
                ->assertStatus(302);
            $this->followRedirects($response)->assertSee($setting->slug.'-'.$user->id);
        }
    }

    public function test_non_superadmins_users_cannot_create_or_edit()
    {
        $usersIdsCanAccess=[2,3,4]; // Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->post(route('settings.store'), [
                'type' => Setting::TYPE_TEXTFIELD,
                'group' => 'test',
                'name' => 'Field Name',
                'slug' => 'field-name-'.$user->id,
                'options' => null,
                'value' => 'Este é um teste',
                'order' => 1,
            ])->assertStatus(403);

            //update
            $setting = Setting::where('id', 1)->first();
            $response = $this->actingAs($user)->patch(route('settings.update', 1), [
                'type' => $setting->type,
                'group' => $setting->group,
                'name' => $setting->name,
                'slug' => $setting->slug.'-'.$user->id,
                'options' => $setting->options,
                'value' => $setting->value,
                'order' => $setting->order,
            ])->assertStatus(403);
            //$this->followRedirects($response)->assertSee('Name-'.$user->id);
        }
    }

    public function test_only_superadmins_can_delete(){

        $usersIdsCanAccess=[1]; // SuperAdmin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $setting = Setting::factory()->create();
            //create
            $response = $this->actingAs($user)->delete(route('settings.destroy', $setting))
                ->assertStatus(302);
            $this->assertEquals(Setting::where('id', $setting->id)->first(),null);
            $setting = Setting::factory()->create();
        }
        $usersIdsCanAccess=[2,3,4]; // admin, Manager, User
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $setting = Setting::factory()->create();
            //create
            $response = $this->actingAs($user)->delete(route('settings.destroy', $setting))
                ->assertStatus(403);
            $this->assertNotEquals(Setting::where('id', $setting->id)->first(),null);
        }
    }

    public function test_required_fields_validation()
    {
        $usersIdsCanAccess=[1]; // SuperAdmin
        $users = User::whereIn('id', $usersIdsCanAccess)->get(); // SuperAdmin
        foreach($users as $user){
            $this->app['auth']->logout();
            $response = $this->actingAs($user)->post(route('settings.store'), [
                'type' => null,
                'group' => null,
                'name' => null,
                'slug' => null,
                'options' => null,
                'value' => null,
                'order' => null,
            ])->assertSessionHasErrors(['name', 'slug', 'type', 'order']);
            $response = $this->actingAs($user)->post(route('settings.store'), [
                'type' => Setting::TYPE_TEXTFIELD,
                'group' => null,
                'name' => 'Test',
                'slug' => 'test',
                'options' => null,
                'value' => null,
                'order' => 1,
            ])->assertSessionHasNoErrors();
        }
    }
}
