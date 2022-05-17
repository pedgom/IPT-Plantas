@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @if(false)
            @include('flash::modal', [
                'modalClass' => 'flash-modal',
                'title'      => $message['title'],
                'body'       => $message['message']
            ])
        @endif
    @else
        <!--begin::Alert-->
        <div class="alert {{ $message['important'] ? '' : 'alert-dismissible' }} bg-light-{{ $message['level'] }} border border-{{ $message['level'] }} border-dashed d-flex flex-column flex-sm-row w-100 px-5 py-0 mb-10">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
            {{-- <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black"></path>
                    <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black"></path>
                </svg>
            </span> --}}
            <!--end::Svg Icon-->
            <!--end::Icon-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-center pe-0 pe-sm-10 py-3">
                <!--begin::Title-->
            {{--<h4 class="mb-2 light">This is an alert</h4>--}}
            <!--end::Title-->

                <!--begin::Content-->
                <span>{!! $message['message'] !!}</span>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        @if (!$message['important'])

            <!--begin::Close-->
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <i class="bi bi-x fs-1 text-{{ $message['level'] }}"></i>
                   <!--<span class="svg-icon svg-icon-1 svg-icon-{{ $message['level'] }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>-->
                </button>
                <!--end::Close-->
            @endif
        </div>
        <!--end::Alert-->
    @endif
@endforeach
@push('scripts')
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toastr-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @foreach (session('flash_notification', collect())->toArray() as $message)
            @if ($message['overlay'] == true)
                @switch($message['level'])
                    @case('success')
                        toastr.success('{{ $message['message'] }}');
                        @break
                    @case('info')
                        toastr.info('{{ $message['message'] }}');
                        @break
                    @case('warning')
                        toastr.warning('{{ $message['message'] }}');
                        @break
                    @case('error')
                    @case('danger')
                        toastr.error('{{ $message['message'] }}');
                        @break
                    @default
                        toastr.success('{{ $message['message'] }}');
                @endswitch

            @endif
        @endforeach
    </script>
@endpush

{{ session()->forget('flash_notification') }}
