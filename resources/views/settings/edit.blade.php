<?php
/**
 *
 * @var $setting \App\Models\Setting
 */
view()->share('pageTitle', $setting->name);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('settings.edit', $setting) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $setting->name }}
            </h3>
        </div>
        @include('settings._form')
    </div>
</x-base-layout>
