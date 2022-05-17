<x-auth-layout>
    <!--begin::Forgot Password Form-->
    <form method="POST" action="{{ route('password.email') }}" class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
        @csrf
        @if(config('recaptchav3.enable'))
            {!! RecaptchaV3::field('resetPassword', 'g-recaptcha-response', true, 'kt_password_reset_form') !!}
        @endif
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Forgot Password ?') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('Enter your email to reset your password.') }}
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-gray-900 fs-6">{{ __('Email') }}</label>
            <input class="form-control form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email') }}" required autofocus/>
            @error('email')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div>{{ $message }}</div>
                </div>
            @enderror
        </div>
        <!--end::Input group-->

        @error('g-recaptcha-response')
            <div class="fv-plugins-message-container invalid-feedback mb-3">
                <div>{{ $message }}</div>
            </div>
        @enderror

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4" @if(config('recaptchav3.enable')) onclick="onClickRecaptcha(event)" @endif>
                @include('partials.general._button-indicator')
            </button>

            <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">{{ __('Cancel') }}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Forgot Password Form-->

</x-auth-layout>
