@extends('layouts.admin')
@section('title', 'Add Partial Inward Slip')
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

        .tempus-dominus-widget {
            position: absolute !important;
            /* top: 100% !important; */
            /* bottom: 100% !important; */

            /* left: 0 !important; */
            z-index: 1050 !important;
            /* higher than most elements */
            /* margin-top: 0.25rem; */
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Add Partial Inward </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <li class="breadcrumb-item"><a href="{{ route('admin.inward.list') }}">Partial Inward
                                        List</a>

                                </li>
                                <li class="breadcrumb-item active">Add Partial Inward</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form class="custom-validation" action="{{ route('admin.inward.store') }}" method="post" id="vendorCategory"
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
                                    <label>Receipt Number</label>
                                    <input type="text" name="id" class="form-control" id="gate_pass_number"
                                        value="{{ $nextId ?? '' }}" readonly>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="packaging_id" class="form-label">Bales Number <span
                                            class="mandatory red">*</span></label>
                                    <select class="form-control select2" name="packaging_id" id="packaging_id" >
                                        <option value="">Search Bales Number or Name</option>
                                        @foreach ($packaging as $pack)
                                            <option value="{{ $pack->id }}" data-jobber="{{ $pack->jober_name }}"
                                                data-quantity="{{ $pack->total_quantity }}"
                                                data-inwarded="{{ $pack->inwarded->sum('inward_quantity') ?? 0 }}">
                                                Bale No: #{{ $pack->receipt_number }} {{ $pack->jober_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Gate Pass Selection -->
                                <div class="form-group mb-3">
                                    <label for="gate_pass_id" class="form-label">Gate Pass <span
                                            class="mandatory red">*</span></label>
                                    <select class="form-control select2" name="gate_pass_id" id="gate_pass_id" >
                                        <option value="">Select Gate Pass</option>
                                        @foreach ($gatepass as $gp)
                                            <option value="{{ $gp->id }}">
                                                Gate Pass No: #{{ $gp->id ?? 'N/A' }}|
                                                {{ $gp->packagingSlip->jober_name ?? 'N/A' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="gate_pass_id" class="form-label">Ware House<span
                                            class="mandatory red">*</span></label>
                                    <select class="form-control select2" name="ware_house_id" id="ware_house_id" >
                                        <option value="">Select Ware House</option>
                                        @foreach ($warehouse as $wh)
                                            <option value="{{ $wh->id }}">
                                                {{ $wh->name ?? 'N/A' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Hidden Jobber & Meter Fields -->
                                <div id="jobber_meter_section" style="display: none;">
                                    <div class="form-group mb-3">
                                        <label for="jobber_name" class="form-label">Jobber Name <span class="mandatory red">*</span></label>
                                        <input type="text" class="form-control" id="jobber_name" readonly>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inward_quantity" class="form-label">Inward Quantity <span class="mandatory red">*</span></label>
                                        <input type="text" class="form-control" id="inward_quantity"
                                            name="inward_quantity" placeholder="Enter Inward Quantity" >
                                        <span id="inward_quantity_error" class="text-danger" style="display: none;"></span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inward_quantity" class="form-label">Inward Date <span class="mandatory red">*</span></label>
                                        <div class="input-group" id="datetimepicker" data-td-target-input="nearest"
                                            data-td-target="#datetimepicker" data-td-target-toggle="nearest">
                                            <input type="text" class="form-control" name="date" id="datetimepicker"
                                                data-td-target="#datetimepicker" readonly />
                                            <span class="input-group-text" data-td-toggle="datetimepicker">
                                                <i class="mdi mdi-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative" style="width: max-content;">

                                </div>
                                <!-- Hidden Inputs -->
                                {{-- <input type="hidden" class="form-control" id="item_id" name="item_id"> --}}

                                <!-- Save and Cancel Buttons -->
                                <div class="form-group mt-5 text-center">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1"
                                        name="btn_submit" value="save">
                                        Save
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger waves-effect">
                                        Cancel
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <!-- CSS -->
    <!-- JS -->


    <script>
        $(document).ready(function() {
            $('.select2').select2(); // Initialize Select2

            $('#packaging_id').on('change', function() {
                var selectedOption = $(this).find(':selected');
                var jobberName = selectedOption.data('jobber'); // Get jobber_name
                var meterValue = selectedOption.data('meter'); // Get meter value
                var thanValue = selectedOption.data('than'); // Get than value
                var itemId = selectedOption.data('item-id'); // Get item ID
                totalQuantity = selectedOption.data('quantity'); // Get total quantity
                var itemId = selectedOption.data('item-id'); // Get item ID
                var packagingId = $(this).val(); // Get selected packaging ID

                var selectedOption = $(this).find(':selected');
                totalQuantity = parseFloat(selectedOption.data('quantity')) || 0;
                inwardedQuantity = parseFloat(selectedOption.data('inwarded')) || 0;
                var remainingQuantity = totalQuantity - inwardedQuantity;

                console.log("Total Quantity:", totalQuantity);
                console.log("Already Inwarded:", inwardedQuantity);
                console.log("Remaining Quantity:", remainingQuantity);

                console.log("Quantity:", totalQuantity);

                if (packagingId) {
                    $('#jobber_name').val(jobberName); // Update Jobber input

                    $('#item_id').val(itemId); // Update Meter input
                    $('#packagings_id').val(packagingId); // Update Meter input

                    $('#jobber_meter_section').show(); // Show fields
                } else {
                    $('#jobber_meter_section').hide(); // Hide fields if no selection
                }
            });

            // Validate Inward Quantity
            $('#inward_quantity').on('input', function() {
                var inwardQty = parseFloat($(this).val()) || 0;
                var remainingQty = totalQuantity - inwardedQuantity;
                var errorMsg = $('#inward_quantity_error');

                if (inwardQty > remainingQty) {
                    errorMsg.text('Inward Quantity cannot exceed Remaining Quantity (' + remainingQty +
                        ').').show();
                    $(this).addClass('is-invalid');
                } else {
                    errorMsg.text('').hide();
                    $(this).removeClass('is-invalid');
                }
            });



        });



        document.addEventListener("DOMContentLoaded", function() {
            new tempusDominus.TempusDominus(document.getElementById('datetimepicker'), {
                display: {
                    components: {
                        calendar: true,
                        date: true,
                        month: true,
                        year: true,
                        clock: false,
                        hours: false,
                        minutes: false
                    }
                },
                container: document.getElementById('datetimepicker')
            });
        });
        $(document).ready(function () {
    $('#vendorCategory').validate({
        ignore: ":hidden:not(.select2-hidden-accessible)",

        rules: {
            packaging_id: { required: true },
            gate_pass_id: { required: true },
            ware_house_id: { required: true },
            inward_quantity: {
                required: true,
                number: true,
                min: 1
            },
            date: { required: true }
        },
        messages: {
            packaging_id: { required: "Please select a Bales Number" },
            gate_pass_id: { required: "Please select a Gate Pass" },
            ware_house_id: { required: "Please select a Ware House" },
            inward_quantity: {
                required: "Please enter the inward quantity",
                number: "Please enter a valid number",
                min: "Quantity must be at least 1"
            },
            date: { required: "Please select a date" }
        },
        errorPlacement: function (error, element) {
            // For Select2 dropdowns
            if (element.hasClass("select2-hidden-accessible")) {
                error.insertAfter(element.next('.select2'));
            }
            // For datetimepicker group
            else if (element.attr("name") === "date") {
                error.insertAfter($("#datetimepicker").parent());
            }
            // Default
            else {
                error.insertAfter(element);
            }
        }, // <-- 🔥 Add comma here
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

    // Trigger validation on change
    $('#packaging_id, #gate_pass_id, #ware_house_id, #datetimepicker').on('change', function () {
    $(this).valid();
});

});


    </script>

@endsection
