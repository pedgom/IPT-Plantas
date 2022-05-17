<?php
/**
 *
 * @var $setting \App\Models\Setting | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($setting, ['route' => Route::currentRouteName() == 'settings.create' ? ['settings.store'] : ['settings.update', $setting], 'method' => Route::currentRouteName() == 'settings.create' ? 'post' : 'put', 'class' => "form"]) !!}

    <div class="card-body">
        <div class="mb-10">
            {!! Form::label('type', __('Type'), ['class' => 'form-label ']) !!}
            {!! Form::select('type', \App\Models\Setting::getTypeArray() , null , ['class' => 'form-select form-select-solid '.($errors->has('type') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('group', __('Group'), ['class' => 'form-label ']) !!}
            {!! Form::text('group', null, ['class' => 'form-control form-control-solid '.($errors->has('group') ? 'is-invalid' : '')]) !!}
            @error('group')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('name', __('Name'), ['class' => 'form-label ']) !!}
            {!! Form::text('name', null, ['class' => 'form-control form-control-solid '.($errors->has('name') ? 'is-invalid' : ''), 'required' => true ]) !!}
            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
        </div>
        <div class="mb-10">
            {!! Form::label('slug', __('Slug'), ['class' => 'form-label ']) !!}
            {!! Form::text('slug', null, ['class' => 'form-control form-control-solid '.($errors->has('slug') ? 'is-invalid' : ''), 'required' => true ]) !!}
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('options', __('Options')) !!}
            {!! Form::text('options', null, ['class' => 'form-control form-control-solid '.($errors->has('options') ? 'is-invalid' : '') ]) !!}
            @error('options')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('value', __('Value'), ['class' => 'form-label ']) !!}
            {!! Form::text('value', null, ['class' => 'form-control form-control-solid '.($errors->has('value') ? 'is-invalid' : '') ]) !!}
            @error('value')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            {!! Form::label('order', __('Order'), ['class' => 'form-label ']) !!}
            {!! Form::text('order', null, ['class' => 'form-control form-control-solid '.($errors->has('order') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('order')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
        <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
    </div>
{!! Form::close() !!}
