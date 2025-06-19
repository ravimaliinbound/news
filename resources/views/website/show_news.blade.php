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
        <div class="py-3" style="width: 1100px;">
            <h1 class="text-dark mb-0 link-hover">{{$news->heading}}</h1>
            <small>
                <p class="text-secondary mt-2">{{$news->date}}</p>
            </small>
        </div>
        <div class="row g-4 my-3">
            <div class="col-lg-8 col-xl-8 mt-0">

                <div class="position-relative overflow-hidden ">
                    <img class="img-fluid  w-100" src="{{url('admin/upload/news/' . $news->image . '')}}"
                        alt="activity-user" />
                </div>
                @php
                $desc = $news->description;
                @endphp
                <p class="mt-5 mb-4"><?php echo $desc; ?></p>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 pt-0">
                    <div class="row g-4">
                        @foreach($newses as $n)
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5" style="height: 100px;">
                                    <a href="{{ route('show_news', base64_encode($n->id)) }}">
                                        <div class="overflow-hidden">
                                            <img src="{{url('admin/upload/news/' . $n->image . '')}}"
                                                class="img-fluid w-100" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-7" style="height: 100px;">
                                    <div class="features-content d-flex flex-column">
                                        <a href="{{ route('show_news', base64_encode($n->id)) }}"
                                            class="h6 heads">{{$n->heading}}</a>
                                        <small>
                                            <p class="text-secondary">{{$n->date}}</p>
                                        </small>
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