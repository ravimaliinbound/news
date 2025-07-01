@include('admin.layout.header')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        @if (session('success'))
            <div class="mb-5 border border-success rounded success_msg"
                style="width: fit-content;">
                <p class="text-success p-4" style="font-size: 18px;"> {{ session('success') }} </p>
            </div>
        @endif
        <!-- [ Main Content ] start -->
        <div class="col-span-12 xl:col-span-8 md:col-span-6">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Admins</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-dark">
                            <tbody>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                @php $num = 1; @endphp
                                @foreach ($admins as $admin)
                                    <tr>
                                        <th>{{ $num }}</th>
                                        <th>{{ $admin->name }}</th>
                                        <th>{{$admin->email}}</th>
                                    </tr>
                                    @php $num++ @endphp
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