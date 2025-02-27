<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Freelancer Tracking Time') }}@yield('title')</title>
<link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
<!-- BEGIN: Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- END: Google Font -->
<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" href="{{ asset('css/sidebar-menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/SimpleBar.css') }}">
<link rel="stylesheet" href="{{ asset('css/rt-plugins.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/activos360.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/autocomplete.css') }}">
<!-- END: Theme CSS-->
<script src="{{ asset('js/settings.js') }}" sync></script>
<script src="https://kit.fontawesome.com/2aae4013de.js" crossorigin="anonymous"></script>