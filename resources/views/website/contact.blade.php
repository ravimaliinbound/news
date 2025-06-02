@extends('website.layout.structure')
@section('main_code')
    <!-- Contact Us Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-light rounded p-5">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="">
                            <h1 class="mb-4">General Customer Care & Technical Support</h1>
                            <p class="mb-4">The contact form is currently inactive. Get a functional and working contact
                                form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and
                                you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                            <div class="rounded">
                                <iframe class="rounded w-100" style="height: 425px;"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.320967000335!2d72.5258790760362!3d23.011984416721823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84d638c4679f%3A0x21c2a193936cbccb!2sShyamal%20Cross%20Rd%2C%20Shyamal%2C%20Ahmedabad%2C%20Gujarat%20380015!5e0!3m2!1sen!2sin!4v1748863873614!5m2!1sen!2sin"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form action="" class="mb-4">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <input type="text" class="w-100 form-control border-0 py-3" name="name"
                                        placeholder="Your Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="w-100 form-control border-0 py-3" name="email"
                                        placeholder="Enter Your Email">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="w-100 form-control border-0 py-3" name="phone"
                                        placeholder="Enter Your Phone">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="w-100 form-control border-0 py-3" name="subject"
                                        placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea class="w-100 form-control border-0" rows="6" cols="10"
                                        placeholder="Your Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="w-100 btn btn-primary form-control py-3" type="submit">Submit
                                        Now</button>
                                </div>
                            </div>
                        </form>
                        <div class="row g-4">
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Address</h4>
                                        <p class="mb-0">Ahmedabad, Gujarat, India</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Mail Us</h4>
                                        <p class="mb-0">newsers@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Telephone</h4>
                                        <p class="mb-0">+91 9352238608</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fa fa-share-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Share</h4>
                                        <div class="d-flex">
                                            <a class="me-3" href=""><i class="fab fa-twitter text-dark link-hover"></i></a>
                                            <a class="me-3" href=""><i
                                                    class="fab fa-facebook-f text-dark link-hover"></i></a>
                                            <a class="me-3" href=""><i class="fab fa-youtube text-dark link-hover"></i></a>
                                            <a class="" href=""><i class="fab fa-linkedin-in text-dark link-hover"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#contact").addClass('active');
        });
    </script>
    <!-- Contact Us End -->
@endsection