{{-- <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script> --}}
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
 {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  --}}

@if(Route::is('admin.dashboard'))
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
@endif

<!-- Dropify js -->
<script src="{{ asset('libs/dropify/dist/js/dropify.js') }}"></script>
<script src="{{ asset('libs/dropify/dist/js/dropify.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('js/pages/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/pages/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('js/pages/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/pages/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>

<script src="{{ asset('js/pages/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('js/pages/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/pages/pdfmake/build/vfs_fonts.js') }}"></script>

<script src="{{ asset('js/pages/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/pages/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/pages/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('js/pages/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/pages/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('js/pages/datatables.init.js') }}"></script>
<script src="{{ asset('libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/validation.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- <script src="{{ asset('templateEditor/ckeditor/ckeditor.js') }}"></script> --}}
<script src="{{ asset('libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js"></script>


<!-- Fine Uploader JS file
====================================================================== -->
<script src="{{ asset('libs/fine-uploader/fine-uploader.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/module/role.js') }}"></script>
<script src="{{ asset('js/module/customer.js') }}"></script>
<script src="{{ asset('js/module/faq.js') }}"></script>
<script src="{{ asset('js/module/member.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>



<script src="{{ asset('js/module/merchant_branch.js') }}"></script>
{{-- <script src="{{ asset('templateEditor/ckeditor/ckeditor.js') }}"></script> --}}

<script src="{{ asset('js/jquery.password.min.js') }}"></script>

<!-- Dropify & Select2 js -->
<script type="text/javascript">
	$('.dropify').dropify();
    $('.select2').select2();

</script>


<script src="{{ asset('js/pages/form-wizard.init.js') }}"></script>