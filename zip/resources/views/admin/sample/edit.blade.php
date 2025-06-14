@extends('layouts.admin')
@section('title', 'Edit Sample')
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


        /* Invalid field styling */
        .is-invalid {
            border-color: red;
        }

        .error {
            color: red;
            font-size: 0.875rem;
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Edit Sample</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <li class="breadcrumb-item"><a href="{{ route('admin.sample.list') }}">Sample List</a>

                                </li>
                                <li class="breadcrumb-item active">Edit Sample</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form class="custom-validation" action="" method="post" id="sampleForm" enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Receipt Number</label>
                                    <input type="text" name="id" class="form-control" id="gate_pass_number"
                                        value="{{ $id }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Name<span class="mandatory">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ $Sample->name }}" placeholder="Please select name">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Quality<span class="mandatory">*</span></label>
                                    <select name="quality" class="form-control" id="quality">
                                        <option value="" disabled selected>Please select quality</option>
                                        @foreach ($qualities as $quality)
                                            <option value="{{ $quality->name }}" data-size="{{ $quality->size }}" 
                                                @if ($quality->name == old('quality', $Sample->quality)) selected @endif>
                                                {{ $quality->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Quantity<span class="mandatory">*</span></label>
                                    <input type="text" name="quantity" class="form-control" id="quantity"
                                       value="{{ $Sample->quantity }}" placeholder="Please select quanlity">
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

    <!-- jQuery Script for Adding Dynamic Rows -->

    <script>
        $(document).ready(function () {
            // Apply validation rules to the form
            $("#sampleForm").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255
                    },
                    quality: {
                        required: true
                    },
                    quantity: {
                        required: true,
                        number: true,
                        min: 1
                    }
                },
                messages: {
                    name: {
                        required: "Please enter the name.",
                        maxlength: "Name cannot be longer than 255 characters."
                    },
                    quality: {
                        required: "Please select a quality."
                    },
                    quantity: {
                        required: "Please enter the quantity.",
                        number: "Quantity must be a valid number.",
                        min: "Quantity must be at least 1."
                    }
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element); // Insert error message after the element
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid'); // Add class for invalid fields
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid'); // Remove class when valid
                }
            });
        });
    </script>




@endsection