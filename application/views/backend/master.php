<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrator Dashboard. MaskMind</title>
        <link href="<?php echo base_url();?>backend/assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>backend/assets/css/datatable.css" rel="stylesheet"/>
        <script src="<?php echo base_url();?>backend/assets/js/fontawesome.js"></script>
        <style>
            .table th, .table td {
                padding: 0.35rem;
                vertical-align: top;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo base_url();?>MaskmindOwner/dashboard">MaskMind</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       <!-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="<?php echo base_url();?>logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a 
                            <?php
                            $path=current_url();
                            $page= basename($path);
                            ?>  
                            class="nav-link <?php if($page=='dashboard'){echo "active";}?>"
                             href="<?php echo base_url();?>MaskmindOwner/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>


                            <!--
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> -->






                            <a
                            <?php
                            $path=current_url();
                            $page= basename($path);
                            ?>  
                            class="nav-link <?php if($page=='MaskUserList'){echo "active";}?>"
                            href="<?php echo base_url();?>MaskmindOwner/MaskUserList">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Mask Assign
                            </a>
                            <a 
                            <?php
                            $path=current_url();
                            $page= basename($path);
                            ?> 
                           class="nav-link <?php if($page=='ManageGiftCard'){echo "active";}?>"
                            
                           href="<?php echo base_url();?>MaskmindOwner/ManageGiftCard">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Gift Card Generate
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $this->session->userdata('username'); ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <?php echo $admin_main_content; ?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;Maskmind 2020</div>
                            <div>
                                <a href="https://noman-it.com">Design & Developed By Jahidul Islam Noman</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url();?>backend/assets/js/main_jquery.js"></script>
        <script src="<?php echo base_url();?>backend/assets/js/bootstrap_bundle.js"></script>
        <script src="<?php echo base_url();?>backend/assets/js/scripts.js"></script>
        <script src="<?php echo base_url();?>backend/assets/js/chart_min.js"></script>
        <script src="<?php echo base_url();?>backend/assets/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>backend/assets/assets/demo/chart-bar-demo.js"></script>
        <script src="<?php echo base_url();?>backend/assets/js/datatable_min.js"></script>
        <script src="<?php echo base_url();?>backend/assets/js/datatable_bootstrap_min.js"></script>
        <script src="<?php echo base_url();?>backend/assets/assets/demo/datatables-demo.js"></script>
        
<script>
$(document).ready(function(){
  $(document).on('click','#assign_mask',function(e){
    var uid = $(this).data('id');
    $.ajax({
      url: '<?php echo base_url();?>Super_admin/assign_mask/'+uid,
      //data:{'<?php //echo Super_admin::csrf_name();?>':'<?php //echo Super_admin::csrf_token();?>'},
      type: 'POST',
      dataType: 'html',
      success: function(data){
          $("#editdata").html(data);
         }
    });
  });
});





</script>
    </body>
</html>
