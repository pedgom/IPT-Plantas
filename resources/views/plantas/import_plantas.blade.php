
<x-base-layout>

    <div style="margin-top:40px; background-color: #ffffff" class="mb-10 rounded border p-10">
        <p>Para efetuar a importação de plantas através de Excel, por favor, faça o download deste ficheiro.</p>
        <a href="/download" style="background: #333ab7; border-radius: 10px;color: #fff; padding:12px; display: block; text-decoration: none;width: 150px">Download Now</a>
    </div>

<form action="{{ route("plantas.submit_plantas") }}" method="post" enctype="multipart/form-data">
    @csrf


@php
    $uploadFileName = 'template';
@endphp
<div style="background-color: #ffffff" class="mb-10 rounded border p-10">
    <!--begin::Input group-->
    <div  class="form-group row">
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
            acceptedFiles: ".xls,.xlsx,.csv",
            previewTemplate: previewTemplate,
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
            init: function () {
                let myDropzone = this;
                var urlsFiles =  {!! json_encode([], true) !!};
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
                    $('#upload-{{$uploadFileName}}-inputs').append(
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

    <input style="background: #333ab7; color: #fff; padding:12px; display: block; text-decoration: none;width: 150px; border-radius: 10px;" type="submit" value="Submeter">


</form>



    </x-base-layout>
