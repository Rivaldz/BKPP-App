<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="theme/sbadmin/assets/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="theme/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
       
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= $this->include('admin/layouts/navbar'); ?>
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('admin/layouts/footer'); ?>
    
      <!-- Bootstrap core JavaScript-->
  <script src="theme/sbadmin/assets/jquery/jquery.min.js"></script>
  <script src="theme/sbadmin/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="theme/sbadmin/assets/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="theme/sbadmin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="theme/sbadmin/assets/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="theme/sbadmin/js/demo/chart-area-demo.js"></script>
  <script src="theme/sbadmin/js/demo/chart-pie-demo.js"></script>

</body>
</html>