<div class="accordion " id="accordionPermissionHeading">
    <div class="accordion-item">
        <h2 class="accordion-header" id="accordionPermissionHeader">
            <button class="accordion-button fs-4 fw-bold {{ $closed ? 'collapsed' : ''}}" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPermissionBody" aria-expanded="{{ $closed ? 'false' : 'true' }}" aria-controls="accordionPermissionBody">
                <i class="flaticon-lock"></i> {{ __('Override Permissions') }}&nbsp;&nbsp;  {!! isset($user) ? '<span class="text-danger">(' . $user->getDirectPermissions()->count() . ')</span>' : '' !!}
            </button>
        </h2>
        <div id="accordionPermissionBody" class="accordion-collapse collapse {{ $closed ? '' : 'show' }}" aria-labelledby="accordionPermissionHeader" data-bs-parent="#accordionPermissionHeading">
            <div class="accordion-body">

                <div class="row">
                    @foreach($permissions as $perm)
                        <?php
                        $per_found = null;
                        if( isset($role) ) {
                            $per_found = $role->hasPermissionTo($perm->name);
                        }
                        if( isset($user)) {
                            $per_found = $user->hasDirectPermission($perm->name);
                        }
                        ?>
                        <div class="col-md-3 mb-6">
                            <div class="form-check form-check-custom form-check-solid">
                                {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!}
                                <label class="form-check-label {{ Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                    {{ $perm->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
