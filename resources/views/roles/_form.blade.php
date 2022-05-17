<?php
/**
 *
 * @var $role \App\Models\Role | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

{!! Form::model($role, ['route' => \Illuminate\Support\Facades\Route::currentRouteName() == 'roles.create' ? ['roles.store'] : ['roles.update', $role], 'method' => \Illuminate\Support\Facades\Route::currentRouteName() == 'roles.create' ? 'post' : 'patch', 'class' => "form"]) !!}
    <div class="card-body">
        <div class="mb-10">
            {!! Form::label('name', __('Name'), ['class' => 'form-label required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control form-control-solid '.($errors->has('name') ? 'is-invalid' : ''), 'required' => true, 'placeholder'=>__('Name')]) !!}
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('guard_name', __('Guard name'), ['class' => 'form-label ']) !!}
            {!! Form::text('guard_name', null, ['class' => 'form-control form-control-solid '.($errors->has('guard_name') ? 'is-invalid' : '')]) !!}
            <span class="form-text text-muted">{{ __('Default value is "web".') }}</span>
            @error('guard_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
        <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
    </div>

{!! Form::close() !!}
