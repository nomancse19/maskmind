<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maskmind Administrator Login Page</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>backend/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
  
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <h1>MaskMind Administrator Login </h1>
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" action="<?php echo base_url();?>maskmind/admin_login/login_check" method="post">
                           
                                    <h5>Enter Details to Login</h5>
                                    <span style="color:red;font-weight: bold">
                                        <?php
                                        $message=$this->session->flashdata('message');
                                        if($message){
                                            echo $message;
                                        }
                                        ?>
                                    </span>
                                       <br />
                                       <br />
                                       <div class="form-group input-group">
                                           <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                           <input type="email" class="form-control"name="user_email" required placeholder="Your Email Address" />
                                       </div>
                                       <div class="form-group input-group">
                                           <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                           <input type="password" name="password" class="form-control" required placeholder="Your Password" />
                                       </div>
                                       <div class="form-group">
                                            
                                            <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                     <button class="btn btn-primary">Login Now</button>
                                    
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
