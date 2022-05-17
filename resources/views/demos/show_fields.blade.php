<!-- Demo Id Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('demo_id') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ !empty($demo->demo) ? $demo->demo->name : "" }}</span>
    </div>
</div>


<!-- User Id Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('user_id') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ !empty($demo->user) ? $demo->user->name ." [".$demo->user->email."]" : "" }}</span>
    </div>
</div>


<!-- Name Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('name') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->name }}</span>
    </div>
</div>


<!-- Body Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('body') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{!! nl2br($demo->body) !!}</span>
    </div>
</div>


<!-- Optional Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('optional') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->optional }}</span>
    </div>
</div>


<!-- Body Optional Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('body_optional') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->body_optional }}</span>
    </div>
</div>


<!-- Value Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('value') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->value }}</span>
    </div>
</div>


<!-- Date Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('date') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->date }}</span>
    </div>
</div>


<!-- Datetime Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('datetime') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->datetime }}</span>
    </div>
</div>

@if($demo->hasMedia('cover'))
    <!-- Cover Field -->
    <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('cover') }}</label>
        <div class="col-lg-8">
            <a href="{{ $demo->getFirstMediaUrl('cover') }}" target="_blank"><img src="{{ $demo->getFirstMediaUrl('cover') }}" style="max-height: 120px;"></a>
        </div>
    </div>
@endif

@if($demo->hasMedia('files'))
    <!-- Files Field -->
    <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('files') }}</label>
        <div class="col-lg-8">
            @foreach($demo->getMedia('files') as $file)
                @if($file->getTypeFromMime() == 'image')
                    <a href="{{ $file->getUrl() }}" target="_blank"><img src="{{ $file->getUrl() }}" style="max-height: 120px;" alt="{{ $file->name }}"></a><br>
                @else
                    <a href="{{ $file->getUrl() }}" target="_blank">{{ $file->name }}</a><br>
                @endif
            @endforeach
        </div>
    </div>
@endif

@if($demo->hasMedia('template'))
    <!-- Files Field -->
    <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('template') }}</label>
        <div class="col-lg-8">
            @foreach($demo->getMedia('template') as $file)
                <a href="{{ $file->getUrl() }}" target="_blank">{{ $file->name }}</a><br>
            @endforeach
        </div>
    </div>
@endif



<!-- Checkbox Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('checkbox') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->checkbox }}</span>
    </div>
</div>


<!-- Privacy Policy Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('privacy_policy') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->privacy_policy ? __('Accepted') : __('Not accepted') }}</span>
    </div>
</div>


<!-- Status Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $demo->getAttributeLabel('status') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $demo->statusLabel }}</span>
    </div>
</div>


