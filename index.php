<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Multi-Step-Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <style type="text/css" media="screen">
            #second, #third, #result{
                display: none;
            }
        </style>
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-light p-4 rounded mt-5">
                    <div class="test-center text-light bg-success mb-2 p-2 rounded lead" id="result">
                        Hello world!
                    </div>
                    <div class="progress mb-3" style="height: 48px;">
                        <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 20%;" id="progressBar">
                            <b class="lead" id="progressText">Step - 1</b>
                        </div>
                    </div>
                    <form id="form-data">
                        <div id="first">
                            <h4 class="test-center bg-primary p-2 rounded text-light">Personal Information</h4>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Full Name" id="name">
                                <b class="form-text text-danger" id="nameError"></b>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username"  placeholder="Enter Username" id="username">
                                <b class="form-text text-danger" id="usernameError"></b>
                            </div>
                            <div class="form-group">
                                <a href="#" class="btn btn-danger" id="next-1">Next</a>
                            </div>
                        </div>

                        <div id="second">
                            <h4 class="test-center bg-primary p-2 rounded text-light">Contact Information</h4>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" name="email"  placeholder="Enter E-mail" id="email">
                                <b class="form-text text-danger" id="emailError"></b>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone"  placeholder="Enter Phone" id="phone">
                                <b class="form-text text-danger" id="phoneError"></b>
                            </div>
                            <div class="form-group">
                                <a href="#" class="btn btn-danger" id="prev-2">Previous</a>
                                <a href="#" class="btn btn-danger" id="next-2">Next</a>
                            </div>
                        </div>

                        <div id="third">
                            <h4 class="test-center bg-primary p-2 rounded text-light">Choose Password</h4>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Enter Password" id="password">
                                <b class="form-text text-danger" id="passwordError"></b>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Enter Confirm Password" id="confirm_password">
                                <b class="form-text text-danger" id="confirm_passwordError"></b>
                            </div>
                            <div class="form-group">
                                <a href="#" class="btn btn-danger" id="prev-3">Previous</a>
                                <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                

                // alert('Hello');
                $('#next-1').click(function(e) {
                    e.preventDefault();
                    if ($('#name').val() == '') {
                        $('#nameError').html('* Name is required.');
                        return false;
                    }else if($('#name').val().length <3){
                        $('#nameError').html('* Name is mini 3 characters');
                        return false;
                    }else if(!isNaN($('#name').val())){
                        $('#nameError').html('Number are not allowed');
                        return false;
                    }else if($('#username').val() == ''){
                        $('#usernameError').html('* Username is required.');
                        return false;
                    }else if($('#username').val().length <3){
                        $('#usernameError').html('* Username is mini 3 characters');
                        return false;
                    }else if(!isNaN($('#username').val())){
                        $('#usernameError').html('Number are not allowed');
                        return false;
                    }else{
                        $('#second').show();
                        $('#first').hide();
                        $('#progressBar').css('width', '60%');
                        $('#progressText').html('Step - 2');
                    }
                    
                });

                $('#submit').click(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url:"action.php",
                        method: "post",
                        data:$('#form-data').serialize(),
                        success:function (response) {
                            $("#result").show();
                            $("#result").html(response);
                        }
                    });
                });

                $('#next-2').click(function(e) {
                    e.preventDefault();
                    $('#third').show();
                    $('#second').hide();
                    $('#progressBar').css('width', '100%');
                    $('#progressText').html('Step - 3');
                });

                $('#prev-2').click(function() {
                    $('#second').hide();
                    $('#first').show();
                    $('#progressBar').css('width', '20%');
                    $('#progressText').html('Step - 1');
                });

                $('#prev-3').click(function() {
                    $('#second').show();
                    $('#third').hide();
                    $('#progressBar').css('width', '60%');
                    $('#progressText').html('Step - 2');
                });

            });
        </script>
    </body>
</html>