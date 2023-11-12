<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AIF | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/adminlte.css">
  <link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
  <link rel="stylesheet" href="<?php echo URL; ?>public/plugins/daterangepicker/daterangepicker.css">






  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<script type="text/javascript">
  function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    if (h == 0) {
      h = 12;
    }

    if (h > 12) {
      h = h - 12;
      session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);

  }

  showTime();
</script>
<script src="<?= URL; ?>public/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= URL; ?>public/js1/sweelaert.js"></script>

<style>
  @font-face {
    font-family: laofont;
    src: url(<?php echo URL; ?>public/css/phetsarath_ot.ttf);
  }

  .laotext {
    font-family: laofont !important;
  }
</style>
<style>
  .scroll {
    width: 100%;

    overflow-y: scroll;
  }

  .scroll::-webkit-scrollbar {
    width: 2px;
  }

  .scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
  }

  .scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
  }

  .circledivPending {
    height: 35px;
    width: 35px;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
    border-radius: 50%;

    background: #ffd24b;
  }

  .circledivCancel {

    height: 35px;
    width: 35px;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
    border-radius: 50%;

    background: #f2727f;
  }

  .circledivComplete {
    height: 35px;
    width: 35px;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
    border-radius: 50%;

    background: #3dcfa4;
  }

  .hori-timeline .events {
    border-top: 3px solid #e9ecef;
  }

  .hori-timeline .events .event-list {
    display: block;
    position: relative;
    text-align: center;
    padding-top: 40px;
    margin-right: 0;
  }

  .hori-timeline .events .event-list:before {
    content: "";
    position: absolute;
    height: 36px;
    border-right: 2px dashed #dee2e6;
    top: 0;
  }

  .hori-timeline .events .event-list .event-date {
    position: absolute;

    left: 0;
    right: 0;

    margin: 0 auto;

  }

  @media (min-width: 1140px) {
    .hori-timeline .events .event-list {
      display: inline-block;
      width: 150px;
      padding-top: 40px;
    }

    .hori-timeline .events .event-list .event-date {
      top: -30px;
    }
  }

  @media (min-width: 992px) {
    .modal-lg {
      max-width: 1000px;
    }
  }

  .text {
    font-size: 12px;
  }


  .labelmodal {
    font-size: 10px;
    font-weight: 990;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" onload="showTime();">