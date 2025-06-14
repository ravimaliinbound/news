@extends('layouts.admin')
@section('title', 'Add Packaging Slip')
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
                        <h4 class="mb-0 font-size-18">Add Packaging Slip</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.packaging.list') }}">Packaging Slip
                                        list</a>
                                </li>
                                <li class="breadcrumb-item active">Add Packaging Slip</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{ dd(Route::currentRouteName()) }} --}}

            <form class="custom-validations" action="{{ route('admin.packaging.store') }}" method="post" id="packagingForm"
                enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-lg-8 offset-lg-1" style="margin-left: 15.666667% !important">
                        {{-- <div class="col-lg-6 offset-lg-3"> --}}

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <span style="color:red;float:right;" class="pull-right">* is mandatory</span>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Receipt Number</label>
                                    <input type="text" name="receipt_number" class="form-control" id="receipt_number"
                                        value="{{ $newReceiptNumber }}" readonly>
                                </div>

                                <!-- Jober Name -->
                                <div class="form-group mb-3">
                                    <label>Jober Name<span class="mandatory">*</span></label>
                                    <input type="text" name="jober_name" class="form-control" id="jober_name"
                                        placeholder="Jober Name" >
                                </div>

                                <!-- Quality and Size -->
                                <div class="form-group mb-3 row">
                                    <div class="col-md-6">
                                        <label>Quality<span class="mandatory">*</span></label>
                                        <select name="quality" class="form-control" id="quality" >
                                            <option value="" disabled selected>Please select quality</option>
                                            @foreach ($qualities as $quality)
                                                <option value="{{ $quality->name }}" data-size="{{ $quality->size }}">
                                                    {{ $quality->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Size<span class="mandatory">*</span></label>
                                        <input type="number" step="any" name="size" class="form-control"
                                            id="size" placeholder="Size"  readonly>
                                    </div>
                                </div>


                                <!-- Girth, Length, Waist -->
                                <div class="form-group mb-3 row">
                                    <div class="col-md-4">
                                        <label>Waist<span class="mandatory">*</span></label>
                                        <input type="number" name="waist" class="form-control" id="waist"
                                            placeholder="Waist">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Length<span class="mandatory">*</span></label>
                                        <input type="number" name="length" class="form-control" id="length"
                                            placeholder="Length">
                                    </div>
                                    <div class="col-md-4">
                                        <label>GHERA<span class="mandatory">*</span></label>
                                        <input type="number" name="girth" class="form-control" id="girth"
                                            placeholder="GHERA">
                                    </div>
                                </div>

                                <!-- Petti Coat and Interlock -->
                                <div class="form-group mb-3 row">
                                    <div class="col-md-6">
                                        <label>Party Special<span class="mandatory">*</span></label>
                                        <input type="text" name="petticoat" class="form-control" id="petticoat"
                                            placeholder="Party Special">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Interlock<span class="mandatory">*</span></label>
                                        <input type="text" name="interlock" class="form-control" id="interlock"
                                            placeholder="interlock">
                                    </div>
                                </div>

                                <!-- Items Table -->
                                <div class="form-group mb-3">
                                    <label>Items</label>
                                    <div class="border p-3 rounded">
                                        <table class="table table-bordered" id="itemsTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 45%;">Description</th>
                                                    <th style="width: 15%;">Than</th>
                                                    <th style="width: 15%;">Cut</th>
                                                    <th style="width: 15%;">Meter</th>
                                                    <th style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Dynamic rows will be added here -->
                                            </tbody>
                                        </table>
                                        <!-- Add Item Button -->
                                        <div class="button-items">
                                            <center>
                                                <button type="button" class="btn btn-primary" id="addItem">Add
                                                    Items</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <!-- Assorting -->
                                <div class="form-group mb-3">
                                    <label>Do you want to Assort it? <span class="mandatory">*</span></label>
                                    <div class="border p-3 rounded">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="assort" id="assort_yes" value="yes" required>
                                            <label class="form-check-label" for="assort_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="assort" id="assort_no" value="no" required checked>
                                            <label class="form-check-label" for="assort_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                

                                    <div id="boxes-container" class="mt-3"></div>
                                </center>
                                <center>

                                <!-- Save and Cancel Buttons -->
                                <div class="button-items mt-5">

                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1"
                                        name="btn_submit" value="save">
                                        Save
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger waves-effect">
                                        Cancel
                                    </a>
                                    <center>
                                        
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

            // Add Item Row
            $("#addItem").click(function() {
                let row = `
                <tr>
                    <td><input type="text" name="description[]" class="form-control" required></td>
                    <td><input type="number" name="than[]" class="form-control than" required></td>
                    <td><input type="number" name="cut[]" class="form-control cut" required></td>
                    <td><input type="number" name="meter[]" class="form-control meter" readonly required></td>
                    <td><button type="button" class="btn btn-danger removeItem">&times;</button></td>
                </tr>
            `;
                $("#itemsTable tbody").append(row);
            });

            // Remove Row
            $(document).on("click", ".removeItem", function() {
                $(this).closest("tr").remove();
            });

            // Auto Calculate Meter
            $(document).on("input", ".than, .cut", function() {
                let row = $(this).closest('tr');
                let than = parseFloat(row.find('.than').val()) || 0;
                let cut = parseFloat(row.find('.cut').val()) || 0;
                let meter = than * cut;
                row.find('.meter').val(meter);
            });

        });



        function getColumnsPerRow() {
            const screenWidth = $(window).width();

            console.log("Screen Width: " + screenWidth); // Debugging line

            if (screenWidth > 1780) {
                return 13; // Large screens (Desktops)
            } else if (screenWidth > 1577) {
                return 10; // Medium screens (Tablets, small desktops)
            } else if (screenWidth > 1450) {
                return 10; // Medium screens (Tablets, small desktops)
            } else if (screenWidth > 1200) {
                return 7; // Medium screens (Tablets, small desktops)
            } else if (screenWidth > 992) {
                return 5; // Medium screens (Tablets, small desktops)
            } else if (screenWidth > 768) {
                return 6; // Small tablets
            } else {
                return 4; // Mobile devices
            }
        }
        $(document).ready(function() {
            $("input[name='assort']").on('change', function() {
                const assortValue = $("input[name='assort']:checked").val();

                if (assortValue === 'yes') {
                    $("#assortFields, #boxes-container").slideDown();

                    let boxesHTML = '';
                    const columnsPerRow = getColumnsPerRow(); // Dynamically determine column count

                    for (let i = 1; i <= 392; i++) {
                        boxesHTML += `
                        <div class="box">
                            <div class="upper-number">${i}</div>
                            <center>
                                <div class="lower-number">
                                    <input type="number" name="color_${i}" class="form-control" />
                                </div>
                            </center>
                        </div>
                    `;

                        if (i % columnsPerRow === 0) {
                            boxesHTML += '<div style="clear: both;"></div>';
                        }
                    }
                    $('#boxes-container').html(boxesHTML);
                } else {
                    $("#assortFields, #boxes-container").slideUp();
                    $('#boxes-container').html('');
                }
            });
            $(window).resize(function() {
                if ($("input[name='assort']:checked").val() === 'yes') {
                    $("input[name='assort']").trigger('change');
                }
            });
        });

        $(document).ready(function() {
            $('#quality').change(function() {
                var size = $(this).find(':selected').data('size');
                $('#size').val(size);
            });
        });
    </script>


