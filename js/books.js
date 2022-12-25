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

                    success: function(data) {
                        //alert(data);
                        if (data == "0") {
                            $("#userName").val('');
                            $("#passWord").val('');
                            $('#loginScreen').addClass('border-danger');
                            $('#loginWrong').addClass('alert-danger');
                            $('#loginWrong').text('Wrong password or user not found!');
                            $('#loginWrong').fadeIn();
                        } else {
                            window.location.replace('dashboard.php');
                        }
                    },

                    error: function(data) {
                        //alert(data);
                        $('#loginScreen').addClass('border-danger');
                        $('#loginWrong').addClass('alert-danger');
                        $('#loginWrong').text('Something went wrong!');
                        $('#loginWrong').fadeIn();
                    },
                })
            }
        },
    }
    $.book = {
        search: function() {
            var searchText = $('#seachText').val();
            if (searchText != "") {
                $.ajax({
                    type: "POST",
                    url: "search.php",
                    data: { seachText: searchText },

                    success: function(data) {
                        //alert(data);
                        $('#showResult').fadeIn();
                        $('#showResultData').fadeIn();
                        $('#showResultData').html(data);
                    },
                    error: function(data) {
                        alert("Error");
                    }

                })
            }
        },

        detail: function(bookCode) {
            window.location.href = "bookDetail.php?bookCode=" + bookCode;
        },
    }


})