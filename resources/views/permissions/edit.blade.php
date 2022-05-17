<?php
/**
 *
 * @var $permission \App\Models\Permission
 */
view()->share('pageTitle', $permission->name);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('permissions.edit', $permission) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $permission->name }}
            </h3>
        </div>
        @include('permissions._form')
    </div>
</x-base-layout>
