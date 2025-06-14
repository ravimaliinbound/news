$(function () {
    $("#basic-example").steps({ 
    	headerTag: "h3", 
    	bodyTag: "section", 
    	transitionEffect: "slide",
    	saveState : true,
    	onStepChanging: function(e, currentIndex, newIndex) {
    		var wizard = $("#registationDetails"); // 
    		if(!wizard.valid()){ // validate the form
                // wizard.validate().focusInvalid(); //focus the invalid fields
                return false;
            }
            console.log(currentIndex)
            if(currentIndex == 3){
                $.ajax({
                    url : '/dietician-panel/payment-details',
                    type: 'post',
                    data:{
                        state : $('#state').val(),
                        stall_size : $('#stallSize').val(),
                        stall_type : $('#stall_type').val(),
                        corner_booth : $('#corner_booth').val(),
                        participated : $('#participated').val(),
                        gspma : $('#gspma').val(),
                        msmeCertificate : $('#msmeCertificate').val(),
                    }, 
                    success:function(data){
                        $('#paymentDetail').empty();
                        $('#paymentDetail').html(data.html);
                    }
                });   
            }
            return true
        },
        onFinished: function (event, currentIndex) {
            var form = $('#registationDetails');
            form.submit();
        },
    })

    $("#basic-example-admin").steps({ 
        headerTag: "h3", 
        bodyTag: "section", 
        transitionEffect: "slide",
        saveState : true,
        onStepChanging: function(e, currentIndex, newIndex) {
            var wizard = $("#registationDetails"); // 
            if(!wizard.valid()){ // validate the form
                // wizard.validate().focusInvalid(); //focus the invalid fields
                return false;
            }
            if(currentIndex == 3){
                $.ajax({
                    url : '/admin-panel/inquiry/payment-details',
                    type: 'post',
                    data:{
                        participated_radio: $("input:radio[name=participated_radio]:checked").val(),
                        gspma_radio : $("input:radio[name=gspma_radio]:checked").val(),
                        msme_radio : $("input:radio[name=msme_radio]:checked").val(),
                        loyalty_rejection : $('#loyalty_rejection').val(),
                        gspma_radio_rejection : $('#gspma_radio_rejection').val(),
                        msme_radio_rejection : $('#msme_radio_rejection').val(),
                        state : $('#state').val(),
                        stall_size : $('#stallSize').val(),
                        stall_type : $('#stall_type').val(),
                        corner_booth : $('#corner_booth').val(),
                        participated : $('#participated').val(),
                        gspma : $('#gspma').val(),
                        msmeCertificate : $('#msmeCertificate').val(),
                    }, 
                    success:function(data){
                        $('#paymentDetail').empty();
                        $('#paymentDetail').html(data.html);
                    }
                });   
            }
            return true
        },
        onFinished: function (event, currentIndex) {
            event.preventDefault();
            $.ajax({
                url : '/admin-panel/inquiry/check-inquiry-status',
                type: 'post',
                data:{ inquiry_id : $('#id').val()},
                success:function(data){
                    if(data.status == 'APPROVED'){
                        $('#confirmBox').modal('show');
                    } else {
                        var form = $('#registationDetails');
                        form.submit();
                    }
                }
            });
        },
    })

    $(".select2").select2();
    $('.dropify').dropify();

    $.validator.addMethod('validUrl', function(value, element) {
        var url = $.validator.methods.url.bind(this);
        return url(value, element) || url('http://' + value, element);
      }, 'Please enter a valid URL');

    $("#registationDetails").validate({
        errorElement : 'span',
        rules: {
            company_name: {
                required: true,
            },
            address: {
                required: true,
            },
            landmark:{
                required: true,
            },
			area:{
                required: true,
            },
			city:{
                required: true,
            },
			pincode:{
                required: true,
            },
            state:{
                required: true,
            },
			pan:{
                required: true,
                remote: {
                    url: "/check-pan",
                    method: "post"
                },
            },
			gstn:{
                required: true,
                regexGst:true,
                remote: {
                    url: "/check-gstn",
                    method: "post"
                },
            },
            'category[]': {
                required: true,
            },
            company_chairperson: {
                required: true,
            },
            designation: {
                required: true,
            },
            mobile_number: {
                required: true,
            },
            email_id: {
                required: true,
                customemail:true,
            },
            contact_person: {
                required: true,
            },
            contact_person_designation: {
                required: true,
            },
            contact_person_email: {
                required: true,
                customemail:true,
            },
            contact_person_mobile: {
                required: true,
            },
            contact_person_whatsapp: {
                required: true,
            },
            website: {
                validUrl:true
            },
            stall_size: {
                required: true,
            },
            stall_type: {
                required: true,
            },
            corner_booth: {
                required: true,
            },
            participated: {
                required: true,
            },
            is_gspms_member: {
                required: true,
            },
            msmecertificate: {
                required: true,
            },
        },
        errorPlacement: function(error, element) {
            if(element.attr("name") == 'state'){ 
                error.insertAfter('#serror');
            } else if(element.attr("name") == 'category[]'){  
                error.insertAfter('#cerror');
            } else {
                error.insertAfter( element );
            }
        },
        messages: {
            company_name: {
                required: "Please enter company name",
            },
            address: {
                required: "Please enter address",
            },
            landmark:{
                required: "Please enter landmark",
            },
			area:{
                required: "Please enter area",
            },
			city:{
                required: "Please enter city",
            },
			pincode:{
                required: "Please enter pincode",
            },
            state:{
                required: "Please select state",
            },
			pan:{
                required: "Please enter pan",
                remote:"This company is already registered"
            },
			gstn:{
                required: "Please enter GSTN",
                remote:"This company is already registered"
            },
            'category[]': {
                required: "Please select category",
            },
            company_chairperson: {
                required: "Please enter company chairperson name",
            },
            designation: {
                required: "Please enter company chairperson designation",
            },
            mobile_number: {
                required: "Please enter company chairperson mobile number",
            },
            email_id: {
                required: "Please enter company chairperson email",
            },
            contact_person: {
                required: "Please enter contact person name",
            },
            contact_person_designation: {
                required: "Please enter contact person designation",
            },
            contact_person_email: {
                required: "Please enter contact person email",
            },
            contact_person_mobile: {
                required: "Please enter contact person mobile",
            },
            contact_person_whatsapp: {
                required: "Please enter contact person whatsapp mobile",
            },
            website: {
                required: "Please enter valid url",
            },
            stall_size: {
                required: "Please enter space size"
            },
            stall_type: {
                required: "Please select stall size"
            },
            corner_booth: {
                required: "Please select premium for corner booth",
            },
            participated: {
                required: "Please make the appropriate selection",
            },
            is_gspms_member: {
                required: "Please make the appropriate selection",
            },
            msmecertificate: {
                required: "Please make the appropriate selection",
            },
        }
    });

    $("#basic-example-show").steps({ 
        headerTag: "h3", 
        bodyTag: "section", 
        transitionEffect: "slide",
        saveState : true,
        onFinished: function (event, currentIndex) {
        },
    })

    var stallTypeOne = [{"key" : 'SHELL', "value" : 'Shell'},{"key" : 'DESIGN', "value" : 'Shell + Design'}];
    var stallTypeTwo = [{"key" : 'SHELL', "value" : 'Shell'},{"key" : 'DESIGN', "value" : 'Shell + Design'},{"key" : 'BARE', "value" : 'Bare'}];

    $(document).on('focusout','#stallSize',function(){
        if($(this).val() < 18){
            setStallSizeOption(stallTypeOne);
        } else {
            setStallSizeOption(stallTypeTwo);
        }
    })

    function setStallSizeOption(option){
        $("#stall_type").empty().append("<option value=''>Select Space Type</option>");
        $.each(option, function(index, item) {
            $("#stall_type").append("<option value='" + item.key + "'>" + item.value + "</option>");
        });
    }

    var cornerBoothOne = [{"key" : 'ONESIDE', "value" : 'Front-Side Open'},{"key" : 'TWOSIDE', "value" : 'Two-Side Open'}];
    var cornerBoothTwo = [{"key" : 'ONESIDE', "value" : 'Front-Side Open'},{"key" : 'TWOSIDE', "value" : 'Two-Side Open'},{"key" : 'THREESIDE', "value" : 'Three-Side Open'},{"key" : 'FOURSIDE', "value" : 'Four-Side Open'}];

    $(document).on('change','.stallType',function(){
        if($(this).val() == 'SHELL' || $(this).val() == 'DESIGN'){
            setCornerBooth(cornerBoothOne);
        } else {
            setCornerBooth(cornerBoothTwo);
        }
    })

    function setStallSizeOption(option){
        $("#stall_type").empty().append("<option value=''>Select Space Type</option>");
        $.each(option, function(index, item) {
            $("#stall_type").append("<option value='" + item.key + "'>" + item.value + "</option>");
        });
    }

    function setCornerBooth(option){
        $("#corner_booth").empty().append("<option value=''>Select Corner booth</option>");
        $.each(option, function(index, item) {
            $("#corner_booth").append("<option value='" + item.key + "'>" + item.value + "</option>");
        });
    }
});
