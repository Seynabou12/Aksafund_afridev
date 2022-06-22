<?php
$title_prefix = 'Aksafund : ';
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
        <?= $title_prefix ?>
        <?= $this->fetch('title') ?>
    </title>

  <!-- Custom fonts for this template-->
  <?= $this->Html->css('custom.css') ?>
  <?= $this->Html->css('admin/fontawesome-free/css/all.min.css') ?>
  <?= $this->Html->css('admin/sb-admin-2.min.css') ?>
  <?= $this->Html->css('admin/select2.min.css') ?>
  <?= $this->Html->css('slick/slick.css') ?>
  <?= $this->Html->css('slick/slick-theme.css') ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" integrity="sha256-ygkqlh3CYSUri3LhQxzdcm0n1EQvH2Y+U5S2idbLtxs=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


   <!-- Custom styles for this page -->
   <?= $this->Html->css('admin/datatables/dataTables.bootstrap4.min.css') ?>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

   <?= $this->fetch('css') ?>
</head>

<body id="page-top" class="sidebar-toggled">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?= $this->Element('Nav/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style="overflow: hidden;">

        <!-- Topbar -->
        <!-- End of Topbar -->
        <?= $this->Element('Nav/topbar') ?>
        <!-- Begin Page Content -->
        <div class="container-fluid" style="height: 100%">
            <?= $this->Flash->render() ?>
          <div class="row" style="height: auto">
            <?= $this->fetch('content') ?>
          </div>
        </div>
        <!-- /.cntainer-fluid-->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Aksafund - Groupe Afridev SAS</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <?= $this->Html->script('admin/vendor/jquery/jquery.min.js');?>
    <?= $this->Html->script('admin/vendor/bootstrap/bootstrap.bundle.min.js');?>
    <?= $this->Html->script('admin/vendor/select2.min.js');?>
    <?= $this->Html->script('admin/vendor/Chart.min.js');?>
    <?= $this->Html->script('admin/vendor/chart/chart-bar-demo.js');?>
    <?= $this->Html->script('admin/vendor/chart/chart-pie-demo.js');?>

    <!-- Core plugin JavaScript-->
    <?= $this->Html->script('admin/vendor/jquery-easing/jquery.easing.min.js');?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
  
    <!-- Custom scripts for all pages-->
    <?= $this->fetch('script'); ?>
    <?= $this->Html->script('admin/vendor/sb-admin-2.min.js');?>
    <?= $this->fetch('script_bottom'); ?>
    <script>
      $(function() {
        //Global - partout où on veut utiliser select2
        $('.select2').select2();
      });
    </script>
    
  
</body>

</html>