<!DOCTYPE html>
{{--
Product Name: {{ theme()->getOption('product', 'description') }}
Author: Noop
Purchase: {{ theme()->getOption('product', 'purchase') }}
Website: https://noop.pt
Contact: dev@noop.pt
License: {{ theme()->getOption('product', 'license') }}
--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! theme()->printHtmlAttributes('html') !!} {{ theme()->printHtmlClasses('html') }}>
    {{-- begin::Head --}}
    <head>
        <meta charset="utf-8"/>
        @if (!empty($pageTitle))
            <title>{{ $pageTitle }}</title>
        @else
            <title>@yield('title', config('app.name', 'Laravel'))</title>
        @endif
        <meta name="description" content="@yield('page_description', $pageDescription ?? '')"/>
        <meta name="keywords" content="{{ theme()->getOption('meta', 'keywords') }}"/>
        <link rel="canonical" href="{{ ucfirst(theme()->getOption('meta', 'canonical')) }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="shortcut icon" href="{{ asset(theme()->getDemo() . '/' .theme()->getOption('assets', 'favicon')) }}"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- begin::Fonts --}}
        {{ theme()->includeFonts() }}
        {{-- end::Fonts --}}
        @if(config('recaptchav3.enable'))
            @guest
                {!! RecaptchaV3::initJs() !!}
            @endguest
        @endif

        @stack('firstStyles')

        @if (false && theme()->hasOption('page', 'assets/vendors/css'))
            {{-- begin::Page Vendor Stylesheets(used by this page) --}}
            @foreach (array_unique(theme()->getOption('page', 'assets/vendors/css')) as $file)
                {!! preloadCss(assetCustom($file)) !!}
            @endforeach
            {{-- end::Page Vendor Stylesheets --}}
        @endif

        @if (false && theme()->hasOption('page', 'assets/custom/css'))
            {{-- begin::Page Custom Stylesheets(used by this page) --}}
            @foreach (array_unique(theme()->getOption('page', 'assets/custom/css')) as $file)
                {!! preloadCss(assetCustom($file)) !!}
            @endforeach
            {{-- end::Page Custom Stylesheets --}}
        @endif

        @if (theme()->hasOption('assets', 'css'))
            {{-- begin::Global Stylesheets Bundle(used by all pages) --}}
            @foreach (array_unique(theme()->getOption('assets', 'css')) as $file)
                @if (strpos($file, 'plugins') !== false)
                    {!! preloadCss(assetCustom($file)) !!}
                @else
                    <link href="{{ assetCustom($file) }}" rel="stylesheet" type="text/css"/>
                @endif
            @endforeach
            {{-- end::Global Stylesheets Bundle --}}
        @endif
        <link href="{{ asset('custom-css/app.css') }}" rel="stylesheet" type="text/css" >

        @stack('styles')

    </head>
    {{-- end::Head --}}

    {{-- begin::Body --}}
    <body {!! theme()->printHtmlAttributes('body') !!} {!! theme()->printHtmlClasses('body') !!} {!! theme()->printCssVariables('body') !!}>

        @if (theme()->getOption('layout', 'loader/display') === true)
            {{ theme()->getView('layout/_loader') }}
        @endif

        @yield('content')

        {{-- begin::Javascript --}}
        @if (theme()->hasOption('assets', 'js'))
            {{-- begin::Global Javascript Bundle(used by all pages) --}}
            @foreach (array_unique(theme()->getOption('assets', 'js')) as $file)
                <script src="{{ asset(theme()->getDemo() . '/' .$file) }}"></script>
            @endforeach
            {{-- end::Global Javascript Bundle --}}
        @endif

        @if (false && theme()->hasOption('page', 'assets/vendors/js'))
            {{-- begin::Page Vendors Javascript(used by this page) --}}
            @foreach (array_unique(theme()->getOption('page', 'assets/vendors/js')) as $file)
                <script src="{{ asset(theme()->getDemo() . '/' .$file) }}"></script>
            @endforeach
            {{-- end::Page Vendors Javascript --}}
        @endif

        @if (false && theme()->hasOption('page', 'assets/custom/js'))
            {{-- begin::Page Custom Javascript(used by this page) --}}
            @foreach (array_unique(theme()->getOption('page', 'assets/custom/js')) as $file)
                <script src="{{ asset(theme()->getDemo() . '/' .$file) }}"></script>
            @endforeach
            {{-- end::Page Custom Javascript --}}
        @endif
        {{-- end::Javascript --}}




        @stack('scripts')
    </body>
    {{-- end::Body --}}
</html>
