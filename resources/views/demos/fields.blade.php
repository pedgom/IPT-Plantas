<!-- Demo Id Field -->
<div class="mb-10">
    {!! Form::label('demo_id', $demo->getAttributeLabel('demo_id'), ['class' => 'form-label']) !!}
    {!! Form::select('demo_id', !empty($demo->demo) ? [$demo->demo_id => $demo->demo->name] : [], null , ['id' => 'demo_select','class' => 'form-select form-select-solid '.($errors->has('demo_id') ? 'is-invalid' : '')]) !!}
    @error('demo_id')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#demo_select").select2({
                    placeholder: '{{ __('Select a demo') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                    ajax: {
                        url: "{{ route('demos.get_demos') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term
                            };
                        },
                        cache: true,
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    templateResult: function (data) {
                        return data.text;
                    }, // omitted for brevity, see the source of this page
                    templateSelection: function (data) {
                        return data.text;
                    } // omitted for brevity, see the source of this page
                });
            });
        </script>
    @endpush
</div>


<!-- User Id Field -->
<div class="mb-10">
    {!! Form::label('user_id', $demo->getAttributeLabel('user_id'), ['class' => 'form-label']) !!}
    <div class="input-group input-group-solid flex-nowrap {{ ($errors->has('user_id') ? 'is-invalid' : '') }}">
        <span class="input-group-text"><i class="bi bi-person fs-4"></i></span>
        <div class="overflow-hidden flex-grow-1">
            {!! Form::select('user_id', !empty($demo->user) ? [$demo->user_id => $demo->user->name." [".$demo->user->email."]" ] : [], null , ['id' => 'user_select','class' => 'form-select form-select-solid rounded-start-0 border-start']) !!}
        </div>
    </div>
    @error('user_id')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#user_select").select2({
                    placeholder: '{{ __('Select a user') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                    ajax: {
                        url: "{{ route('users.get_users') }}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term
                            };
                        },
                        cache: true,
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    templateResult: function (data) {
                        return data.text;
                    }, // omitted for brevity, see the source of this page
                    templateSelection: function (data) {
                        return data.text;
                    } // omitted for brevity, see the source of this page
                });
            });
        </script>
    @endpush
</div>



