<?php
/**
 *
 * @var $role \App\Models\Role
 */
view()->share('pageTitle', $role->name);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('roles.edit', $role) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $role->name }}
            </h3>
        </div>
        @include('roles._form')
    </div>
</x-base-layout>
