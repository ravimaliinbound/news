@includeIf('website.layout.header')

<!-- Main Post Section Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="border-left: 2px solid deepskyblue;">
                <a href="#" class="display-5 text-dark mb-0 link-hover text-uppercase">Browsing : Entertainment</a>
            </div>
            <p class="mt-3 mb-4">All entertainment news and updates are published on this page.</p>
        </div>
        <div class="row g-4 my-3">
            <div class="col-lg-7 col-xl-8 mt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="position-relative overflow-hidden rounded">
                            <img src="{{url('website/img/news-1.jpg')}}" class="img-fluid rounded img-zoomin w-100"
                                alt="">
                        </div>
                        <div class="py-3">
                            <a href="#" class="mb-0 link-hover text-uppercase text-primary">Entertainment</a>
                            <big>
                                <b>
                                    <p class="text-dark mb-0 link-hover">Verde Review – Secure and Fast Payouts</p>
                                </b>
                            </big>
                        </div>
                        <p class="mt-3 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley standard dummy text ever since the 1500s, when an unknown
                            printer took a galley...
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative overflow-hidden rounded">
                            <img src="{{url('website/img/news-1.jpg')}}" class="img-fluid rounded img-zoomin w-100"
                                alt="">
                        </div>
                        <div class="py-3">
                            <a href="#" class="mb-0 link-hover text-uppercase text-primary">News</a>
                            <big>
                                <b>
                                    <p class="text-dark mb-0 link-hover">How Federal Drive Time Laws Help Prevent Truck
                                        Accidents and Save Lives</p>
                                </b>
                            </big>
                        </div>
                        <p class="mt-3 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer
                            took
                            a galley standard dummy text ever since the 1500s, when an unknown printer took a galley...
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 pt-0">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{url('website/img/news-3.jpg')}}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small>June 4, 2025 </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{url('website/img/news-5.jpg')}}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small>June 4, 2025 </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{url('website/img/news-6.jpg')}}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small>June 4, 2025 </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{url('website/img/news-7.jpg')}}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small>June 4, 2025 </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="{{url('website/img/news-7.jpg')}}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                        <small>June 4, 2025 </small>
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
<!-- Main Post Section End -->

<script>
    $(document).ready(function () {
        $("#entertainment").addClass('active');
    });
</script>
<!-- Most Populer News End -->
@includeIf('website.layout.footer')