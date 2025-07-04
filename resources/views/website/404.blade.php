@include('website.layout.header')

        <!-- 404 Start -->
        <div class="container-fluid py-5">
            <div class="container py-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                        <h1 class="display-1">404</h1>
                        <h1 class="mb-4">Page Not Found</h1>
                        <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                        <a class="btn link-hover border border-primary rounded-pill py-3 px-5" href="{{ route('index') }}">Go Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function () {
            $("#404").addClass('active');
        });
    </script>
        <!-- 404 End -->
@include('website.layout.footer')
 