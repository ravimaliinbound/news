@includeIf('website.layout.header')

<!-- Main Post Section Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="border-left: 2px solid deepskyblue;">
                <a href="#" class="display-5 text-dark mb-0 link-hover text-uppercase">Browsing : News</a>
            </div>
            <p class="mt-3">All news about the web are published on this page.</p>
        </div>
        <div class="row g-4 my-3">
            <div class="col-lg-8 col-xl-8 mt-0">
                <div class="py-3">
                    <big>
                        <b>
                            <p class="text-dark mb-0 link-hover">{{$news->heading}}</p>
                        </b>
                    </big>
                </div>
                <div class="position-relative overflow-hidden ">
                    <img class="img-fluid  w-100" src="{{url('admin/upload/news/' . $news->image . '')}}"
                        alt="activity-user" />
                </div>
                <div class="py-3">
                    <a href="#" class="mb-0 link-hover text-uppercase text-primary">{{$news->category}}</a>
                </div>
                <p class="mt-3 mb-4">{{$news->description}}</p>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 pt-0">
                    <div class="row g-4">
                        @foreach($newses as $n)
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <a href="{{$n->id}}">
                                            <div class="overflow-hidden">
                                                <img src="{{url('admin/upload/news/' . $n->image . '')}}"
                                                    class="img-fluid w-100" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{$n->id}}" class="h6">{{$n->heading}}</a>
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

<!-- Most Populer News End -->
@includeIf('website.layout.footer')