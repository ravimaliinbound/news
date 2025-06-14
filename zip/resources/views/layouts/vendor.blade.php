<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | PLEXPOINDIA 2024</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.vendor.partials.header_link')
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <x-vendor-topnavigation />
        <x-vendor-sidebar />
        <div class="main-content">
            @yield('content')
            <x-vendor-footer />
            @include('components.vendor.partials.modal')
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    @include('components.vendor.partials.footer_link')
    @yield('js')
    <script type="text/javascript">
        $(document).ready(function() {
            @if(Session::has('messages'))
                @foreach(Session::get('messages') as $msg)
                    toastr['{{ $msg["type"] }}']('{{ $msg["message"] }}', '{{ $msg["title"] }}');
                @endforeach
            @endif

            @if ($errors->any())
                @foreach($errors->all() as $error)
                    toastr['error']('{{ $error }}');
                @endforeach     
            @endif
        });
    </script>
</body>
</html>
