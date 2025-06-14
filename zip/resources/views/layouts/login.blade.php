<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('images//') }}"sizes="48x48">
        <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/developer.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/password_generation.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
        <link rel="stylesheet" href="{{ asset('libs/select2/css/select2.min.css') }}">
    </head>

    <body>
        @yield('content')
        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/validation.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {{-- <script src="https://www.google.com/recaptcha/api.js?render=6LclcsopAAAAAP9rLyBOa-2AOBO6QBCnLXQUEqw1"></script> --}}
        <script>
        $('.select2').select2();
        // grecaptcha.ready(function() {
        //      grecaptcha.execute('6LclcsopAAAAAP9rLyBOa-2AOBO6QBCnLXQUEqw1', {action: 'contact'}).then(function(token) {
        //         if (token) {
        //           document.getElementById('recaptcha').value = token;
        //         }
        //      });
        // });
        </script>
        <script type="text/javascript">
            @if(Session::has('messages'))
                $(document).ready(function() {
                    @foreach(Session::get('messages') AS $msg) 
                        toastr['{{ $msg["type"] }}']('{{$msg["message"]}}');
                    @endforeach
                });
            @endif
            
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
