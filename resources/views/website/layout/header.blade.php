<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Newsers</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('website/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('website/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('website/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{url('website/img/logo.png')}}">

    <!-- jQuery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- jQuery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Template Stylesheet -->
    <link href="{{url('website/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid sticky-top px-0">
        <div class="container-fluid bg-light">
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl">
                    <a href="{{ route('index') }}" class="navbar-brand mt-3">
                        <p class="text-primary display-6 mb-2" style="line-height: 0;">Taza Khabar</p>
                        <small class="text-body fw-normal" style="letter-spacing: 18px;">Newspaper</small>
                        <!-- <img src="{{url('website/img/logo.png')}}" alt="" height="77px"> -->
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top">
                            <a href="{{ route('index') }}" class="nav-item nav-link" id="home">News</a>
                            <a href="{{ route('technology') }}" class="nav-item nav-link" id="technology">Technology</a>
                            <a href="{{ route('business') }}" class="nav-item nav-link" id="business">Business</a>
                            <a href="{{ route('entertainment') }}" class="nav-item nav-link"
                                id="entertainment">Entertainment</a>
                            <a href="{{ route('science') }}" class="nav-item nav-link" id="science">Science / Health</a>
                            <a href="{{ route('travel') }}" class="nav-item nav-link" id="travel">Travel</a>

                            <?php
if (session()->get('user_id')) {
                            ?>
                            <a href="{{ route('user-profile') }}" class="nav-item nav-link" id="profile">Profile</a>
                            <a href="{{ route('user-logout') }}" class="nav-item nav-link text-danger"
                                onclick="return confirm('Do you really want to logout?');" id="travel">Logout</a>
                            <?php
} else {
                            ?>
                            <a href="{{ route('login') }}" class="nav-item nav-link text-danger" id="travel">Login</a>
                            <?php
}
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->