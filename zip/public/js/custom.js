$(document).on('click','.password',function(){
    if($('#password').attr('type') == 'text'){
        $('#password').attr('type','password');
        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
        $('#password').attr('type','text');
        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
    }
})

$(document).on('click','.confirmpassword',function(){
    if($('#confirmPassword').attr('type') == 'text'){
        $('#confirmPassword').attr('type','password');
        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
        $('#confirmPassword').attr('type','text');
        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
    }
})

$(document).ready(function () {
    // Update dropdown button text when checkboxes are clicked
    $('input[type="checkbox"]').change(function () {
        updateDropdownButtonText();
    });

    // Search functionality
    $('#dropdownSearch').on('input', function () {
        var searchText = $(this).val().toLowerCase();
        $('#checkboxContainer .dropdown-item').each(function () {
            var text = $(this).text().toLowerCase();
            var match = text.includes(searchText);
            $(this).toggle(match);
        });
    });

    // Initial update of dropdown button text
    updateDropdownButtonText();

    // Function to update dropdown button text
    function updateDropdownButtonText() {
        var selectedUnits = [];
        $('input[type="checkbox"]:checked').each(function () {
            selectedUnits.push($(this).parent().text().trim());
        });
        var buttonText = selectedUnits.length > 0 ? selectedUnits.join(',') : 'All';
        $('#dropdownMenuButton').text(buttonText);
    }
});
$(document).ready(function() {
    // Function to toggle the visibility of the Available Qty field
    function toggleAvailableQtyField() {
        if ($('#toggle-check').prop('checked')) {
            $('#availableQtyField').show();
        } else {
            $('#availableQtyField').hide();
        }
    }

    // Initial check when the page loads
    toggleAvailableQtyField();

    // Bind the toggle function to the change event of the checkbox
    $('#toggle-check').change(function() {
        toggleAvailableQtyField();
    });
});

$(document).ready(function() {
    $('.select2').select2();
    // Handle change event on services select
    $('select[name="services"]').change(function() {
        
        var serviceId = $(this).val(); 
        console.log(serviceId);// Get selected service ids
        if (serviceId && serviceId.length > 0) {
            // Fetch corresponding units via AJAX
            $.ajax({
                type: 'GET',
                url: getUnitsRoute, // Route to fetch units
                data: {
                    service_id: serviceId
                },
                success: function(data) {
                    // Clear previous options
                    console.log(data);
                    $('select[name="unit_id"]').empty();

                    // Add new options
                    $.each(data.units, function(key, unit) {
                        $('select[name="unit_id"]').append('<option value="' + unit.id + '">' + unit.name + '</option>');
                    });

                    // Update Select2
                    $('select[name="unit_id"]').trigger('change.select2');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching units:', error);
                }
            });
        } else {
            // Clear unit select if no service is selected
            $('select[name="unit_id"]').empty();
            $('select[name="unit_id"]').trigger('change.select2');
        }
    });
});

$(document).ready(function() {
    $('#filter').click(function() {
        var qty_based_product = $('#qty_based_product').val();
        var price_per_day = $('#price_per_day').val();
        var status = $('#status').val();

        window.location.href = filterUrl(qty_based_product, price_per_day, status);
    });

    $('#reset').click(function() {
        $('#qty_based_product').val('');
        $('#price_per_day').val('');
        $('#status').val('1');
        window.location.href = resetUrl();
    });

    // function filterUrl(qty_based_product, price_per_day, status) {
    //     return '{{ route('vendor.inventory.index') }}' + '?qty_based_product=' + qty_based_product + '&price_per_day=' + price_per_day + '&status=' + status;
    // }

    // function resetUrl() {
    //     return '{{ route('vendor.inventory.index') }}';
    // }
});
$(document).ready(function() {
    $('#generateExcel').click(function(event) {
        event.preventDefault();
        var vendorId = $('#vendor_id').val();
        $('#vendor_id').val(vendorId);
        $('#exportForm').submit();
    });
});

    // $(document).ready(function() {
    //     // Initialize metisMenu for collapsible sidebar
    //     $('#side-menu').metisMenu();

    //     // Ensure the submenu is collapsed on page load
    //     $('#user-management-menu').collapse('hide');

    //     // When a submenu is clicked, toggle it open or closed
    //     $('#side-menu .has-arrow').on('click', function() {
    //         var $submenu = $(this).next('ul'); // Find the next <ul> (the submenu)
            
    //         // Check if the submenu is already open or closed and toggle accordingly
    //         if ($submenu.hasClass('collapse')) {
    //             $submenu.collapse('show');  // Show the submenu
    //         } else {
    //             $submenu.collapse('hide');  // Hide the submenu
    //         }
    //     });
    // });
