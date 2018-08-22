$(document).ready(function(){
    //Add rows 
    $('#add_score').click(function(){
        let i=0;
        i++;  
    $('#scores_table').append('<tr id="row'+i+'"><td><input type="text" name="firmname[]" class="form-control name_list" required></td><td><input type="number" name="techscore[]" value="" class="form-control name_list" required></td><td><input type="number" name="financial_score[]" value="" class="form-control name_list" required></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
    });
      //Remove rows   
    $(document).on('click', '.btn_remove', function(){  
        let button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();  
    });

      //Data Tables
  $('.dat').DataTable({
    responsive: true
    });
 

    /**
     * Service Line Proceccing
     */

    //Add Service Line
    $("#linesBtn").click(function(){
        $.ajax({
            type :"POST",
            url  :"servicelines",
            data :{
                '_token' : $('input[name=_token]').val(),
                'servicename' : $('input[name=servicename]').val(),
                'servicecode' : $('input[name=servicecode]').val(),
                'servicedesc' : $('input[name=servicedesc]').val()
            },
            success:function(data){
                $('#linesForm')[0].reset();
                $('#serviceLine').modal('hide');
                location.reload();
            },
            error:function(){
            console.error();
        }
        });
    });

    //Edit service line
    $(".editService").click(function(){
        let id = $(this).attr('id');
         $.ajax({
            url:"servicelines/"+id,
            method:"GET",
            dataType:"JSON",
            success: function(data){
                $('#servicename').val(data.servicename);
                $('#servicecode').val(data.servicecode);
                $('#servicedesc').val(data.servicedesc);
                $('#serviceid').val(data.id);
                $('#editServices').modal("show");
            },
            error:function(){
            console.error();
        }
        });
    });

    //Update service line
    $("#serviceUp").click(function(){
        let serviceid = $('#serviceid').val();
        $.ajax({
            method :"PUT",
            url  :"servicelines/"+serviceid,
            data :{
                '_token' : $('input[name=_token]').val(),
                'servicename' : $('#servicename').val(),
                'servicecode' : $('#servicecode').val(),
                'servicedesc' : $('#servicedesc').val()
            },
            success:function(data){
                $('#servicesedit')[0].reset();
                location.reload();
            },
            error:function(){
            console.error();
        }
        });
    });

    // Delete service line
    $(".delService").click(function(){
        let picked = $(this).attr('id');
        $('.modal-title').text("CAUTION!!");
        $('#warnmsg').html("Are you sure you want to delete?<input type='hidden' value='"+picked+"'>");
        $('#warn').modal("show");
        $(".confirm").click(function(){
            $.ajax({
                url:"servicelines/"+picked,
                method:"POST",
                data: {_method: 'delete','_token' : $('input[name=_token]').val()},
                success: function(){
                $('#warn').modal('hide');
                location.reload();
                },
                error:function(){
                console.error();
            }
            });
        });
    });

    /*
        Publice holidays
    */

    //Add Holidays
    $("#addPublic").click(function(){
        $.ajax({
            type :"POST",
            url  :"holidays",
            data :{
                '_token' : $('input[name=_token]').val(),
                'holiday' : $('input[name=holiday]').val(),
                'holimonth' : $('#holimonth').val(),
                'holidate' : $('#holidate').val()
            },
            success:function(data){
                $('#publicForm')[0].reset();
                $('#publicDays').modal('hide');
                location.reload();
            },
            error:function(){
            console.error();
        }
        });
    });
    
    //Edit Holidays
    $(".editHoliday").click(function(){
        let id = $(this).attr('id');
         $.ajax({
            url:"holidays/"+id,
            method:"GET",
            dataType:"JSON",
            success: function(data){
                console.log(data);
                $('#holiday').val(data.holiday);
                $('#holimonths').val(data.holimonth);
                $('#holidates').val(data.holidate);
                $('#holid').val(data.id);
                $('#editHolidays').modal("show");
                },
            error:function(){
            console.error();
            }
        });
    });

    //Update Holidays
    $("#holidayUp").click(function(){
        let holid = $('#holid').val();
        $.ajax({
            method :"PUT",
            url  :"holidays/"+holid,
            data :{
                '_token' : $('input[name=_token]').val(),
                'holiday' : $('#holiday').val(),
                'holimonth' : $('#holimonth').val(),
                'holidate' : $('#holidate').val()
            },
            success:function(data){
                $('#holeditForm')[0].reset();
                location.reload();
            },
            error:function(){
            console.error();
            }
        });
    });

    //Delete Holidays
    $(".delHoliday").click(function(){
        let picked = $(this).attr('id');
        $('.modal-title').text("CAUTION!!");
        $('#warnmsg').html("Are you sure you want to delete?<input type='hidden' value='"+picked+"'>");
        $('#warn').modal("show");
        $(".confirm").click(function(){
            $.ajax({
                url:"holidays/"+picked,
                method:"POST",
                data: {_method: 'delete','_token' : $('input[name=_token]').val()},
                success: function(){
                $('#warn').modal('hide');
                location.reload();
                },
                error:function(){
                console.error();
                }
            });
        });
    });

    /*

        Divisions

    */
    //Add Division
    $("#divBtn").click(function(){
        $.ajax({
            type :"POST",
            url  :"divisions",
            data :{
                '_token' : $('input[name=_token]').val(),
                'divname' : $('input[name=divname]').val(),
                'initual' : $('input[name=initual]').val(),
                'divcode' : $('input[name=divcode]').val(),
                'divhead' : $('input[name=divhead]').val(),
            },
            success:function(data){
                $('#divsForm')[0].reset();
                $('#addDivs').modal('hide');
                location.reload();
            },
            error:function(){
            console.error();
        }
        });
    });
    
    //Edit Division
    $(".editdiv").click(function(){
        let id = $(this).attr('id');
         $.ajax({
            url:"divisions/"+id,
            method:"GET",
            dataType:"JSON",
            success: function(data){
                $('#divname').val(data.divname);
                $('#divname').val(data.divname);
                $('#initual').val(data.initual);
                $('#divcode').val(data.divcode);
                $('#divhead').val(data.divhead);
                $('#divid').val(data.id);
                $('#editDivs').modal("show");
            },
            error:function(){
            console.error();
        }
        });
    });

    //Update division
    $("#divUpt").click(function(){
        let divid = $('#divid').val();
        $.ajax({
            method :"PUT",
            url  :"divisions/"+divid,
            data :{
                '_token' : $('input[name=_token]').val(),
                'divname' : $('#divname').val(),
                'initual' : $('#initual').val(),
                'divcode' : $('#divcode').val(),
                'divhead' : $('#divhead').val(),
                'divid' : $('#divid').val(),
            },
            success:function(data){
                $('#divsForm')[0].reset();
                location.reload();
            },
            error:function(){
            console.error();
            }
        });
    });

    // Delete Division
    $(".delDiv").click(function(){
        let picked = $(this).attr('id');
        $('.modal-title').text("CAUTION!!");
        $('#warnmsg').html("Are you sure you want to delete?<input type='hidden' value='"+picked+"'>");
        $('#warn').modal("show");
        $(".confirm").click(function(){
            $.ajax({
                url:"divisions/"+picked,
                method:"POST",
                data: {_method: 'delete','_token' : $('input[name=_token]').val()},
                success: function(msg){
                $('#warn').modal('hide');
                location.reload();
                },
                error:function(){
                console.error();
                }
            });
        });
    });

    /*
    *
    *  User Roles
    *
    */
    //Save User Roles
    $("#roleBtn").click(function(){
        $.ajax({
            type :"POST",
            url  :"roles",
            data :{
                '_token' : $('input[name=_token]').val(),
                'rolename' : $('input[name=rolename]').val(),
                'roledesc' : $('input[name=roledesc]').val(),
            },
            success:function(data){
                $('#rolesForm')[0].reset();
                $('#addRole').modal('hide');
                location.reload();
            },
            error:function(){
            console.error();
            }
        });
    });

    //Edit role
    $(".editRole").click(function(){
        let id = $(this).attr('id');
         $.ajax({
            url:"roles/"+id,
            method:"GET",
            dataType:"JSON",
            success: function(data){
                $('#rolename').val(data.rolename);
                $('#roledesc').val(data.roledesc);
                $('#roleid').val(data.id);
                $('#editRoles').modal("show");
            },
            error:function(){
            console.error();
        }
        });
    });

    //Update role
    $("#roleUp").click(function(){
        let roleid = $('#roleid').val();
        $.ajax({
            method :"PUT",
            url  :"roles/"+roleid,
            data :{
                '_token' : $('input[name=_token]').val(),
                'rolename' : $('#rolename').val(),
                'roledesc' : $('#roledesc').val()
            },
            success:function(data){
                $('#roleditForm')[0].reset();
                location.reload();

            },
            error:function(){
            console.error();
            }
        });
    });

    // Delete role
    $(".delRole").click(function(){
        let picked = $(this).attr('id');
        $('.modal-title').text("CAUTION!!");
        $('#warnmsg').html("Are you sure you want to delete?<input type='hidden' value='"+picked+"'>");
        $('#warn').modal("show");
        $(".confirm").click(function(){
            $.ajax({
                url:"roles/"+picked,
                method:"POST",
                data: {_method: 'delete','_token' : $('input[name=_token]').val()},
                success: function(msg){
                $('#warn').modal('hide');
                location.reload();
                },
                error:function(){
                console.error();
            }
            });
        });
    });

    /*
    Teams CRUD
    */
    //Save New Team
    $("#teamBtn").click(function(){
        $.ajax({
            type :"POST",
            url  :"teams",
            data :{
                '_token' : $('input[name=_token]').val(),
                'teamname' : $('input[name=teamname]').val(),
                'initial' : $('input[name=initial]').val(),
                'teamcode' : $('input[name=teamcode]').val(),
                'teamleader' : $('input[name=teamleader]').val()
            },
            success:function(data){
                $('#teamsForm')[0].reset();
                $('#addTeams').modal('hide');
                location.reload();
            },
            error:function(){
            console.error();
            }
        });
    });

    //Edit team
    $(".editTeam").click(function(){
        let id = $(this).attr('id');
         $.ajax({
            url:"teams/"+id,
            method:"GET",
            dataType:"JSON",
            success: function(data){
                $('#teamname').val(data.teamname);
                $('#teamname').val(data.teamname);
                $('#initial').val(data.initial);
                $('#teamcode').val(data.teamcode);
                $('#teamleader').val(data.teamleader);
                $('#teamid').val(data.id);
                $('#editTeam').modal("show");
            },
            error:function(){
            console.error();
            }
        });
    });

    //Update team
    $("#teamUpt").click(function(){
        let teamid = $('#teamid').val();
        $.ajax({
            method :"PUT",
            url  :"teams/"+teamid,
            data :{
                '_token' : $('input[name=_token]').val(),
                'teamname' : $('#teamname').val(),
                'initial' : $('#initial').val(),
                'teamcode' : $('#teamcode').val(),
                'teamleader' : $('#teamleader').val(),
                'teamid' : $('#teamid').val(),
            },
            success:function(data){
                $('#divsForm')[0].reset();
                location.reload();
            },
            error:function(){
            console.error();
            }
        });
    });

    // Delete team
    $(".delTeam").click(function(){
        let picked = $(this).attr('id');
        $('.modal-title').text("CAUTION!!");
        $('#warnmsg').html("Are you sure you want to delete?<input type='hidden' value='"+picked+"'>");
        $('#warn').modal("show");
        $(".confirm").click(function(){
            $.ajax({
                url:"teams/"+picked,
                method:"POST",
                data: {_method: 'delete','_token' : $('input[name=_token]').val()},
                success: function(msg){
                $('#warn').modal('hide');
                location.reload();
                },
                error:function(){
                console.error();
                }
            });
        });
    });
  
    /**
     * Meat Proceccing
     */
    
    $('#meatsForm').change(function(){
        let  benefi = $("input[name='beneficiary']:checked").val();
        if(benefi=="Opportunities")
        {
            $('#omNum').show();
        }else{
            $('#omNum').hide();
            $('input[name=OMNumber]').val()=='None';
        }
    });

    //Add Meat
         $("#meatBtn").click(function(){
             let omn = $('input[name=OMNumber]').val();
             let def = "None";
             if(omn == ''){omn =  def;}
            $.ajax({
                type :"POST",
                url  :"meats",
                data :{
                    '_token' : $('input[name=_token]').val(),
                    'beneficiary' : $("input[name='beneficiary']:checked").val(),
                    'serviceline' : $('#serviceline').val(),
                    'activityDate' : $('input[name=activityDate]').val(),
                    'duration' : $('#duration').val(),
                    'OMNumber' : omn,
                    'activityDesc' : $('#activityDesc').val(),
                },
                success:function(data){
                    $('#rolesForm')[0].reset();
                    $('#addRole').modal('hide');
                    location.reload();
                },
                error:function(){
                console.error();
                }
            });
        });
    //Edit Meat

    $(".editMeat").click(function(){
        let id = $(this).attr('id');
         $.ajax({
            url:"meats/"+id,
            method:"GET",
            dataType:"JSON",
            success: function(data){
                $('#team').val(data.team);
                $('#serviceline').val(data.serviceline);
                $('#oldbeneficiary').val(data.beneficiary);
                $('#activitydate').val(data.activityDate);
                $('#duration').val(data.duration);
                $('#omnumber').val(data.OMNumber);
                $('#activitydesc').val(data.activityDesc);
                $('#meatid').val(data.id);
                $('#editMeatm').modal("show");
            },
            error:function(){
            console.error();
        }
        });
    });

    //Update Meat Request

    $("#meatUpt").click(function(){
        let meatid = $('#meatid').val();
        $.ajax({
            method :"PUT",
            url  :"meats/"+meatid,
            data :{
                '_token' : $('input[name=_token]').val(),
                'team' : $('#team').val(),
                'serviceline' : $('#serviceline').val(),
                'beneficiary' : $('#oldbeneficiary').val(),
                'activityDate' : $('#activitydate').val(),
                'duration' : $('#duration').val(),
                'OMNumber' : $('#omnumber').val(),
                'activityDesc' : $('#activitydesc').val(),
                'meatid' : $('#meatid').val(),
            },
            success:function(data){
                $('#meatsEdit')[0].reset();
                location.reload();
            },
            error:function(){
            console.error();
        }
        });
    });

    // Delete Meat Request

    $(".delMeat").click(function(){
        let picked = $(this).attr('id');
        $('.modal-title').text("CAUTION!!");
        $('#warnmsg').html("Are you sure you want to delete?<input type='hidden' value='"+picked+"'>");
        $('#warn').modal("show");
        $(".confirm").click(function(){
            $.ajax({
                url:"meats/"+picked,
                method:"POST",
                data: {_method: 'delete','_token' : $('input[name=_token]').val()},
                success: function(msg){
                $('#warn').modal('hide');
                location.reload();
                },
                error:function(){
                console.error();
                }
            });
        });
    });

    /**
     * Leave Proceccing
     */
    
     //ADD LEAVE SETTINGS
     $("#leaveSettings").click(function(){
       $.ajax({
           type :"POST",
           url  :"leavesettings",
           data :{
               '_token' : $('input[name=_token]').val(),
               'leaveType' : $('#leaveTypes').val(),
               'annual' : $("input[name='annual']").val(),
               'bookable' : $('input[name=bookable]').val(),
               'description' : $('input[name=description]').val(),
           },
           success:function(data){
               $('#leaveSettingForm')[0].reset();
               $('#leaveSetting').modal('hide');
               location.reload();
           },
           error:function(){
           console.error();
           }
       });
   });

//Edit Leave Settings
$(".editLeavesetting").click(function(){
   let id = $(this).attr('id');
    $.ajax({
       url:"leavesettings/"+id,
       method:"GET",
       dataType:"JSON",
       success: function(data){
            $('#lvType').val(data.leaveType);
            $('#annual').val(data.annual);
            $('#bookable').val(data.bookable);
            $('#lvDescription').val(data.description);
            $('#leaveSettingId').val(data.id);
            $('#editLeaveSetting').modal("show");
        },
        error:function(){
            console.error();
        }
   });
});

//Pick Leave Setting to Update
$("#leaveSettingsUp").click(function(){
   let id = $('#leaveSettingId').val();
   $.ajax({
       method :"PUT",
       url  :"leavesettings/"+id,
       data :{
           '_token' : $('input[name=_token]').val(),
           'leaveType' : $('#lvType').val(),
           'annual' : $('#annual').val(),
           'bookable' : $('#bookable').val(),
           'description' : $('#lvDescription').val(),
           'id' : $('#leaveSettingId').val(),
       },
       success:function(data){
           $('#editLeaveSettingForm')[0].reset();
           location.reload();
       },
       error:function(){
       console.error();
   }
   });
});

// Delete Leave setting

$(".delLeavesetting").click(function(){
   let picked = $(this).attr('id');
   $('.modal-title').text("CAUTION!!");
   $('#warnmsg').html("Are you sure you want to delete?<input type='hidden' value='"+picked+"'>");
   $('#warn').modal("show");
   $(".confirm").click(function(){
       $.ajax({
           url:"leavesettings/"+picked,
           method:"POST",
           data: {_method: 'delete','_token' : $('input[name=_token]').val()},
           success: function(msg){
           $('#warn').modal('hide');
           location.reload();
           },
           error:function(){
           console.error();
           }
       });
   });
});

//Edit leave

    $(".acceptLeave").click(function(id){
        let leaveId = $(this).attr('id');
        let newStatus = "Confirmed";
        $.ajax({
            type :"GET",
            url  :"leaves/"+leaveId,
            success:function(data){
                console.log("Leave "+newStatus+" on "+data.id);
            },
            error:function(){
            console.error();
            }
        });
    })

    $(".denyLeave").click(function(id){
        let newStatus = "Denied";
        alert("Denying Leave");
        $.ajax({
            type :"GET",
            url  :"leaves/"+leaveId,
            success:function(data){
                console.log("Leave denied on "+data.id);
             },
             error:function(){
             console.error();
            }
        });
    });

      /**
     * Proceccing Deliverables
     */
    // Add Deliverable
    $("#delBtn").click(function(){
        let put;
        let omnumber = $('#omNum').val();
        if (omnumber==undefined)
        {
            put ='';
        }
        else{
           put = omnumber;
        }
       $.ajax({
           type :"POST",
           url  :"deliverables",
           data :{
               '_token' : $('input[name=_token]').val(),
               'deliverable' : $('input[name=deliverable]').val(),
               'user_id' : $('input[name=user_id]').val(),
               'project_id' : $('input[name=project_id]').val(),
               'stage' : $('#stage').val(),
               'status' : $('#status').val(),
               'completionDate' : $('#completionDate').val()
           },
           success:function(data){
                $('#rolesForm')[0].reset();
                $('#addRole').modal('hide');
                location.reload();
           },
           error:function(){
                console.error();
            }
       });
   });

   $('.userProfile').click(function(){
    let id = $(this).attr('id');
       $.ajax({
            url:"users/"+id,
            method:"GET",
            success: function(data){
                //console.log(data);
                // $('#reporting').html(data);

            },
            error:function(){
                console.error();
            }
        });
   });
//Document ready function ends here
});


  //FUNCTION TO POPULATE STAFF DATA LIST FOR REPORT TO
  
  function assignStaff(val) {
    $.ajax({
        url:"users/"+val,
        method:"GET",
        success: function(data){
            //console.log(data);
            $('#reporting').html(data);
            },
        error:function(){
            console.error();
        }
    });
}