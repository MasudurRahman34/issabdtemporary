<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Isshabd admin</title>
  <!-- plugins:css -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/admin_style.css')); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <?php echo $__env->make('backend.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <?php echo $__env->make('backend.partials.left_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="<?php echo e(asset('js/popper.min.js')); ?>" ></script>
  <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/data-table.min.js')); ?>"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    } );
  </script>
  <?php echo $__env->yieldContent('scripts'); ?>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  


  <!-- End plugin js for this page-->
  <!-- inject:js -->
  
  <!-- endinject -->
  <!-- Custom js for this page-->
  
  <!-- End custom js for this page-->
</body>

</html>
<?php /**PATH C:\laragon\www\issabd\resources\views/backend/layouts/master.blade.php ENDPATH**/ ?>