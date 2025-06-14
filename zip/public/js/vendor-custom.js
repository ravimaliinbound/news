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
