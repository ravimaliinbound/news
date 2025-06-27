@include('admin.layout.header')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ Main Content ] start -->
        <div class="col-span-12 xl:col-span-8 md:col-span-6">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Manage News</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-dark">
                            <tbody>
                                <tr class="unread">
                                    <th>Sr. No.</th>
                                    <th>Headline</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                @php $sl = 1; @endphp
                                @foreach ($news as $n)

                                <tr class="unread">
                                    <th>{{ $sl }}</th>
                                    <th style="width: 50px">{{ $n->heading }}</th>
                                    <th>{{ $n->category }}</th>
                                    <th>
                                        <img style="width: 60px; margin-left: 110px" src="{{url('admin/upload/news/' . $n->image . '')}}"
                                            alt="activity-user" />
                                    </th>
                                    <th>
                                        <a href="#" class="btn btn-success">Edit</a>
                                        <a href="{{ route('news_delete', base64_encode($n->id)) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    </th>
                                </tr>
                                @php $sl++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
@include('admin.layout.footer')