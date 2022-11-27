<?php
if (isset($_SESSION['status']) != 'login') {
  $_SESSION['massage'] = 'belum_login';
  redirect('auth');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MAN 2 TULUNGAGUNG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/plugins/iCheck/square/blue.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


  <link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">

  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/css/select2.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.1/css/fixedColumns.dataTables.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <!-- jQuery 3 -->
  <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery 3 -->
  <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- <script src="<?= base_url() ?>dist/js/jquery-ui-main/ui/i18n/datepicker-id.js"></script> -->
  <!-- <script src="i18n/datepicker-id.js"></script> -->

  <script>
    var base_url = window.location.origin;
  </script>

  <style>
    tr.strikeout td:before {
      content: " ";
      position: absolute;
      top: 50%;
      left: 0;
      border-bottom: 1px solid #111;
      width: 100%;
    }

    tr.strikeout td:after {
      content: "\00B7";
      font-size: 1px;
    }

    th,
    td {
      white-space: nowrap;
    }

    div.dataTables_wrapper {
      width: 100% !important;
      margin: 0 auto !important;
    }

    #data-table,
    #data-table2,
    #data-table3,
    #data-table4 {
      width: 100% !important;
    }

    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #EDF0F4;
    }

    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      font: 14px arial;
    }

    .loader {
      --background: linear-gradient(135deg, #23C4F8, #275EFE);
      --shadow: rgba(39, 94, 254, 0.28);
      --text: #6C7486;
      --page: rgba(255, 255, 255, 0.36);
      --page-fold: rgba(255, 255, 255, 0.52);
      --duration: 3s;
      width: 200px;
      height: 140px;
      position: relative;
    }

    .loader:before,
    .loader:after {
      --r: -6deg;
      content: "";
      position: absolute;
      bottom: 8px;
      width: 120px;
      top: 80%;
      box-shadow: 0 16px 12px var(--shadow);
      transform: rotate(var(--r));
    }

    .loader:before {
      left: 4px;
    }

    .loader:after {
      --r: 6deg;
      right: 4px;
    }

    .loader div {
      width: 100%;
      height: 100%;
      border-radius: 13px;
      position: relative;
      z-index: 1;
      perspective: 600px;
      box-shadow: 0 4px 6px var(--shadow);
      background-image: var(--background);
    }

    .loader div ul {
      margin: 0;
      padding: 0;
      list-style: none;
      position: relative;
    }

    .loader div ul li {
      --r: 180deg;
      --o: 0;
      --c: var(--page);
      position: absolute;
      top: 10px;
      left: 10px;
      transform-origin: 100% 50%;
      color: var(--c);
      opacity: var(--o);
      transform: rotateY(var(--r));
      -webkit-animation: var(--duration) ease infinite;
      animation: var(--duration) ease infinite;
    }

    .loader div ul li:nth-child(2) {
      --c: var(--page-fold);
      -webkit-animation-name: page-2;
      animation-name: page-2;
    }

    .loader div ul li:nth-child(3) {
      --c: var(--page-fold);
      -webkit-animation-name: page-3;
      animation-name: page-3;
    }

    .loader div ul li:nth-child(4) {
      --c: var(--page-fold);
      -webkit-animation-name: page-4;
      animation-name: page-4;
    }

    .loader div ul li:nth-child(5) {
      --c: var(--page-fold);
      -webkit-animation-name: page-5;
      animation-name: page-5;
    }

    .loader div ul li svg {
      width: 90px;
      height: 120px;
      display: block;
    }

    .loader div ul li:first-child {
      --r: 0deg;
      --o: 1;
    }

    .loader div ul li:last-child {
      --o: 1;
    }

    .loader span {
      display: block;
      left: 0;
      right: 0;
      top: 100%;
      margin-top: 20px;
      text-align: center;
      color: #222D32;
      font-weight: bold;
    }

    @-webkit-keyframes page-2 {
      0% {
        transform: rotateY(180deg);
        opacity: 0;
      }

      20% {
        opacity: 1;
      }

      35%,
      100% {
        opacity: 0;
      }

      50%,
      100% {
        transform: rotateY(0deg);
      }
    }

    @keyframes page-2 {
      0% {
        transform: rotateY(180deg);
        opacity: 0;
      }

      20% {
        opacity: 1;
      }

      35%,
      100% {
        opacity: 0;
      }

      50%,
      100% {
        transform: rotateY(0deg);
      }
    }

    @-webkit-keyframes page-3 {
      15% {
        transform: rotateY(180deg);
        opacity: 0;
      }

      35% {
        opacity: 1;
      }

      50%,
      100% {
        opacity: 0;
      }

      65%,
      100% {
        transform: rotateY(0deg);
      }
    }

    @keyframes page-3 {
      15% {
        transform: rotateY(180deg);
        opacity: 0;
      }

      35% {
        opacity: 1;
      }

      50%,
      100% {
        opacity: 0;
      }

      65%,
      100% {
        transform: rotateY(0deg);
      }
    }

    @-webkit-keyframes page-4 {
      30% {
        transform: rotateY(180deg);
        opacity: 0;
      }

      50% {
        opacity: 1;
      }

      65%,
      100% {
        opacity: 0;
      }

      80%,
      100% {
        transform: rotateY(0deg);
      }
    }

    @keyframes page-4 {
      30% {
        transform: rotateY(180deg);
        opacity: 0;
      }

      50% {
        opacity: 1;
      }

      65%,
      100% {
        opacity: 0;
      }

      80%,
      100% {
        transform: rotateY(0deg);
      }
    }

    @-webkit-keyframes page-5 {
      45% {
        transform: rotateY(180deg);
        opacity: 0;
      }

      65% {
        opacity: 1;
      }

      80%,
      100% {
        opacity: 0;
      }

      95%,
      100% {
        transform: rotateY(0deg);
      }
    }

    @keyframes page-5 {
      45% {
        transform: rotateY(180deg);
        opacity: 0;
      }

      65% {
        opacity: 1;
      }

      80%,
      100% {
        opacity: 0;
      }

      95%,
      100% {
        transform: rotateY(0deg);
      }
    }
  </style>
</head>