<!-- Name Field -->
<div class="mb-10">
    {!! Form::label('name', $demo->getAttributeLabel('name'), ['class' => 'form-label ']) !!}
    {!! Form::text('name', null, ['class' => 'form-control form-control-solid '.($errors->has('name') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Body Field -->
<div class="mb-10">
    {!! Form::label('body', $demo->getAttributeLabel('body'), ['class' => 'form-label ']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control form-control-solid '.($errors->has('body') ? 'is-invalid' : '')]) !!}
    @error('body')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Optional Field -->
<div class="mb-10">
    {!! Form::label('optional', $demo->getAttributeLabel('optional'), ['class' => 'form-label ']) !!}
    {!! Form::text('optional', null, ['class' => 'form-control form-control-solid '.($errors->has('optional') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('optional')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Body Optional Field -->
<div class="mb-10">
    {!! Form::label('body_optional', $demo->getAttributeLabel('body_optional'), ['class' => 'form-label ']) !!}
    {!! Form::textarea('body_optional', null, ['class' => 'form-control form-control-solid '.($errors->has('body_optional') ? 'is-invalid' : '')]) !!}
    @error('body_optional')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Value Field -->
<div class="mb-10">
    {!! Form::label('value', $demo->getAttributeLabel('value'), ['class' => 'form-label']) !!}
    {!! Form::number('value', null, ['class' => 'form-control form-control-solid '.($errors->has('value') ? 'is-invalid' : '')]) !!}
    @error('value')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Date Field -->
<div class="mb-10">
    {!! Form::label('date', $demo->getAttributeLabel('date'), ['class' => 'form-label']) !!}
    <div class="position-relative d-flex align-items-center">
        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
        <span class="svg-icon svg-icon-2 position-absolute mx-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black"></path>
                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black"></path>
                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black"></path>
            </svg>
        </span>
        <!--begin::Datepicker-->
    {!! Form::text('date', null, ['class' => 'form-control form-control-solid ps-12 '.($errors->has('date') ? 'is-invalid' : ''), 'placeholder' => __('Pick a date') ]) !!}
    <!--end::Datepicker-->
    </div>
    @error('date')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@push('scripts')
    <!--<script src="{{ asset('demo1/js/custom/documentation/forms/flatpickr.js') }}"></script>-->

    <script>
        $(function(){
            $("#date").flatpickr({
                "locale": "pt"
            });
            //$("#date").daterangepicker();
        });
    </script>
@endpush


<!-- Datetime Field -->
<div class="mb-10">
    {!! Form::label('datetime', $demo->getAttributeLabel('datetime'), ['class' => 'form-label']) !!}
    <div class="position-relative d-flex align-items-center">
        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
        <span class="svg-icon svg-icon-2 position-absolute mx-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black"></path>
                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black"></path>
                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black"></path>
            </svg>
        </span>
        <!--begin::Datepicker-->
    {!! Form::text('datetime', null, ['class' => 'form-control form-control-solid ps-12 '.($errors->has('datetime') ? 'is-invalid' : ''), 'placeholder' => __('Pick a date') ]) !!}
    <!--end::Datepicker-->
    </div>
    @error('datetime')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@push('scripts')
    <script>
        $(function(){
            $("#datetime").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                "locale": "pt",
            });
        });
    </script>
@endpush

<div class="mb-10">
    <!--begin::Image input-->
    <div class="image-input image-input-outline @if(!$demo->hasMedia('cover')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" @if($demo->hasMedia('cover')) style="background-image: url('{{ $demo->getFirstMediaUrl('cover') }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="{{ __('Change image') }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input type="file" name="cover" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="delete_cover" value="{{ old('delete_cover') }}" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Cancel image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Remove image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
    <!--end::Image input-->
</div>

@php
    $uploadFileName = 'file';
@endphp
<!--begin::Input group-->
<div class="mb-10">
    <!--begin::Dropzone-->
    <div class="dropzone" id="upload-{{$uploadFileName}}">
        <!--begin::Message-->
        <div class="dz-message needsclick">
            <!--begin::Icon-->
            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
            <!--end::Icon-->

            <!--begin::Info-->
            <div class="ms-4">
                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">{{ __('Drop files here or click to upload.') }}</h3>
                <span class="fs-7 fw-bold text-gray-400">{{ trans_choice('[1] Upload :value file |[2,*] Upload up to :value files', 2,['value' => 2]) }}</span>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Dropzone-->
    <div id="upload-{{$uploadFileName}}-inputs" class="d-none">
        @if(false)
            @foreach($fileArray as $fileTemp)
                <div class="input-{{$uploadFileName}}-wrapper" data-id="{{ $fileTemp['id'] }}">
                    <input type="hidden" name="{{$uploadFileName}}[]" value="' + response.name + '">
                    <input type="hidden" name="{{$uploadFileName}}_original_name[]" value="' + response.original_name + '">
                </div>
            @endforeach
        @endif
    </div>
</div>
<!--end::Input group-->

@push('scripts')
    <script>
        var myDropzone = new Dropzone("#upload-{{$uploadFileName}}", {
            url: "{{route('home.api_upload')}}", // Set the url for your upload script location
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 2,
            maxFilesize: 10, // MB
            //parallelUploads: 10, //default2
            params: {'rules':'required|file|max:10240'},
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf",
            //acceptedFiles: ".jpeg,.jpg,.png,.gif",
            /*accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },*/
            success: function(file, response){
                //alert(response);
                console.log(file);
                console.log(response);
                if(response.success == true) {
                    $('#upload-file-inputs').append(
                        '<div class="input-{{$uploadFileName}}-wrapper" data-id="' + response.name + '">' +
                        '<input type="hidden" name="{{$uploadFileName}}[]" value="' + response.name + '">' +
                        '<input type="hidden" name="{{$uploadFileName}}_original_name[]" value="' + response.original_name + '">' +
                        '</div>'
                    );
                    if (file.previewElement) {
                        return file.previewElement.classList.add("dz-success");
                    }
                }
            },
            init: function () {
                let myDropzone = this;
                var urlsFiles =  {!! json_encode($demo->getFilesArray('files')) !!};
                urlsFiles.forEach((element, key, arr) => {
                    let mockFile = element;
                    this.displayExistingFile(mockFile, element.imageUrl);
                    this.files.push(mockFile); // required to count correctly the max files
                });
            }

        });


        // On all files removed
        myDropzone.on("removedfile", function (file) {
            console.log('vai remover', file);
            //if the file was uploaded now
            if(file.xhr !== undefined && file.xhr.response !== undefined) {
                serverResponse = JSON.parse(file.xhr.response);
                if( $('.input-{{$uploadFileName}}-wrapper[data-id="'+serverResponse.name+'"]').length){
                    $('.input-{{$uploadFileName}}-wrapper[data-id="'+serverResponse.name+'"]').remove();
                }
                jQuery.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: '{{route('home.api_upload_delete')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: {_method: 'DELETE', 'name': serverResponse.name},
                    success: function (data) {
                        console.log(data);
                        if (data.success === true) {
                            console.log("file removed");
                        } else {
                            toastr.error('{{ __('Something went wrong. Please try again.') }}');
                        }
                    },
                    error: function (response) {
                        console.log(response);
                        toastr.error('{{ __('Something went wrong. Please try again.') }}');
                    }
                });
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            }else if(file.id !== undefined){ // remove images that were already uploaded before
                $('.input-{{$uploadFileName}}-wrapper[data-id="'+file.id+'"]').remove();
                $('#upload-{{$uploadFileName}}-inputs').append('<div class="input-{{$uploadFileName}}-wrapper" data-id="' + file.id + '">' +
                    '<input type="hidden" name="{{$uploadFileName}}_delete[]" value="' + file.id  + '">' +
                    '</div>');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            }else{ // only remove the file in screen n
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            }


        });


    </script>
@endpush
@php
    $uploadFileName = 'template';
@endphp
<div class="mb-10 rounded border p-10">
    <!--begin::Input group-->
    <div class="form-group row">
        <!--begin::Label-->
        <label class="col-lg-2 col-form-label text-lg-right">{{ __('Upload Files') }}:</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-10">
            <!--begin::Dropzone-->
            <div class="dropzone dropzone-queue mb-2" id="upload-{{ $uploadFileName }}">
                <!--begin::Controls-->
                <div class="dropzone-panel mb-lg-0 mb-2">
                    <a class="dropzone-select btn btn-sm btn-primary me-2">{{ __('Attach files') }}</a>
                    <a class="dropzone-remove-all btn btn-sm btn-light-primary">{{ __('Remove All') }}</a>
                </div>
                <!--end::Controls-->

                <!--begin::Items-->
                <div class="dropzone-items wm-200px">
                    <div class="dropzone-item" style="display:none">
                        <!--begin::File-->
                        <div class="dropzone-file">
                            <div class="dropzone-filename" title="">
                                <span data-dz-name></span>
                                <strong>(<span data-dz-size></span>)</strong>
                            </div>

                            <div class="dropzone-error" data-dz-errormessage></div>
                        </div>
                        <!--end::File-->

                        <!--begin::Progress-->
                        <div class="dropzone-progress">
                            <div class="progress">
                                <div
                                    class="progress-bar bg-primary"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress>
                                </div>
                            </div>
                        </div>
                        <!--end::Progress-->

                        <!--begin::Toolbar-->
                        <div class="dropzone-toolbar">
                            <span class="dropzone-delete" data-dz-remove><i class="bi bi-x fs-1"></i></span>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Dropzone-->

            <!--begin::Hint-->
            <span class="form-text text-muted">{{ __('Max file size is :maxSize and max number of files is :maxFiles', ['maxSize' => '1MB', 'maxFiles' => '1']) }}.</span>
            <!--end::Hint-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <div id="upload-{{ $uploadFileName }}-inputs" class="d-none">

    </div>
</div>

@push('scripts')
    <script>
        // set the dropzone container id
        const id = "#upload-{{ $uploadFileName }}";
        const dropzone = document.querySelector(id);

        // set the preview element template
        var previewNode = dropzone.querySelector(".dropzone-item");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzoneTemplate = new Dropzone(id, { // Make the whole body a dropzone
            url: "{{route('home.api_upload')}}", // Set the url for your upload script location
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            parallelUploads: 10,
            maxFilesize: 1, // Max filesize in MB
            maxFiles: 1,
            params: {'rules':'required|file|max:10240'},
            acceptedFiles: "image/*,application/pdf",
            previewTemplate: previewTemplate,
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
            init: function () {
                let myDropzone = this;
                var urlsFiles =  {!! json_encode($demo->getFilesArray('template')) !!};
                urlsFiles.forEach((element, key, arr) => {
                    let mockFile = element;
                    this.displayExistingFile(mockFile, element.imageUrl);
                    this.files.push(mockFile); // required to count correctly the max files
                });
                const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
                dropzoneItems.forEach(dropzoneItem => {
                    dropzoneItem.style.display = '';
                });
            },
            success: function(file, response){
                //alert(response);
                console.log(file);
                console.log(response);
                if(response.success == true) {
                    $('#upload-file-inputs').append(
                        '<div class="input-{{ $uploadFileName }}-wrapper" data-id="' + response.name + '">' +
                        '<input type="hidden" name="{{ $uploadFileName }}" value="' + response.name + '">' +
                        '<input type="hidden" name="{{ $uploadFileName }}_original_name" value="' + response.original_name + '">' +
                        '</div>'
                    );
                }
            },
        });

        myDropzoneTemplate.on("addedfile", function (file) {
            // Hookup the start button
            const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
            dropzoneItems.forEach(dropzoneItem => {
                dropzoneItem.style.display = '';
            });
        });

        // Update the total progress bar
        myDropzoneTemplate.on("totaluploadprogress", function (progress) {
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.width = progress + "%";
            });
        });

        myDropzoneTemplate.on("sending", function (file) {
            // Show the total progress bar when upload starts
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.opacity = "1";
            });
        });

        // Hide the total progress bar when nothing"s uploading anymore
        myDropzoneTemplate.on("complete", function (progress) {
            const progressBars = dropzone.querySelectorAll('.dz-complete');

            setTimeout(function () {
                progressBars.forEach(progressBar => {
                    progressBar.querySelector('.progress-bar').style.opacity = "0";
                    progressBar.querySelector('.progress').style.opacity = "0";
                });
            }, 300);
        });

        // On all files removed
        myDropzoneTemplate.on("removedfile", function (file) {
            console.log('vai remover', file);
            //if the file was uploaded now
            if(file.xhr !== undefined && file.xhr.response !== undefined) {
                serverResponse = JSON.parse(file.xhr.response);
                if( $('.input-{{ $uploadFileName }}-wrapper[data-id="'+serverResponse.name+'"]').length){
                    $('.input-{{ $uploadFileName }}-wrapper[data-id="'+serverResponse.name+'"]').remove();
                }
                jQuery.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: '{{route('home.api_upload_delete')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: {_method: 'DELETE', 'name': serverResponse.name},
                    success: function (data) {
                        console.log(data);
                        if (data.success === true) {
                            console.log("file removed");
                        } else {
                            toastr.error('{{ __('Something went wrong. Please try again.') }}');
                        }
                    },
                    error: function (response) {
                        console.log(response);
                        toastr.error('{{ __('Something went wrong. Please try again.') }}');
                    }
                });
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            }else if(file.id !== undefined){ // remove images that were already uploaded before
                $('.input-{{ $uploadFileName }}-wrapper[data-id="'+file.id+'"]').remove();
                $('#upload-{{ $uploadFileName }}-inputs').append('<div class="input-{{ $uploadFileName }}-wrapper" data-id="' + file.id + '">' +
                    '<input type="hidden" name="{{ $uploadFileName }}_delete" value="' + file.id  + '">' +
                    '</div>');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            }else{ // only remove the file in screen n
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            }
        });


    </script>
@endpush


<!-- Checkbox Field -->
<div class="mb-10">
    <div class="form-check form-switch form-check-custom form-check-solid {{ ($errors->has('checkbox') ? 'is-invalid' : '') }}">
        {!! Form::hidden('checkbox', 0) !!}
        {!! Form::checkbox('checkbox', 1, null, ['class'=> 'form-check-input']) !!}
        {!! Form::label('checkbox', $demo->getAttributeLabel('checkbox'), ['class' => 'form-check-label']) !!}
    </div>
    @error('checkbox')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Privacy Policy Field -->
<div class="mb-10">
    <div class="form-check form-check-custom form-check-solid {{ ($errors->has('privacy_policy') ? 'is-invalid' : '') }}">
        {!! Form::hidden('privacy_policy', 0) !!}
        {!! Form::checkbox('privacy_policy', '1', null,['class' => 'form-check-input']) !!}
        {!! Form::label('privacy_policy', $demo->getAttributeLabel('privacy_policy'), ['class' => 'form-check-label']) !!}
    </div>
    @error('privacy_policy')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Status Field -->
<div class="mb-10">
    {!! Form::label('status', $demo->getAttributeLabel('status'), ['class' => 'form-label']) !!}
    {!! Form::select('status',\App\Models\Demo::getStatusArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('status') ? 'is-invalid' : '')]) !!}
    @error('status')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
