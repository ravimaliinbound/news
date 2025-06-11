@includeIf('website.layout.header')

<!-- Main Post Section Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="border-left: 2px solid deepskyblue;">
                <a href="#" class="display-5 text-dark mb-0 link-hover text-uppercase">Browsing : Business</a>
            </div>
            <p class="mt-3 mb-4">All business news and updates are published on this page.</p>
        </div>
        <div class="row g-4 my-3">
            <div class="col-lg-7 col-xl-8 mt-0">
                <div class="row">
                    @foreach ($business as $b)
                        <div class="col-lg-6">
                            <div class="position-relative overflow-hidden rounded">
                                <img class="img-fluid rounded img-zoomin w-100"
                                    src="{{url('admin/upload/news/' . $b->image . '')}}" alt="activity-user" />
                            </div>
                            <div class="py-3">
                                <a href="#" class="mb-0 link-hover text-uppercase text-primary">{{$b->category}}</a>
                                <big>
                                    <b>
                                        <p class="text-dark mb-0 link-hover">{{$b->heading}}</p>
                                    </b>
                                </big>
                                <small>

                                </small>
                            </div>
                            <p class="mt-3 mb-4">{{$b->description}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 pt-0">
                    <div class="row g-4">
                        @foreach($all_news as $b)
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{url('admin/upload/news/' . $b->image . '')}}"
                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">{{$b->heading}}</a>
                                            <small>June 4, 2025 </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Post Section End -->

<script>
    $(document).ready(function () {
        $("#business").addClass('active');
    });
</script>
<!-- Most Populer News End -->
@includeIf('website.layout.footer')