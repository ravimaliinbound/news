@includeIf('website.layout.header')

<!-- Main Post Section Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="border-left: 2px solid deepskyblue;">
                <a href="#" class="display-5 text-dark mb-0 link-hover text-uppercase">Browsing : Profile</a>
            </div>
            <p class="mt-3 mb-4">Your information is published on this page.</p>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-4" style="margin-left: 200px;">
                    <div class="card" style="width:400px;">
                        <img class="card-img-top" style="height:400px;"
                            src="{{ asset('website/upload/users/' . $user->image) }}" alt="Card image"
                            style="width:100%">
                    </div>
                </div>
                <div class="col-lg-4 text-dark" style="margin-left: 200px;">
                    <h3>Name: {{$user->name}}</h3>
                    <h3>Email: {{$user->email}}</h3>
                    <a href="{{ route('edit_user_profile', base64_encode($user->id)) }}" class="btn btn-success mt-5">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Main Post Section End -->

<script>
    $(document).ready(function() {
        $("#profile").addClass('active');
    });
</script>
<!-- Most Populer News End -->
@includeIf('website.layout.footer')