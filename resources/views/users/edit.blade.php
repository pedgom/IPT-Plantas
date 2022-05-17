<?php
/**
 *
 * @var $user \App\Models\User
 */

view()->share('pageTitle', $user->name);
view()->share('hideSubHeader', true);

?>
<x-base-layout>
    @section('breadcrumbs')
        @can('manageUsers')
            {{ Breadcrumbs::render('users.edit', $user) }}
        @else
            {{ Breadcrumbs::render('users.own_edit', $user) }}
        @endcan
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $user->name }}
            </h3>
        </div>
        @include('users._form')
    </div>
</x-base-layout>
