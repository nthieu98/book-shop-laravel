$(function() {
  $('#loginbtn').click(function(e) {
    e.preventDefault();
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $.ajax({
        'url':'/', 
        'data': {
          'username' : $('#email').val(),
          'password' : $('#password').val()
        },
        'type' : 'POST',
        success: function (data) {
          console.log(data);
          if (data.error == true) {
            $('.error').hide();
            if (data.message.email != undefined) {
              $('.errorEmail').show().text(data.message.email[0]);
            }
            if (data.message.password != undefined) {
              $('.errorPassword').show().text(data.message.password[0]);
            }
            if (data.message.errorlogin != undefined) {
              $('.errorLogin').show().text(data.message.errorlogin[0]);
            }
          } else {
            window.location.href = "http://localhost/authentication/public/"
          }
        }
      });
  })
});