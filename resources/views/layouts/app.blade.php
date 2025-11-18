<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr"
      data-nav-layout="vertical"
      data-vertical-style="default"
      data-page-style="modern"
      data-width="fullwidth"
      data-header-position="fixed"
      data-menu-position="fixed"
      loader="enable">

<head>
    @include('layouts.partials.styles')
</head>

<body>
    <div class="progress-top-bar"></div>


<!-- Loader -->
<div id="loader" >
    <img src="{{ asset('assets/images/media/loader.svg') }}" alt="">
</div>
<!-- Loader -->
<div class="page">
        @include('layouts.partials.header')
        @include('layouts.partials.sidebar')
        @include('layouts.partials.maincontent')
        @include('layouts.partials.footer')
</div>

    @include('layouts.partials.scripts')
</body>

</html>
