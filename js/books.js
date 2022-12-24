$(document).ready(function() {
    $.user = {
        login: function() {
            if ($("#userName").val() == "" || $("#passWord").val() == "") {
                $('#loginScreen').addClass('border-warning');
                $('#loginWrong').addClass('alert-warning');
                $('#loginWrong').text('All fiels required!');
                $('#loginWrong').fadeIn();
            } else {
                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: $('#loginForm').serialize(),
                    error: function(data) {
                        console.log(data);
                        $('#loginScreen').addClass('border-danger');
                        $('#loginWrong').addClass('alert-danger');
                        $('#loginWrong').text('Something went wrong!');
                        $('#loginWrong').fadeIn();
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == "0") {
                            $("#userName").val('');
                            $("#passWord").val('');
                            $('#loginScreen').addClass('border-danger');
                            $('#loginWrong').addClass('alert-danger');
                            $('#loginWrong').text('Wrong password or user not found!');
                            $('#loginWrong').fadeIn();
                        } else {
                            window.location.replace('index.php');
                        }
                    }
                })
            }
        }
    }
})

//Enter press to post login form
$(document).on('keypress', function(e) {
    if (e.which == 13) {
        $.user.login();
    }
});