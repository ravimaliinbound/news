@include('admin.layout.header')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        @if (session('success'))
            <div class="mb-5 border border-success rounded success_msg" style="width: fit-content;">
                <p class="text-success p-4" style="font-size: 18px;"> {{ session('success') }} </p>
            </div>
        @endif
        <!-- [ Main Content ] start -->
        <div class="col-span-12 xl:col-span-8 md:col-span-6">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Manage Users</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-dark">
                            <tbody>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @php $sl = 1; @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $sl }}</th>
                                        <th>{{ $user->name }}</th>
                                        <th>{{ $user->email }}</th>
                                        <th style="width: 80px;">
                                            <img style="width: 50px; height: 50px; border-radius: 50%;"
                                                src="{{url('website/upload/users/' . $user->image . '')}}"
                                                alt="activity-user" />
                                        </th>
                                        @php
                                            if ($user->status == 'blocked') {
                                                $class = 'btn btn-danger';
                                                $block_class = 'btn btn-success';
                                                $text = 'Unblock';
                                            } else {
                                                $class = 'btn btn-success';
                                                $block_class = 'btn btn-danger';
                                                $text = 'Block User';
                                            }
                                        @endphp
                                        <th><span class="<?php    echo $class ?>"
                                                style="margin-left: 15px;">{{ $user->status }}</span></th>
                                        <th>
                                            <a href="{{ route('block_unblock_user', base64_encode($user->id)) }}"
                                                class="{{ $block_class }}"
                                                onclick="return confirm('Do you really want to {{ $text }}?')">{{ $text }}</a>
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
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.success_msg').fadeOut('slow');
        }, 3000);
    })
</script>