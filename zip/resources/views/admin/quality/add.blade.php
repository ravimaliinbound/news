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
                        <h4 class="mb-0 font-size-18">Add Qualtity</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <li class="breadcrumb-item"><a href="{{ route('admin.quality.list') }}">Quality list</a>

                                </li>
                                <li class="breadcrumb-item active">Add Quality</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form class="custom-validation" action="{{ route('admin.quality.store') }}" method="post" id="qualityForm"
                enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label"> Name<span
                                            class="mandatory red">*</span></label>
                                    <input type="text" class="form-control" id="name"
                                        name="name"placeholder="Quality name">
                                </div>

                                <div class="mb-3">
                                    <label for="size" class="form-label">Size<span
                                            class="mandatory red">*</span></label>
                                    <input type="number" class="form-control" id="size" name="size" required
                                        placeholder="Size" step="any">
                                </div>
                                <!-- Save and Cancel Buttons -->
                                <div class="button-items mt-5">
                                    <center>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1"
                                            name="btn_submit" value="save">
                                            Save
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
        $(document).ready(function() {
            $('.select2').select2(); // Initialize Select2        
        });


    $(document).ready(function () {
        $('#qualityForm').validate({
            rules: {
                name: {
                    required: true
                },
                size: {
                    required: true,
                    number: true,
                    min: 0.01 // You can adjust based on your requirements
                }
            },
            messages: {
                name: {
                    required: "Please enter the quality name"
                },
                size: {
                    required: "Please enter the size",
                    number: "Size must be a number",
                    min: "Size must be greater than 0"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
                $(element).next("label.error").remove();
            },
            success: function (label) {
                label.remove();
            }
        });

        // Optional: Trigger validation on change
        $('#name, #size').on('change', function () {
            $(this).valid();
        });
    });

    </script>

@endsection
