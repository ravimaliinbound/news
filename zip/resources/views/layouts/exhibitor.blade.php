<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | PLEXPOINDIA 2024</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('components.exhibitor.partials.header_link')
    </head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">
            <x-exhibitor-topnavigation />
            
            <x-exhibitor-sidebar  />
            <div class="main-content">
                @yield('content')
                <x-exhibitor-footer />
                @include('components.exhibitor.partials.modal')

            </div>
        </div>
        <div class="rightbar-overlay"></div>
        @include('components.exhibitor.partials.footer_link')
        @yield('js')
        <script type="text/javascript">
            @if(Session::has('messages'))
                $(document).ready(function() {
                    @foreach(Session::get('messages') AS $msg) 
                        toastr['{{ $msg["type"] }}']('{{$msg["message"]}}','{{ $msg["title"] }}');
                    @endforeach
                });
            @endif
            
            @php
                echo "<pre>";
                print_r($errors);
                exit;
            @endphp
            @if (count($errors) > 0) 
                $(document).ready(function() {
                    @foreach($errors->all() AS $error)
                        toastr['error']('{{$error}}');
                    @endforeach     
                });
            @endif
        </script>
    </body>
</html>