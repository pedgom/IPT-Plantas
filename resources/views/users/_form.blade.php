{!! Form::model($user, ['route' => Route::currentRouteName() == 'users.create' ? ['users.store'] : ['users.update', $user], 'method' => Route::currentRouteName() == 'users.create' ? 'post' : 'patch', 'class' => "form", 'enctype' => "multipart/form-data"]) !!}

    <div class="card-body">
        <div class="mb-10">
            <!--begin::Image input-->
            <div class="image-input image-input-outline @if(!$user->hasMedia('avatar')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
                <!--begin::Image preview wrapper-->
                <div class="image-input-wrapper w-125px h-125px" @if($user->hasMedia('avatar')) style="background-image: url('{{ $user->getFirstMediaUrl('avatar') }}')" @endif></div>
                <!--end::Image preview wrapper-->

                <!--begin::Edit button-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                       data-kt-image-input-action="change"
                       data-bs-toggle="tooltip"
                       data-bs-dismiss="click"
                       title="{{ __('Change image') }}">
                    <i class="bi bi-pencil-fill fs-7"></i>

                    <!--begin::Inputs-->
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="delete_image" value="{{ old('delete_image') }}" />
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

        <div class="mb-10">
            {!! Form::label('name', __('Name'), ['class' => 'form-label required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control form-control-solid '.($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => __('Name')]) !!}
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('email', __('E-Mail address'), ['class' => 'form-label required']) !!}
            {!! Form::email('email', null, ['class' => 'form-control form-control-solid '.($errors->has('email') ? 'is-invalid' : ''), 'placeholder' => __('E-Mail address')]) !!}
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('password', __('Password'), ['class' => 'form-label']) !!}
            {!! Form::password('password', ['class' => 'form-control form-control-solid '.($errors->has('password') ? 'is-invalid' : ''), 'placeholder' => __('Password')]) !!}
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('password_confirmation', __('Confirm password'), ['class' => 'form-label']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control form-control-solid '.($errors->has('password_confirmation') ? 'is-invalid' : ''), 'placeholder' => __('Confirm password')]) !!}
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @can('manageUsers')
            <!-- Roles Form Input -->
            <div class="mb-10">
                {!! Form::label('roles[]', 'Roles', ['class'=>'form-label']) !!}
                {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['id' => 'select-roles','class' => 'form-select form-select-solid '.($errors->has('roles') ? "is-invalid" : ""), 'multiple', 'data-control'=>"select2", 'data-placeholder'=>__('Select a role')]) !!}
                @error('roles')
                <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
                @if(false)
                    @push('scripts')
                        <script>
                            jQuery(document).ready(function() {
                                $("#select-roles").select2({
                                    placeholder: '{{ __('Select a role') }}',
                                    allowClear: true,
                                });
                            });
                        </script>
                    @endpush
                @endif
            </div>
            <!-- Permissions -->
            @if(isset($user) && !empty($user->id))
                @include('users._permissions', ['closed' => 'true', 'model' => $user, 'options' => ['class' => 'form-check-input'] ])
            @endif
        @endcan
    </div>
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
        <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
    </div>
{!! Form::close() !!}
