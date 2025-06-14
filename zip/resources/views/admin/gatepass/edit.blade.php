@extends('layouts.admin')
@section('title', 'Add Gate Pass')
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
                        <h4 class="mb-0 font-size-18">Add Gate Pass</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <li class="breadcrumb-item"><a href="{{ route('admin.gatepass.list') }}">Gate Pass List</a>

                                </li>
                                <li class="breadcrumb-item active">Add Gate Pass</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form class="custom-validation" action="" method="post" id="gatepass_form"
                enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Receipt Number </label>
                                    <input type="text" name="id" class="form-control" id="gate_pass_number"
                                        value="{{ $id }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="packaging_id" class="form-label">SLIP NO
                                        <span class="mandatory red">*</span>
                                    </label>
                                    <select class="form-control select2" name="packaging_id" id="packaging_id" required>
                                        <option value="">Search Bales Number or Name</option>

                                        @foreach ($packagings as $pack)
                                            <option value="{{ $pack->id }}" data-jobber="{{ $pack->jober_name }}"
                                                data-inwarded="{{ $pack->inwarded->sum('inward_quantity') ?? 0 }}"
                                                >
                                                SLIP NO :#{{ $pack->receipt_number }} {{ $pack->jober_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Hidden Jobber & Meter Fields -->
                                <div id="jobber_meter_section" style="display: none;">
                                    <div class="mb-3">
                                        <label for="jobber_name" class="form-label">Jobber Name <span class="mandatory red">*</span></label>
                                        <input type="text" class="form-control" id="jobber_name" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="meter" class="form-label">Meter<span class="mandatory red">*</span></label>
                                        <input type="text" name="meter" class="form-control" value="{{ $gatepass->meter }}" id="meter" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="than" class="form-label">Than<span class="mandatory red">*</span></label>
                                        <input type="text" name= "than"class="form-control" value="{{ $gatepass->than }}" id="than" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="delivery_location" class="form-label">Delivery Location<span class="mandatory red">*</span></label>
                                        <input type="text" class="form-control" id="delivery_location" value="{{ $gatepass->delivery_location }}"
                                            name="delivery_location">
                                    </div>
                                    <div class="mb-3">
                                        <label for="car_number" class="form-label">Car Number<span class="mandatory red">*</span></label>
                                        <input type="text" class="form-control" id="car_number" value="{{ $gatepass->car_number }}" name="car_number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="driver_name" class="form-label">Driver Name<span class="mandatory red">*</span></label>
                                        <input type="text" class="form-control" id="driver_name" value="{{ $gatepass->driver_name }}" name="driver_name">
                                    </div>
                                </div>

                                <!-- Hidden Inputs for Packaging ID & Item ID -->
                                <input type="text" class="form-control" id="item_id" name="item_id"
                                    style="display: none;">

                                <!-- Save and Cancel Buttons -->
                                <div class="button-items mt-5">
                                    <center>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1"
                                            name="btn_submit" value="save">
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
        $(document).ready(function() {
            $('.select2').select2(); // Initialize Select2

            $('#packaging_id').on('change', function() {
                var selectedOption = $(this).find(':selected');
                var jobberName = selectedOption.data('jobber'); // Get jobber_name
                var itemId = selectedOption.data('item-id'); // Get item ID
                var packagingId = $(this).val(); // Get selected packaging ID

                console.log("Jobber Name:", jobberName);

                console.log("Item ID:", itemId);
                console.log("Packaging ID:", packagingId);

                if (packagingId) {
                    $('#jobber_name').val(jobberName); // Update Jobber input
                 
                    $('#item_id').val(itemId); // Update Meter input
                    $('#packagings_id').val(packagingId); // Update Meter input

                    $('#jobber_meter_section').show(); // Show fields
                } else {
                    $('#jobber_meter_section').hide(); // Hide fields if no selection
                }
            });
        });



$(document).ready(function () {
    // Initialize select2
    $('.select2').select2();

    // Trigger jobber fields visibility on selection
    $('#packaging_id').on('change', function () {
        const selectedOption = $(this).find(':selected');
        const jobberName = selectedOption.data('jobber');
        const inwarded = selectedOption.data('inwarded');

        if (selectedOption.val()) {
            $('#jobber_name').val(jobberName);
            $('#meter').val(inwarded);
            $('#jobber_meter_section').slideDown();
        } else {
            $('#jobber_meter_section').slideUp();
        }

        $(this).valid(); // Trigger validation
    });

    $('#gatepass_form').validate({
        ignore: ":hidden:not(.select2-hidden-accessible)",

        rules: {
            packaging_id: { required: true },
            meter: { required: true, number: true, min: 1 },
            than: { required: true, number: true, min: 1 },
            delivery_location: { required: true },
            car_number: { required: true },
            driver_name: { required: true }
        },
        messages: {
            packaging_id: { required: "Please select a SLIP Nunber" },
            meter: {
                required: "Please enter meter value",
                number: "Please enter a valid number",
                min: "Value must be at least 1"
            },
            than: {
                required: "Please enter than value",
                number: "Please enter a valid number",
                min: "Value must be at least 1"
            },
            delivery_location: { required: "Please enter delivery location" },
            car_number: { required: "Please enter car number" },
            driver_name: { required: "Please enter driver name" }
        },
        errorPlacement: function (error, element) {
            if (element.hasClass("select2-hidden-accessible")) {
                error.insertAfter(element.next('.select2'));
            } else {
                error.insertAfter(element);
            }
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

    // Live validation on change
    $('#gatepass_form input, #gatepass_form select').on('change keyup', function () {
        $(this).valid();
    });
});

    </script>

@endsection
