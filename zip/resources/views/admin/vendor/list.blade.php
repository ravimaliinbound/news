@extends('layouts.admin')
@section('title', 'User List')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">User List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">User List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            {{-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.vendor.list') }}">
                            <div class="row">  

                                <div class="col-md-3 mb-3">
                                    <label class="control-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="">Select Status</option>
                                        <option value="PENDING" {{ request()->status == 'PENDING' ? 'selected' : '' }}>Pending</option>
                                        <option value="APPROVED" {{ request()->status == 'APPROVED' ? 'selected' : '' }}>Approved</option>
                                        <option value="REJECTED" {{ request()->status == 'REJECTED' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="control-label">Category</label>
                                    <select class="form-select select2" name="category[]" data-placeholder="Select Category" multiple>
                                      @forelse($services as $service)
                                            <option value="{{ $service->id }}" {{ request()->services == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                        @empty
                                            <option disabled>No categories available</option>
                                        @endforelse
                                </select>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <button type="submit" class="btn btn-primary vendors save_button mt-1">Submit</button>
                                    @if ($filter == 1)
                                        <a href="{{ route('admin.vendor.list') }}" class="btn btn-danger mt-1 cancel_button" id="filter" name="save_and_list" value="save_and_list">
                                            Reset
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

            <!-- end page title -->
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.vendor.create') }}" class="btn btn-primary float-right"> Add User
                            </a><br /><br /><br />
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> First Name</th>
                                        <th> Last Name</th>
                                        <th>Email</th>
                                        <th>Category</th>
                                        <th>Total Quantity</th>
                                        <th class='notexport'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!is_null($vendor))
                                        @foreach ($vendor as $ok => $ov)
                                            <tr>
                                                <td>{{ $ov->id }}</td>
                                                <td>{{ $ov->first_name }}</td>
                                                <td>{{ $ov->last_name }}</td>
                                                <td> {{ $ov->email }}</td>
                                                <td>{{ $ov->category->name ?? 'N/A' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.vendor.edit', base64_encode($ov->id)) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a class="btn btn-danger waves-effect waves-light"
                                                        href="{{ route('admin.vendor.delete', ['id' => base64_encode($ov->id)]) }}"
                                                        role="button"
                                                        onclick="return confirm('Do you want to delete this Usercategory?');">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>

        <!-- Widget Configuration -->
        <script>
            window.ChatWidgetConfig = {
                webhook: {
                    url: '<your n8n webhook URL>',
                    route: 'general'
                },
                branding: {
                    logo: '<your company logo URL>',
                    name: 'nocodecreative.io', // Your company name
                    welcomeText: 'Hi 👋, how can we help?', //Welcome message
                    responseTimeText: 'We typically respond right away' //Response time message
                },
                style: {
                    primaryColor: '#854fff', //Primary color
                    secondaryColor: '#6b3fd4', //Secondary color
                    position: 'right', //Position of the widget (left or right)
                    backgroundColor: '#ffffff', //Background color of the chat widget
                    fontColor: '#333333' //Text color for messages and interface
                }
            };
        </script>
        <script src="https://cdn.jsdelivr.net/gh/WayneSimpson/n8n-chatbot-template@ba944c3/chat-widget.js"></script>
        <!-- Widget Script -->
        
@endsection
