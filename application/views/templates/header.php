<?php
if ($this->session->userdata('email') != null) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title; ?></title>

        <!-- sweet alert -->
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/daterangepicker/daterangepicker.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/dist/css/adminlte.min.css">
        <!-- daterange picker -->
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/daterangepicker/daterangepicker.css"> -->

        <link rel="shortcut icon" href="<?= base_url('admin/dist/img/logo.ico') ?>">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/summernote/summernote-bs4.min.css">

        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <style>
            .swal2-popup {
                font-size: 0.9rem !important;
            }
        </style>
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url(); ?>admin/#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">


                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                </ul>
            </nav>
        <?php
    } else {
        redirect(base_url('/'));
    }
