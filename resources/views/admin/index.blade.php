@include('admin.layout.header')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ Main Content ] start -->
        <div class="col-span-12 xl:col-span-8 md:col-span-6">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Admins</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr class="unread">
                                   <td>Sr. No.</td>
                                   <td>Name</td>
                                    <td>Email</td>
                                    <td>Image</td>
                                    <!-- <td>
                                        <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Reject</a>
                                        <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a>
                                    </td> -->
                                </tr>
                                <tr class="unread">
                                    <td>
                                        1
                                    </td>
                                   <td>Ravi Mali</td>
                                    <td>ravi@gmail.com</td>
                                     <td>
                                        <img class="rounded-full max-w-10" style="width: 40px"
                                            src="{{url('admin/images/user/avatar-1.jpg')}}" alt="activity-user" />
                                    </td>
                                    <!-- <td>
                                        <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Reject</a>
                                        <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a>
                                    </td> -->
                                </tr>
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