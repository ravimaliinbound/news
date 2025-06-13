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
                    @foreach ($entertainment as $ent)
                        <div class="col-lg-6">
                            <a href="show_news/{{$ent->id}}">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid w-100"
                                        src="{{url('admin/upload/news/' . $ent->image . '')}}" alt="activity-user" />
                                </div>
                            </a>
                            <div class="py-3">
                                <a href="#" class="mb-0 link-hover text-uppercase text-primary">{{$ent->category}}</a>
                                <big>
                                    <a href="show_news/{{$ent->id}}">
                                        <b>
                                            <p class="text-dark mb-0 link-hover">{{$ent->heading}}</p>
                                        </b>
                                    </a>
                                </big>
                                <small>

                                </small>
                            </div>
                            <p class="mt-3 mb-4" id="ent_descr">{{$ent->description}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 pt-0">
                    <div class="row g-4">
                        @foreach($all_news as $n)
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <a href="show_news/{{$n->id}}">
                                            <div class="overflow-hidden">
                                                <img src="{{url('admin/upload/news/' . $n->image . '')}}"
                                                    class="img-fluid w-100" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="show_news/{{$n->id}}" class="h6">{{$n->heading}}</a>
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
        $("#entertainment").addClass('active');
    });
</script>
<!-- Most Populer News End -->
@includeIf('website.layout.footer')