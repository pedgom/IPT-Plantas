<?php
/**
 *
 * @var $role \App\Models\Role
 * @var $permissions \App\Models\Permission[]
 */
view()->share('pageTitle', $role->name);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('roles.show', $role) }}
    @endsection
    <div class="card mb-5 mb-xl-10">
        <div class="card-header">
            <h3 class="card-title">{{ $role->name }}</h3>
            <div class="card-toolbar">

            </div>
        </div>
        <div class="card-body">
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Name') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $role->name }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Guard name') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $role->guard_name }}</span>
                </div>
            </div>

            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Created at') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $role->created_at }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Updated at') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $role->updated_at }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Permissions') }}</h3>
            <div class="card-toolbar">

            </div>
        </div>
        <form class="form" method="POST" action="{{route('roles.update_permissions', $role)}}">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    @foreach($permissions as $perm)
                        <?php
                        $per_found = null;

                        if( isset($role) ) {
                            $per_found = $role->hasPermissionTo($perm->name);
                        }

                        /*if( isset($user)) {
                            $per_found = $user->hasDirectPermission($perm->name);
                        }*/
                        ?>
                        <div class="col-md-3 mb-6">
                            <div class="form-check form-check-custom form-check-solid">
                                {!! Form::checkbox("permissions[]", $perm->name, $per_found, ['class' => 'form-check-input']) !!}
                                <label class="form-check-label">
                                    {{ $perm->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</x-base-layout>
