<!DOCTYPE html>
<html>
    <head>
    <?php
        require_once("static/head.html");
    ?>
    <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    
                    <div id="loginScreen" class="card my-5">
            
                        <form id="loginForm" class="card-body cardbody-color p-lg-5" action="" name="loginForm" method="post">
                            <div id="loginWrong" class="alert" role="alert">
                                <!-- Form message -->
                            </div>
                            <div class="text-center">
                                
                            </div>

                            <div class="text-center card mb-3 p-2">
                                Book Search Dashboard Login
                            </div>
                            <div class="mb-3">
                        
                                <input type="text" name="userName" class="form-control" id="userName" aria-describedby="userName"
                                    placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="passWord" class="form-control" id="passWord" placeholder="Password" required>
                            </div>
                            <div class="text-center">
                                <button type="button" name="login" id="login" value="Login" class="btn btn-primary px-5 mb-5 w-100" onclick="$.user.login();">Login</button>
                            </div>
                            
                        </form>
                    </div>
            
                </div>
            </div>
        </div>
    </body>
</html>