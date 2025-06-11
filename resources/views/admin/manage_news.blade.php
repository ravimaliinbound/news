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
                        <table class="table table-hover">
                            <tbody>
                                <tr class="unread">
                                    <td>Sr. No.</td>
                                    <td>Headline</td>
                                    <td>Description</td>
                                    <td>Image</td>
                                    <td>Action</td>
                                    <!-- <td>
                                        <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Reject</a>
                                        <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a>
                                    </td> -->
                                </tr>
                                @php $sl = 1; @endphp
                                @foreach ($news as $n)

                                    <tr class="unread">
                                        <td>{{ $sl }}</td>
                                        <td style="width: 50px">{{ $n->heading }}</td>
                                        <td>ravi@gmail.com</td>
                                        <td>
                                            <img style="width: 50px" src="{{url('admin/upload/news/' . $n->image . '')}}"
                                                alt="activity-user" />
                                        </td>
                                        <td>
                                            <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Delete</a>
                                            <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Edit</a>
                                        </td>
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