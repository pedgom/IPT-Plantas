<?php
/**
 *
 * @var $role \App\Models\Role
 */
view()->share('pageTitle', __('Create role'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('roles.create') }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('Create role') }}
            </h3>
        </div>
        @include('roles._form')
    </div>
</x-base-layout>
