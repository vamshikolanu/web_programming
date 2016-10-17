<?php include('header.php');?>

		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

        <style>
            body {
                background: url('../images/login_background.jpg');
                background-size: cover;
                opacity: 0.95;
            }

            .input-group {
                margin-bottom: 15px;
            }

            .text-danger{
                margin-bottom: 20px;
            }

        </style>

    <title> LOGIN PAGE </title>

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
<!--                         <div style="float:right; font-size: 80%; position: relative; top:-17px"><a href="#">Forgot password?</a></div>
 -->                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                        
                        <?php if(isset($_GET['error_login'])) {
                            echo '<div class="alert alert-danger">
                                    Invaid username or password !
                                </div>';
                        }?>

                        <form action="../actions/login.php" method="post" id="login_form" class="form-horizontal" role="form">
                                    
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-name" type="text" class="form-control" name="name" value="" placeholder="email" required/>     
                            </div>
                            <p id="login_email_error" style="display:none;" class="text-danger">Please enter valid email address<p>
                                
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                            </div>
                            <p id="login_password_error" style="display:none;" class="text-danger">Password length should be more than 5 <p>        


                                <div style="margin-top:10px" class="form-group">
                                    <div class="col-sm-12 controls">
                                      <button id="btn-login" href="#" class="btn btn-success"> <i class="fa fa-sign-in"></i>  &nbsp; Login  </button>
                                    </div>
                                </div>


                                <!-- <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        	<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            	Sign Up 
                                        	</a>
                                        </div>
                                    </div>
                                </div>  -->   
                            </form>     
                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-17px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form method="post" id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                               	 <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        <input id="signup-email" type="text" class="form-control" name="email" placeholder="email" required/>
                                    </div>
                                    <p id="signup_email_error" style="display:none;" class="text-danger">Please enter valid email address<p>
                                    
                                     <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input id="signup-fullname" type="text" class="form-control" name="name" placeholder="full name" required/>
                                    </div>
                                    <p id="signup_fullname_error" style="display:none;" class="text-danger">Full name length should be more than 5 <p>
                                    
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="signup-password" type="password" class="form-control" name="password" placeholder="password" required/>
                                </div>
                                <p id="signup_password_error" style="display:none;" class="text-danger">Password length should be more than 5 <p>
                                
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <button id="btn-signup" type="button" class="btn btn-success"><i class="fa fa-user-plus"></i> &nbsp; Sign Up</button>
                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>        
         </div> 
    </div>
    


	    <?php include('script_files');?>
       
        <script type="text/javascript">

            $(document).ready(function() {

                $('.alert').fadeOut(1500);

                $('#login_email_error').hide();
                $('#login_password_error').hide();

//                 $('#btn-login').click(function(e) {
//                     var email = $('#login-email').val(); 
//                     var password = $('#login-password').val();
//                     var email_result = check_email(email);
//                     var password_result = check_length($('#login-password'), 5, 'Password length should be more than 5');

//                     // if(!email_result) {
//                     //     $('#login_email_error').show().fadeOut(3000);
//                     //     e.preventDefault();
//                     // }
                                     
//                     // if(!password_result) {
//                     //     $('#login_password_error').show().fadeOut(3000);
//                     //     e.preventDefault();
//                     // }

// //                    return email_result && password_result;
//                 });

                $('#btn-signup').click(function(e){
                    var email = $('#signup-email').val(); 
                    var password = $('#signup-password').val();
                    var fullname = $('#signup-fullname').val();

                    var email_result =  check_email(email);
                    var password_result = check_length(password, 5);
                    var fullname_result = check_length(name, 5);

                    if(!email_result) {
                        $('#signup_email_error').show().fadeOut(3000);
                        e.preventDefault();
                    }
                    if(!password_result) {
                        $('#signup_password_error').show().fadeOut(3000);
                        e.preventDefault();
                    }
                    if(!fullname_result) {
                        $('#signup_fullname_error').show().fadeOut(3000);
                        e.preventDefault();
                    }

                    return email_result && fullname_result && password_result;


                });

            });
        </script>

     
     <?php include('footer.php'); ?>