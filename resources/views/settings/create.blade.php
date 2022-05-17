<?php
/**
 *
 * @var $setting \App\Models\Setting
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', __('Create setting'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('settings.create') }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('Create setting') }}
            </h3>
        </div>
        @include('settings._form')
    </div>
</x-base-layout>
