@extends('layouts.exhibitor')
@section('title','Inquiry Detail')
@section('content')
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
                            <div id="basic-example-show">
                                <!-- Seller Details -->
                                <h3>Company Details</h3>
                                <section data-step="0">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Company Name<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="company_name" id="basicpill-firstname-input" value="{{ $inquiry->company_name }}" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-address-input">Address<span class="mandatory">*</span></label>
                                                <textarea class="form-control" placeholder="Address" name="address" id="basicpill-address-input" readonly required>{{ $inquiry->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-landmark-input">Landmark<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-landmark-input" placeholder="Landmark" name="landmark" value="{{ $inquiry->landmark }}" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-area-input">Area<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="area" id="basicpill-area-input" placeholder="Area" value="{{ $inquiry->area }}" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-city-input">City<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="city" id="basicpill-city-input" placeholder="City" value="{{ $inquiry->city }}" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pincode-input">Pincode<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric" name="pincode" maxlength="6" minlength="6" id="basicpill-pincode-input" value="{{ $inquiry->pincode }}" readonly placeholder="Pincode" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="state">State<span class="mandatory">*</span></label>
                                                <select class="form-control select2" name="state" id="state" disabled required>
                                                    <option value="">Select state</option>
                                                    @forelse(\App\Models\State::orderBy('name','ASC')->get() as $sk => $sv)
                                                        <option value="{{ $sv->id }}" {{ $sv->id == $inquiry->state ? 'selected' : '' }}>{{ $sv->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                <span id="serror"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pan-input">PAN<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="pan" id="basicpill-pan-input" maxlength="10" minlength="10" value="{{ $inquiry->pan }}" readonly placeholder="PAN" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-tan-input">TAN</label>
                                                <input type="text" class="form-control" name="tan" id="basicpill-tan-input" placeholder="TAN" value="{{ $inquiry->tan }}" readonly >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-gstn-input">GSTN<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="gstn" id="basicpill-gstn-input" maxlength="15" minlength="15" value="{{ $inquiry->gstn }}" readonly placeholder="GSTN" required>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="category">Category<span class="mandatory">*</span></label>
                                                <select class="form-control select2" name="category[]" id="category" multiple data-placeholder="Select Category" disabled required>
                                                    @forelse(\App\Models\Category::all() as $ck => $cv)
                                                        <option value="{{ $cv->id }}" {{ in_array($cv->id,$category) ? 'selected' : '' }}>{{ $cv->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                <span id="cerror"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="is_advertise">Interested in advertising at the exhibition? </label>
                                                <select class="form-select" name="is_advertise" id="is_advertise" disabled>
                                                    <option selected>Select option</option>
                                                    <option value="YES" {{ $inquiry->advertising == 'YES' ? 'selected' : '' }}>Yes</option>
                                                    <option value="NO" {{ $inquiry->advertising == 'NO' ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-reference-input">Reference By</label>
                                                <input type="text" class="form-control" name="reference" id="basicpill-reference-input" placeholder="Reference By" value="{{ $inquiry->reference }}" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                </section>

                                <!-- Company Document -->
                                <h3>Company Details</h3>
                                <section data-step="1">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-chairperson-input">Company Chairperson Name(Owner / Director)<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="company_chairperson" id="basicpill-chairperson-input" placeholder="Company Chairperson Name(Owner / Director)" value="{{ $inquiry->company->chair_person }}" readonly required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-designation-input">Company Chairperson Designation<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-designation-input" name="designation" placeholder="Company Chairperson Designation" value="{{ $inquiry->company->chair_person_desigantion }}" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-mobile-input">Company Chairperson Mobile No<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric" id="basicpill-mobile-input" name="mobile_number" placeholder="Company Chairperson Mobile No" value="{{ $inquiry->company->chair_person_mobile }}" readonly required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-email-input">Company Chairperson Email ID<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-email-input" name="email_id" placeholder="Company Chairperson Email ID" value="{{ $inquiry->company->chair_person_email }}" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-person-input">Contact Person - Related to Exhibition<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-person-input" name="contact_person" placeholder="Contact Person - Related to Exhibition" value="{{ Auth::guard('exhibitor')->user()->contact_person_name }}" value="{{ $inquiry->company->contact_person }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cdesignation-input">Contact Person - Designation<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" id="basicpill-cdesignation-input" name="contact_person_designation" placeholder="Contact Person - Designation" value="{{ $inquiry->company->contact_person_desigantion }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-companyuin-input">Contact Person - Email ID <span class="mandatory">*</span></label>
                                                <input type="email" class="form-control" id="basicpill-companyuin-input" name="contact_person_email" placeholder="Contact Person - Email ID" value="{{ $inquiry->company->contact_person_email }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-mobile-input">Contact Person - Mobile No<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric" id="basicpill-mobile-input" name="contact_person_mobile" placeholder="Mobile No" value="{{ $inquiry->company->contact_person_mobile }}" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-whatsapp-input">Contact Person Whatsapp<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric" id="basicpill-whatsapp-input" name="contact_person_whatsapp" placeholder="Whatsapp" value="{{ $inquiry->company->contact_person_whatsapp }}" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-phone-f-input">Phone No.(F) </label>
                                                <input type="text" class="form-control numeric" id="basicpill-phone-f-input" name="contact_person_phone_f" placeholder="Phone No.(F)" value="{{ $inquiry->company->phone_no_fax }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-declaration-input">Phone No.(O)</label>
                                                <input type="text" class="form-control numeric" id="basicpill-Declaration-input" name="contact_person_phone_office" placeholder="Phone No.(O)" value="{{ $inquiry->company->phone_no_office }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-website-input">Website</label>
                                                <input type="text" class="form-control" id="basicpill-website-input" name="website" placeholder="Website" value="{{ $inquiry->company->website }}" readonly>
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
                                                    <input type="text" class="form-control numeric" max="1000" min="9" name="stall_size" id="stallSize" placeholder="Space Size" value="{{ $inquiry->stall->stall_size }}" readonly required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Space Type<span class="mandatory">*</span></label>
                                                    <select class="form-select" id="stall_type" name="stall_type" disabled required>
                                                        <option selected>Select Space Type</option>
                                                        <option value="SHELL" {{ $inquiry->stall->space_type == 'SHELL' ? 'selected' : '' }}>Shell</option>
                                                        <option value="DESIGN" {{ $inquiry->stall->space_type == 'DESIGN' ? 'selected' : '' }}>Shell + Design</option>
                                                        <option value="BARE" {{ $inquiry->stall->space_type == 'BARE' ? 'selected' : '' }}>Bare</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Premium For Corner Booth<span class="mandatory">*</span></label>
                                                    <select class="form-select" id="corner_booth" name="corner_booth" disabled required>
                                                        <option value="ONESIDE" {{ $inquiry->stall->corner_booth_type == 'ONESIDE' ? 'selected' : '' }}>Front-Side Open</option>
                                                        <option value="TWOSIDE" {{ $inquiry->stall->corner_booth_type == 'TWOSIDE' ? 'selected' : '' }}>Two-Side Open</option>
                                                        <option value="THREESIDE" {{ $inquiry->stall->corner_booth_type == 'THREESIDE' ? 'selected' : '' }}>Three-Side Open</option>
                                                        <option value="FOURSIDE" {{ $inquiry->stall->corner_booth_type == 'FOURSIDE' ? 'selected' : '' }}>Four-Side Open</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-requirement-input">Specific Requirements</label>
                                                    <textarea class="form-control" id="basicpill-requirement-input" name="specific_requirement" placeholder="Specific Requirements" readonly >{{ $inquiry->stall->requirement }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <h3>Discount </h3>
                                <section data-step="3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Participated in Plexpo before?<span class="mandatory">*</span></label>
                                                <select class="form-select" id="participated" name="participated" disabled required>
                                                    <option value="YES" {{ $inquiry->stall->participated == 'YES' ? 'selected' : '' }}>Yes</option>
                                                    <option value="NO" {{ $inquiry->stall->participated == 'NO' ? 'selected' : '' }}>No</option>
                                                </select>
                                                <small><b>Details subject to evaluation by PLEXPOINDIA team; discrepancies may result in benefit revocation.</b></small>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 {{ $inquiry->stall->participated == 'NO' ? 'hide' : '' }} participation-year">
                                            <div class="mb-3">
                                                <label for="basicpill-year-input">Plexpo Participation Year<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control numeric year" maxlength="4" id="basicpill-year-input" name="participation_year" placeholder="Plexpo Participation Year" data-msg="Please enter plexpo participation year" value="{{ $inquiry->stall->participation_year }}" readonly>
                                            </div>
                                        </div>

                                        @if($inquiry->stall->participated_status == 'APPROVE')
                                            <small style="color:red">Approved by PLEXPOINDIA Team</small>
                                        @else
                                            <small style="color:red">Rejected by PLEXPOINDIA Team due to the reason "{{ $inquiry->stall->participated_reason }}"</small>
                                        @endif
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Are you an active GSPMA member?<span class="mandatory">*</span> </label>
                                                <select class="form-select" id="is_gspms_member" name="is_gspms_member" disabled required>
                                                    <option value="YES" {{ $inquiry->stall->gspma_member == 'YES' ? 'selected' : '' }}>Yes</option>
                                                    <option value="NO" {{ $inquiry->stall->gspma_member == 'NO' ? 'selected' : '' }}>No</option>
                                                </select>
                                                <small><b>Details subject to evaluation by PLEXPOINDIA team; discrepancies may result in benefit revocation.</b></small>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 {{ $inquiry->stall->gspma_member == 'NO' ? 'hide' : '' }} gspma_membership_number">
                                            <div class="mb-3">
                                                <label for="gspma">GSPMA Membership No.<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control gspma_membership" id="gspma" name="gspma_membership_number" placeholder="GSPMA Membership No" data-msg="Please enter GSPMA membership number" value="{{ $inquiry->stall->gspma_membership_number }}" readonly>
                                            </div>
                                        </div>

                                        @if($inquiry->stall->gspma_status == 'APPROVE')
                                            <small style="color:red">Approved by PLEXPOINDIA Team</small>
                                        @else
                                            <small style="color:red">Rejected by PLEXPOINDIA Team due to the reason "{{ $inquiry->stall->gspma_reason }}"</small>
                                        @endif
                                    </div>

                                    <hr>

                                    <div class="row {{ $inquiry->stall->msme_certificate == 'NO' ? 'hide' : '' }} msme-certificate-select">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Do you have MSME Certificate?<span class="mandatory">*</span></label>
                                                <select class="form-select" id="msmeCertificate" name="msmecertificate" disabled required>
                                                    <option selected>Select option</option>
                                                    <option value="YES" {{ $inquiry->stall->msme_certificate == 'YES' ? 'selected' : '' }}>Yes</option>
                                                    <option value="NO" {{ $inquiry->stall->msme_certificate == 'NO' ? 'selected' : '' }}>No</option>
                                                </select>
                                                <small><b>Details subject to evaluation by PLEXPOINDIA team; discrepancies may result in benefit revocation.</b></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 {{ $inquiry->stall->msme_certificate == 'NO' ? 'hide' : '' }} msme-certificate">
                                            <div class="mb-3">
                                                <label for="msme-reg-input">MSME Reg. Number<span class="mandatory">*</span></label>
                                                <input type="text" class="form-control msme" id="msme-reg-input" name="msme_reg_number" placeholder="MSME Reg. Number" data-msg="Please enter MSME Reg. Number" value="{{ $inquiry->stall->msme_number }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 {{ $inquiry->stall->msme_certificate == 'NO' ? 'hide' : '' }} msme-certificate">
                                            <div class="mb-3">
                                                <label for="msmer-certificate-input">MSME Certificate Upload<span class="mandatory">*</span></label>
                                                <input type="file" class="form-control dropify msme" id="msmer-certificate-input" name="msme_certificate_file" data-msg="Please upload MSME certificate" data-allowed-file-extensions="pdf" data-max-file-size="2M" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    @if($inquiry->stall->msme_status == 'APPROVE')
                                        <small style="color:red" class="{{ $inquiry->stall->msme_certificate == 'NO' ? 'hide' : '' }}" >Approved by PLEXPOINDIA Team</small>
                                    @else
                                        <small style="color:red" class="{{ $inquiry->stall->msme_certificate == 'NO' ? 'hide' : '' }}">Rejected by PLEXPOINDIA Team due to the reason "{{ $inquiry->stall->msme_reason }}"</small>
                                    @endif
                                </section>

                                <!-- Confirm Details -->
                                <h3>Confirm Detail</h3>
                                <section data-step="4">
                                    @php $cash = 0 @endphp
                                    @if(!is_null($inquiry->detail))
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12" id="paymentDetail">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="50%">Head</th>
                                                            <th width="30%">Detail(Sq Mt x Unit Rate)</th>
                                                            <th width="20%">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($inquiry->detail as $pk => $pv)
                                                            @if($pv->head_id == 8)
                                                                @php $cash = $pv->total; @endphp
                                                            @endif
                                                            <tr>
                                                                <td>
                                                                    {!! $pv->head->description !!}
                                                                    @if(isset($pv['status']) && $pv['status'] != '')
                                                                        @if($pv['status'] == 'APPROVE')
                                                                            <br/><small>Approved by PLEXPOINDIA Team</small>
                                                                        @else
                                                                            <br/><small>Rejected by PLEXPOINDIA Team due to the reason "{{ $pv['reason'] ? $pv['reason'] : '--' }}"</small>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td>{{ $inquiry->stall->stall_size }} x ₹ {{ indian_number_format($pv->price) }}</td>
                                                                <td>{{ $pv->action == 'ADD' ? '+' : '-'}} ₹{{ indian_number_format($pv->total) }}</td>
                                                            </tr>
                                                        @endforeach
                                                        <tr style="background: #B0C5A4;">
                                                            <td><b>To be Paid (If full payment made before 15th June 2024)</b></td>
                                                            <td></td>
                                                            <td>
                                                                Subtotal : ₹ {{ indian_number_format($inquiry->subtotal) }}<br />
                                                                @if($inquiry->state == 24)
                                                                    CGST : ₹{{ indian_number_format($inquiry->gst / 2)  }}<br />
                                                                    SGST : ₹{{ indian_number_format($inquiry->gst / 2)  }}<br />
                                                                @else
                                                                    IGST : ₹{{ indian_number_format($inquiry->gst) }}<br />
                                                                @endif
                                                                <b style="font-size: 20px;">Total : ₹{{ indian_number_format($inquiry->total) }}</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><center><b>OR</b></center></td>
                                                        </tr>
                                                        <tr style="background: #D37676;">
                                                            <td><b>To be Paid (If partial payment made <small>(booking confirmation & registration fees)</small> before 15th June 2024)</b></td>
                                                            <td></td>
                                                            <td>
                                                                @php 
                                                                    $subtotal = $inquiry->subtotal + $cash;
                                                                    $gst = $subtotal * 18 / 100;
                                                                @endphp
                                                                Subtotal : ₹ {{ indian_number_format($subtotal) }}<br />
                                                                @if($inquiry->state == 24)
                                                                    CGST : ₹{{ indian_number_format($gst / 2)  }}<br />
                                                                    CGST : ₹{{ indian_number_format($gst / 2)  }}<br />
                                                                @else
                                                                    IGST : ₹{{ indian_number_format($gst)  }}<br />
                                                                @endif
                                                                <b style="font-size: 20px;">Total : ₹{{ indian_number_format($subtotal + $gst) }}</b>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
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
        console.log($(this).val())
        if($(this).val() == 9){
            $('.msme-certificate-select').removeClass('hide');
        } else {
            $('.msme-certificate-select').addClass('hide');
        }
    })

    $(document).on('change','#state',function(){
        console.log('asdasdads');
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

