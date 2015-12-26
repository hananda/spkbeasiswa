<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>SPK Beasiswa | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="base" content="<?php echo base_url(); ?>">
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/bootstrap-toastr/toastr.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black" style="background-image:url('<?php echo base_url(); ?>assets/img/unesa.jpg');background-repeat: no-repeat;
    background-position: center;background-size: cover;">

        <div class="form-box" id="login-box">
            <div class="header">Log In</div>
            <form id="loginform" action="<?php echo base_url(); ?>login/validateLogin" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="u" class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="p" class="form-control" placeholder="Password"/>
                    </div>          
                    <!-- <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div> -->
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign in</button>  
                    
                    <!-- <p><a href="#">I forgot my password</a></p> -->
                    
                    <a href="<?php echo base_url(); ?>login/register" class="text-center">Daftar Baru</a>
                </div>
            </form>

            <!-- <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div> -->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.0.2.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>assets/bootstrap-toastr/toastr.min.js"></script>      
        <script src="<?php echo base_url(); ?>assets/js/global.js" type="text/javascript"></script>        
        <script src="<?php echo base_url(); ?>assets/js/page/login.js" type="text/javascript"></script>        

    </body>
</html>