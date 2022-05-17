<?php
/**
 *
 * @var $permission \App\Models\Permission
 */
view()->share('pageTitle', __('Create permission'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('permissions.create') }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('Create permission') }}
            </h3>
        </div>
        @include('permissions._form')
    </div>
</x-base-layout>
