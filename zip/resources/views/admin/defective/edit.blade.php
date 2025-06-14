@extends('layouts.admin')
@section('title', 'Edit Defective Pics')
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
                        <h4 class="mb-0 font-size-18">Edit Defective Pics</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <li class="breadcrumb-item"><a href="{{ route('admin.defective.list') }}">Defective Pics list</a>

                                </li>
                                <li class="breadcrumb-item active">Edit Defective Pics</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form class="custom-validation" action="" method="post" id="vendorCategory"
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
                                        value="{{ $id }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="packaging_id" class="form-label">Bales Number
                                        <span class="mandatory red">*</span>
                                    </label>
                                    <select class="form-control select2" name="packaging_id" id="packaging_id" required>
                                        <option value="">Search Bales Number or Name</option>
                                
                                        @foreach ($packaging as $pack)
                                            <option value="{{ $pack->id }}"
                                                data-jobber="{{ $pack->jober_name }}"
                                                data-quantity="{{ $pack->total_quantity }}"
                                                data-inwarded="{{ $pack->inwarded->sum('inward_quantity') ?? 0 }}"
                                                {{ old('packaging_id', $selectedPackagingId) == $pack->id ? 'selected' : '' }}>
                                                Bale No :#{{ $pack->receipt_number }} {{ $pack->jober_name }}
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
                                        <label for="inward_quantity" class="form-label"> Defective Quantity <span class="mandatory red">*</span></label>
                                        <input type="text" class="form-control" id="quantity"
                                            name="quantity" value="{{ $defective->quantity }}" placeholder="Enter defective Quantity" required>
                                        <span id="inward_quantity_error" class="text-danger" style="display: none;"></span>
                                    </div>

                                </div>

                                <!-- Hidden Inputs for Packaging ID & Item ID -->
                                <input type="text" class="form-control" id="item_id" name="item_id"
                                    style="display: none;">

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
    $('.select2').select2();

    let totalQuantity = 0;

    $('#packaging_id').on('change', function () {
        const selectedOption = $(this).find(':selected');
        const jobberName = selectedOption.data('jobber');
        const itemId = selectedOption.data('item-id');
        const packagingId = $(this).val();
        totalQuantity = parseFloat(selectedOption.data('quantity')) || 0;

        // Check if a valid selection is made
        if (packagingId) {
            $('#jobber_name').val(jobberName);
            $('#item_id').val(itemId);
            $('#packagings_id').val(packagingId);
            $('#jobber_meter_section').show();
            // Trigger validation to clear the error if a valid selection is made
            $('#packaging_id').valid();
        } else {
            $('#jobber_meter_section').hide();
            $('#jobber_name').val('');
            $('#item_id').val('');
            $('#packagings_id').val('');
        }

        // Update max quantity rule
        $('#quantity').rules('remove', 'max'); // Remove previous rule
        $('#quantity').rules('add', {
            max: totalQuantity,
            messages: {
                max: "Quantity cannot exceed available quantity: " + totalQuantity
            }
        });
    });

    // Initialize validation
    $('#vendorCategory').validate({
        rules: {
            packaging_id: {
                required: true
            },
            quantity: {
                required: true,
                number: true,
                min: 0.01
                // max rule added dynamically above
            }
        },
        messages: {
            packaging_id: {
                required: "Please select a Bales Number."
            },
            quantity: {
                required: "Please enter defective quantity.",
                number: "Please enter a valid number.",
                min: "Quantity must be greater than 0."
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "packaging_id") {
                // Insert the error message below the Select2 container
                error.insertAfter($(element).next('.select2'));
            } else if (element.attr("name") === "quantity") {
                error.insertAfter("#quantity"); // Ensure error is below the quantity field
            } else {
                error.insertAfter(element); // Default behavior for other fields
            }
        },
        submitHandler: function (form) {
            form.submit(); // proceed with submission
        }
    });
});



    </script>

@endsection
