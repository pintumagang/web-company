<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?=base_url();?>assets/css/CSS_Admin_Home.css" rel="stylesheet" />
    <link href="<?=base_url();?>assets/css/profil.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>

    <!-- ini untuk Perusahaan_Pendaftar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>


</head>
<body>

<div class="container base">
    <div>
        <h1 align="center">Pintu Magang</h1>
    </div>
    <div class="row div">
        <div class="container top">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="" target="_blank" style="color:white;"><i class=""></i><?php
                                if ($_SESSION['user']){
                                    echo $_SESSION['user'];
                                }else{
                                    header("Location: /web-company/");
                                }
                                ?></a></li>
                        <li><a href="<?php echo site_url('User/logout') ?>" style="color:white;" ><i class="glyphicon glyphicon-log-out" style="color:white;"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container content">
            <div class="row div">
                <div class="col-md-3">
                    <div class="content">

                        <?php include 'Perusahaan_Navbar.php'; ?>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content">

                        <?php include 'Perusahaan_content.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


</body>
</html>
