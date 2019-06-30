$(document).ready(function(){  
  $('#editname').click(function(){
    var name=$('#user_name').text();
    $('#editname-box').removeAttr('hidden');
    $('#edit_username').val(name);
    $('#editname').attr('hidden','true');
    $('#remove-edit-name').removeAttr('hidden');
  });
  $('#remove-edit-name').click(function(){
    $('#editname-box').attr('hidden','true');
    $('#remove-edit-name').attr('hidden','true');
    $('#editname').removeAttr('hidden');
  })

  $('#edit_username_button').click(function(){
    var value=$('#edit_username').val();
    var token=$('#csrf_token').val();
    $('#editname_check').attr('hidden','true');
    $('#editname_spinner').removeAttr('hidden');
    $.ajax({
      type: "POST",
      url: "/editprofile",
      data: { 
        'name': value,
        'type':'name',
        _token: token
      },
        success: function(result) {
          $('#editname-box').attr('hidden','true');
          $('#remove-edit-name').attr('hidden','true');
          $('#editname').removeAttr('hidden');
          $('#user_name').text(value);
          $('#profilepicture_name').html(value);
          $('#profilecard_name').html(value);
          $('#editname_spinner').attr('hidden','true');
          $('#editname_check').removeAttr('hidden');
          var shortname=value.substr(0,20);
          $('#navbar_username').text('Hi! '+shortname);
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Well Done!'+
            '</h4>'+
            '<p>Your name was changed successfully.</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
       if(result.readyState === 0)
       {
        $('#editname_spinner').attr('hidden','true');
        $('#editname-box').attr('hidden','true');
        $('#remove-edit-name').attr('hidden','true');
        $('#editname').removeAttr('hidden');
        $('#editname_check').removeAttr('hidden');
        $('#messages').append(
          '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
          '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
          '<span aria-hidden="true">×</span>'+
          '</button>'+
          '<h4 class="h5">'+
            '<i class="fa fa-minus-circle"></i>'+
            ' Oh snap!'+
            '</h4>'+
          '<p>Server did not respond. Try refreshing the page or check your internet connection.</p>'+
      '</div>'
        ).find('.alert-dismissible').delay(8000).fadeOut(2000);
       }
          var msg = result.responseJSON;
          var errors = msg.errors.name;
          $('#editname_spinner').attr('hidden','true');
          $('#editname-box').attr('hidden','true');
          $('#remove-edit-name').attr('hidden','true');
          $('#editname').removeAttr('hidden');
          $('#editname_check').removeAttr('hidden');
          $( "#ajax_error_messages" ).load(window.location.href + " #ajax_error_messages" );
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-minus-circle"></i>'+
            ' Oh snap!'+
            '</h4>'+
            ' <ul id="ajax_error_messages" class="u-alert-list g-mt-10">'+
            '</ul>'+
        '</div>'
          ).find('.alert-dismissible').fadeOut(8000);
          console.log(errors);
          var err=''
          $.each(errors, function(i, item) {
            console.log(item);
            err=err+'<li>'+item+'</li>';
          }); 
          
          $('#ajax_error_messages').html(err);
         
        }
      });
    });
    $('#edit_username').keypress(function(e){
      if(e.which == 13){//Enter key pressed
          $('#edit_username_button').click();//Trigger search button click event
      }
  });



  //general function
  $('#institution_add').keypress(function(e){
    if(e.which == 13){//Enter key pressed
        $('#institution_add_button').click();//Trigger search button click event
    }
});
$('#editinstitution_field').keypress(function(e){
  if(e.which == 13){//Enter key pressed
      $('#editinstitution_button').click();//Trigger search button click event
  }
});
  $('#institution_add_button').click(function(){
    var value=$('#institution_add').val();
    console.log(value.length);
    var token=$('#csrf_token').val();
    $('#addinstitution_check').attr('hidden','true');
    $('#addinstitution_spinner').removeAttr('hidden');
    $.ajax({
      type: "POST",
      url: "/editprofile",
      data: { 
        'institution': value,
        'type':'institution',
        _token: token
      },
      success: function(result) {
        if(value.length === 0){
          $('#addinstitution_check').removeAttr('hidden');
          $('#addinstitution_spinner').attr('hidden','true');
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-minus-circle"></i>'+
            ' Oh snap!'+
            '</h4>'+
            ' <ul class="u-alert-list g-mt-10">'+
            'Nothing happened next time input some data before saving!'+
            '</ul>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        }
        else{
          $('#addinstitution').attr('hidden','true');
          $('#edit_institution').removeAttr('hidden');
          $('#user_institution').text(value);
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Well done!'+
            '</h4>'+
            '<p>You Company name was added.</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        }
      },
      error: function(result) {
        var msg = result.responseJSON;
        var errors = msg.errors.institution;
        console.log(errors);
        $('#addinstitution_check').removeAttr('hidden');
        $('#addinstitution_spinner').attr('hidden','true');
        $('#messages').append(
          '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
          '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
          '<span aria-hidden="true">×</span>'+
          '</button>'+
          '<h4 class="h5">'+
          '<i class="fa fa-minus-circle"></i>'+
          ' Oh snap!'+
          '</h4>'+
          ' <ul id="ajax_error_messages" class="u-alert-list g-mt-10">'+
          '</ul>'+
      '</div>'
        ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        $.each(errors, function(i, item) {
          $('#ajax_error_messages').append('<li>'+item+'</li>');
      }); 
      }
   });
  });
  $('#edit_institution_button').click(function(){
      var inst = $('#user_institution').text();
      $('#editinstitution_field').val(inst);
      $('#editinstitution-box').removeAttr('hidden');
      $('#edit_institution_button').attr('hidden','true');
      $('#remove-edit-institution').removeAttr('hidden');
     
  });
  $('#remove-edit-institution').click(function(){
    $('#editinstitution-box').attr('hidden','true');
    $('#remove-edit-institution').attr('hidden','true');
    $('#edit_institution_button').removeAttr('hidden');
  })

  $('#editinstitution_button').click(function(){
    var value=$('#editinstitution_field').val();
    var token=$('#csrf_token').val();
    $('#editinstitution_check').attr('hidden','true');
    $('#editinstitution_spinner').removeAttr('hidden');
    $.ajax({
      type: "POST",
      url: "/editprofile",
      data: { 
        'institution': value,
        'type':'institution',
        _token: token
      },
      success: function(result) {
        if(value.length === 0)
        {
          $('#addinstitution').removeAttr('hidden');
          $('#editinstitution_spinner').attr('hidden','true');
          $('#editinstitution_check').removeAttr('hidden');
          $('#user_institution').text('');
          $('#institution_add').val('');
          $('#addinstitution_spinner').attr('hidden','true');
          $('#addinstitution_check').removeAttr('hidden');
          $('#editinstitution-box').attr('hidden','true');
          $('#edit_institution').attr('hidden','true');
          $('#remove-edit-institution').attr('hidden','true');
          $('#edit_institution_button').removeAttr('hidden');
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-minus-circle"></i>'+
            ' Removed!'+
            '</h4>'+
            ' <ul class="u-alert-list g-mt-10">'+
            'Your Company name was removed'+
            '</ul>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        }
        else
        {
          $('#user_institution').text(value);
          $('#editinstitution-box').attr('hidden','true');
          $('#editinstitution_spinner').attr('hidden','true');
          $('#editinstitution_check').removeAttr('hidden');
          $('#remove-edit-institution').attr('hidden','true');
          $('#edit_institution_button').removeAttr('hidden');
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<h4 class="h5">'+
            '<i class="fa fa-check-circle-o"></i>'+
            ' Success!'+
            '</h4>'+
            '<p>Your Company name was changed successfully.</p>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        }
      },
      error: function(result) {
        var msg = result.responseJSON;
        var errors = msg.errors.institution;
        console.log(errors);
        $('#addinstitution_check').removeAttr('hidden');
        $('#addinstitution_spinner').attr('hidden','true');
        $('#messages').append(
          '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger alert-dismissible fade show" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
          '<button type="button"  id="close-ajax-message" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
          '<span aria-hidden="true">×</span>'+
          '</button>'+
          '<h4 class="h5">'+
          '<i class="fa fa-minus-circle"></i>'+
          ' Oh snap!'+
          '</h4>'+
          ' <ul id="ajax_error_messages" class="u-alert-list g-mt-10">'+
          '</ul>'+
      '</div>'
        ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        $('#ajax_error_messages').empty();
        $.each(errors, function(i, item) {
          $('#ajax_error_messages').append('<li>'+item+'</li>');
      }); 
      }
   });
  });

});


$(document).click(function() {
  $('#messages').empty();
});


