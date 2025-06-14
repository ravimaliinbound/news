@extends('layouts.exhibitor')
@section('title','Inquiry Detail')
@section('content')
<style>
    .file-icon > p { font-size : 21px; }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Inquiry Detail</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Inquiry Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Basic Wizard</h4>
                        <form method="post" role="form" action="{{ route('exhibitor.generateInquiry') }}" id="registationDetails" enctype="multipart/form-data">
                            @csrf
                            <div id="basic-example">
                                <!-- Seller Details -->
                                <h3>Company Details</h3>
                                <section data-step="0">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Company Name<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="company_name" id="basicpill-firstname-input" value="{{ Auth::guard('exhibitor')->user()->company_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-address-input">Address<span class="mandatory">*</span></label>
                                                <textarea class="form-control" placeholder="Address" name="address" id="basicpill-address-input" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-landmark-input">Landmark<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-landmark-input" placeholder="Landmark" name="landmark" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-area-input">Area<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="area" id="basicpill-area-input" placeholder="Area" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-city-input">City<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="city" id="basicpill-city-input" placeholder="City" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pincode-input">Pincode<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric" name="pincode" maxlength="6" minlength="6" id="basicpill-pincode-input" placeholder="Pincode" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="state">State<span class="mandatory">*</span></label>
                                                <select class="form-control select2" name="state" id="state" required>
                                                    <option value="">Select state</option>
                                                    @forelse(\App\Models\State::orderBy('name','ASC')->get() as $sk => $sv)
                                                        <option value="{{ $sv->id }}">{{ $sv->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                <span id="serror"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pan-input">PAN<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="pan" id="basicpill-pan-input" maxlength="10" minlength="10" placeholder="PAN" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-tan-input">TAN</label>
                                                <input type="text" class="form-control" name="tan" id="basicpill-tan-input" placeholder="TAN" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-gstn-input">GSTN<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="gstn" id="basicpill-gstn-input" maxlength="15" minlength="15" placeholder="GSTN" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="category">Category<span class="mandatory">*</span></label>
                                                <select class="form-control select2" name="category[]" id="category" multiple data-placeholder="Select Category" required>
                                                    @forelse(\App\Models\Category::all() as $ck => $cv)
                                                        <option value="{{ $cv->id }}">{{ $cv->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                <span id="cerror"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="is_advertise">Interested in advertising at the exhibition? </label>
                                                <select class="form-select" name="is_advertise" id="is_advertise">
                                                    <option value="">Select option</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-reference-input">Reference By</label>
                                                <input type="text" class="form-control" name="reference" id="basicpill-reference-input" placeholder="Reference By" value="{{ Auth::guard('exhibitor')->user()->reference_by }}">
                                            </div>
                                        </div>

                                        <input type="hidden" name="remarks">{{ Auth::guard('exhibitor')->user()->remarks }}</textarea>
                                    </div>
                                </section>

                                <!-- Company Document -->
                                <h3>Company Details</h3>
                                <section data-step="1">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-chairperson-input">Company Chairperson Name(Owner / Director)<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="company_chairperson" id="basicpill-chairperson-input" placeholder="Company Chairperson Name(Owner / Director)" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-designation-input">Company Chairperson Designation<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-designation-input" name="designation" placeholder="Company Chairperson Designation" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-mobile-input">Company Chairperson Mobile No<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric" id="basicpill-mobile-input" name="mobile_number" placeholder="Company Chairperson Mobile No" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-email-input">Company Chairperson Email ID<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-email-input" name="email_id" placeholder="Company Chairperson Email ID" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-person-input">Contact Person - Related to Exhibition<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-person-input" name="contact_person" placeholder="Contact Person - Related to Exhibition" value="{{ Auth::guard('exhibitor')->user()->contact_person_name }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cdesignation-input">Contact Person - Designation<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-cdesignation-input" name="contact_person_designation" placeholder="Contact Person - Designation" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-companyuin-input">Contact Person - Email ID <span class="mandatory">*</span></label>
                                                <input type="email" class="form-control" id="basicpill-companyuin-input" name="contact_person_email" placeholder="Contact Person - Email ID" value="{{ Auth::guard('exhibitor')->user()->email }}" readonly required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-mobile-input">Contact Person - Mobile No<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric" id="basicpill-mobile-input" name="contact_person_mobile" placeholder="Mobile No" value="{{ Auth::guard('exhibitor')->user()->contact_person_mobile }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-whatsapp-input">Contact Person Whatsapp<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric" id="basicpill-whatsapp-input" name="contact_person_whatsapp" placeholder="Whatsapp" value="{{ Auth::guard('exhibitor')->user()->contact_person_mobile }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-phone-f-input">Phone No.(F) </label>
                                                <input type="text" class="form-control numeric" id="basicpill-phone-f-input" name="contact_person_phone_f" placeholder="Phone No.(F)">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-declaration-input">Phone No.(O)</label>
                                                <input type="text" class="form-control numeric" id="basicpill-Declaration-input" name="contact_person_phone_office" placeholder="Phone No.(O)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-website-input">Website</label>
                                                <input type="text" class="form-control" id="basicpill-website-input" name="website" placeholder="Website">
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Bank Details -->
                                <h3>Stall Requireme..</h3>
                                <section data-step="2">
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="stallSize">Space Size(Sq. Mt.)<span class="mandatory">*</span></label>
                                                    <input type="text" class="form-control numeric" max="1000" min="9" name="stall_size" id="stallSize" placeholder="Space Size" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Space Type<span class="mandatory">*</span></label>
                                                    <select class="form-select stallType" id="stall_type" name="stall_type" required>
                                                        <option selected>Select Space Type</option>
                                                        <option value="SHELL">Shell</option>
                                                        <option value="DESIGN">Shell + Design</option>
                                                        <option value="BARE">Bare</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Premium For Corner Booth<span class="mandatory">*</span></label>
                                                    <select class="form-select" id="corner_booth" name="corner_booth" required>
                                                        <option value="ONESIDE" selected>Front-Side Open</option>
                                                        <option value="TWOSIDE">Two-Side Open</option>
                                                        <option value="THREESIDE">Three-Side Open</option>
                                                        <option value="FOURSIDE">Four-Side Open</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-requirement-input">Specific Requirements</label>
                                                    <textarea class="form-control" id="basicpill-requirement-input" name="specific_requirement" placeholder="Specific Requirements"></textarea>
                                                </div>
                                            </div>

                                            <b>Any space and open side requirements will be subject to availability at the time of final plan layout and allocations.</b>
                                        </div>
                                    </div>
                                </section>

                                <h3>Discount </h3>
                                <section data-step="3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Participated in Plexpo before?<span class="mandatory">*</span></label>
                                                <select class="form-select" id="participated" name="participated" required>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO" selected>No</option>
                                                </select>
                                                <small><b>Details subject to evaluation by PLEXPOINDIA team; discrepancies may result in benefit revocation.</b></small>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 hide participation-year">
                                            <div class="mb-3">
                                                <label for="basicpill-year-input">Plexpo Participation Year<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric year" maxlength="4" id="basicpill-year-input" name="participation_year" placeholder="Plexpo Participation Year" data-msg="Please enter plexpo participation year">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Are you an active GSPMA member?<span class="mandatory">*</span> </label>
                                                <select class="form-select" id="is_gspms_member" name="is_gspms_member" required>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO" selected>No</option>
                                                </select>
                                                <small><b>Details subject to evaluation by PLEXPOINDIA team; discrepancies may result in benefit revocation.</b></small>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 hide gspma_membership_number">
                                            <div class="mb-3">
                                                <label for="gspma">GSPMA Membership No.<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control gspma_membership numeric" id="gspma" name="gspma_membership_number" placeholder="GSPMA Membership No" maxlength="4" data-msg="Please enter GSPMA membership number">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row hide msme-certificate-select">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Do you have MSME Certificate?<span class="mandatory">*</span></label>
                                                <select class="form-select" id="msmeCertificate" name="msmecertificate" required>
                                                    <option selected>Select option</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO" selected>No</option>
                                                </select>
                                                <small><b>Details subject to evaluation by PLEXPOINDIA team; discrepancies may result in benefit revocation.</b></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 hide msme-certificate">
                                            <div class="mb-3">
                                                <label for="msme-reg-input">MSME Reg. Number<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control msme" id="msme-reg-input" name="msme_reg_number" placeholder="MSME Reg. Number" data-msg="Please enter MSME Reg. Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 hide msme-certificate">
                                            <div class="mb-3">
                                                <label for="msmer-certificate-input">MSME Certificate Upload<span class="mandatory">*</span></label>
                                                <input type="file" class="form-control msme dropify" id="msmer-certificate-input" name="msme_certificate_file" data-msg="Please upload MSME certificate" data-allowed-file-extensions="pdf" data-max-file-size="2M">
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Confirm Details -->
                                <h3>Confirm Detail</h3>
                                <section data-step="4">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12" id="paymentDetail">
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).on('change','#participated',function(){
        if($(this).val() == 'YES'){
            $('.participation-year').removeClass('hide');
            $('.year').attr('required',true);
        } else {
            $('.participation-year').addClass('hide');
            $('.year').attr('required',false);
        }
    })

    $(document).on('change','#msmeCertificate',function(){
        if($(this).val() == 'YES'){
            $('.msme-certificate').removeClass('hide');
            $('.msme').attr('required',true);
        } else {
            $('.msme-certificate').addClass('hide');
            $('.msme').attr('required',false);
        }
    })

    $(document).on('focusout','#stallSize',function(){
        if($(this).val() == 9){
            $('.msme-certificate-select').removeClass('hide');
        } else {
            $('.msme-certificate-select').addClass('hide');
        }
    })

    $(document).on('change','#state',function(){
        if($('#registationDetails').valid()){
            $('#serror').val('');
        }
    })

    $(document).on('change','#category',function(){
        if($('#registationDetails').valid()){
            $('#cerror').val('');
        }
    })

    $(document).on('change','#is_gspms_member',function(){
        if($(this).val() == 'YES'){
            $('.gspma_membership_number').removeClass('hide');
            $('.gspma_membership').attr('required',true);
        } else {
            $('.gspma_membership_number').addClass('hide');
            $('.gspma_membership').attr('required',false);
        }
    })
    


</script>
@endsection

