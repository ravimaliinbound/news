@extends('layouts.admin')
@section('title', 'Add Defective Pics')
@section('content')

    <style>
        .box {
            width: 60px;
            height: 80px;
            margin: 5px;
            display: inline-block;
            text-align: center;
            border: 1px solid #ccc;
            position: relative;
        }

        .box .upper-number {
            position: absolute;
            top: 5px;
            width: 100%;
        }

        .box .lower-number {
            position: absolute;
            bottom: 5px;
            width: 100%;
        }

        .box input {
            width: 80%;
            margin: 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Edit Ware house</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <li class="breadcrumb-item"><a href="{{ route('admin.warehouse.list') }}">Warehouse list</a>

                                </li>
                                <li class="breadcrumb-item active">Edit Warehouse</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form class="custom-validation" action="" method="post" id="warehouseForm"
                enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                              
                                <!-- Hidden Jobber & Meter Fields -->
                                
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Name <span class="mandatory red">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $warehouse->name }}" placeholder="Ware House name" >
                                    </div>                                                         
                              
                                <!-- Save and Cancel Buttons -->
                                <div class="button-items mt-5">
                                    <center>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1"
                                            name="btn_submit" value="update">
                                            Update
                                        </button>
                                        <a href="{{ url()->previous() }}" class="btn btn-danger waves-effect">
                                            Cancel
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
    $('#warehouseForm').validate({
        ignore: ':hidden', // Ignore hidden fields
        rules: {
            name: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            name: {
                required: "Please enter the warehouse name",
                maxlength: "Name should not exceed 100 characters"
            }
        },
        errorPlacement: function (error, element) {
            // Handle Select2 or custom placement here if needed in the future
            error.insertAfter(element);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },
        success: function (label) {
            label.remove();
        }
    });

    // Real-time validation
    $('#name').on('input', function () {
        $(this).valid();
    });
});

    </script>
@endsection
