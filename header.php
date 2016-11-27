<?php
/*******************************************************************************
* Iklan Manager                                                                *
*                                                                              *
* Version: 1.0(beta)                                                           *
* Date:    2016-11-27                                                          *
* Author:  TOMMI EKO PRASSETIYO                                                *
*******************************************************************************/
include_once('config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Tommi Eko Prassetiyo">

    <title>Iklan Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!--Font Awesome-->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="assets/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Iklan Manager</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalauthor"><span class="glyphicon glyphicon-user"></span></i> Tentang</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
                        </li>
                        <li>
                        <li>
                            <a href="#"><i class="fa fa-th-large"></i> Master<span class="fa arrow"></span></a>
                            <?php $crud->dataviewtable(); ?>
                            <!-- /.nav-second-level -->
                        </li>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


    <div id="modalauthor" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Tentang Pembuat</h4>
                </div>
            <div class="modal-body">
                <p>Nama : Tommi Eko Prassetiyo</p>
                <p>Alamat : Ngelom Megare Taman Sidoarjo</p>
                <p>Email : tommyekoprassetyo@gmail.com | tommieko.prassetiyo@gmail.com</p>
                <hr>
                <p>Jika Ada Bug/Kesalahan Program bisa langsung Hubungi ke Email di atas, agar segera di perbaiki dan di perbaruhi . Terima Kasih</p>
                <p>TEP Lab | Tommi Eko Prassetiyo Lab</p>
            </div>
            </div>
        </div>
    </div>