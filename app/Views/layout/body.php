<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Papua</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/home" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <img src="\img\admin.png" class="img-circle admin" alt="">
            </ul>
        </nav>
        <!-- /.navbar -->

        <?= $this->include('layout/sidebar'); ?>
        <?= $this->renderSection('content'); ?>

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="http://aiotech.id/" target="_blank">AioTech ITPLN</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $("#inputState").on('change', function() {
                // const value = $($this).val()
                // alert($(this).val());
                $(".table").hide();
                $("#" + $(this).val()).fadeIn(300);
            }).change();
        });
    </script>
</body>

</html>