<?php
/**
 *
 * @var $user \App\Models\User
 */
view()->share('pageTitle', __('Create new user'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('users.create') }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('Create new user') }}
            </h3>
        </div>
        @include('users._form')
    </div>
</x-base-layout>
