// Team member Switch Status Change
$(document).on('change', '.teamMemberStatus', function(){
    if(this.checked){
        option = 1;
    } else {
        option = 0;
    }
    var id = $(this).data('id');

    $.ajax({
        url: "/vivasvanna-admin/team/change-team-member-status",
        method:'POST',
        data:{ option: option,id:$(this).data('id')},
        success: function(data){
            if(data == 'true'){
                if(option == 1){
                    toastr.success('Team member successfully activated');    
                } else if(option == 0){
                    toastr.success('Team member successfully deactivated');    
                } else {
                    toastr.error('Something Went Wrong!');    
                }
            } else {
                toastr.success('Team member status successfully changed');
            }
        }
    });
});

// Remove error message for select role
$(document).on('change', '#role_id', function(){
    $('#addTeamMember').valid();
});