<script>
        $(document).ready(function() {

    $("#packagingForm").validate({
        rules: {
            jober_name: {
                required: true
            },
            quality: {
                required: true
            },
           
            waist: {
                required: true,
                number: true
            },
            length: {
                required: true,
                number: true
            },
            girth: {
                required: true,
                number: true
            },
            petticoat: {
                required: true
            },
            interlock: {
                required: true
            },
          
            'description[]': {
                required: true
            },
            'than[]': {
                required: true,
                number: true
            },
            'cut[]': {
                required: true,
                number: true
            }
        },
        messages: {
            jober_name: "Please enter Jober Name",
            quality: "Please select quality",
           
            waist: {
                required: "Please enter waist",
                number: "Please enter a valid number"
            },
            length: {
                required: "Please enter length",
                number: "Please enter a valid number"
            },
            girth: {
                required: "Please enter girth",
                number: "Please enter a valid number"
            },
            petticoat: "Please enter party special",
            interlock: "Please enter interlock",
            'description[]': "Please provide a description",
            'than[]': {
                required: "Please enter a value for Than",
                number: "Please enter a valid number"
            },
            'cut[]': {
                required: "Please enter a value for Cut",
                number: "Please enter a valid number"
            }
        },
        errorPlacement: function(error, element) {
            // Custom error placement for validation messages
            error.insertAfter(element);

        }
    });
   
});

</script>
@endsection
