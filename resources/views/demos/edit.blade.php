<?php
/**
 *
 * @var $demo \App\Models\Demo
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', $demo->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('demos.edit', $demo) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $demo->id }}
            </h3>
        </div>
        {!! Form::model($demo, ['route' => ['demos.update', $demo], 'method' => 'patch', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('demos.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                setInterval(function(){
                    jQuery.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: '{{ route('home.renew_model_lock') }}',
                        type: 'POST',
                        dataType: 'json',
                        data: { modelType: "{{ str_replace("\\", "\\\\",get_class($demo)) }}", modelId: {{ $demo->id }} }
                    }).always(function (data) {
                        if(data.success == false){
                            toastr.error("{{ __('Other user have starting editing this process. Please go back and click on edit again to prevent double editions.') }}");
                        }
                    });
                }, 29000);
            });
            $(window).on("beforeunload", function() {
                jQuery.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: '{{ route('home.renew_model_lock') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: { modelType: "{{ str_replace("\\", "\\\\",get_class($demo)) }}", modelId: {{ $demo->id }}, close:1  }
                }).always(function (data) {
                    if(data.success == false){
                        toastr.error("{{ __('Other user have starting editing this process. Please go back and click on edit again to prevent double editions.') }}");
                    }
                });
            });
        </script>
    @endpush
</x-base-layout>
