<?php if($errors->any()): ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="alert alert-success mt-1">
          <p><?php echo e(Session::get('success')); ?></p>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if(Session::has('sticky_error')): ?>
  <div class="container mt-1">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="alert alert-danger">
          <p><?php echo e(Session::get('sticky_error')); ?></p>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\issabd\resources\views/frontend/partials/messages.blade.php ENDPATH**/ ?>