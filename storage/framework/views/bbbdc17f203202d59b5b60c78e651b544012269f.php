<?php $__env->startSection('title'); ?>
  <?php echo e($product->title); ?> | Laravel Ecommerce Site
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <!-- Start Sidebar + Content -->
  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-4">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php $i = 1; ?>
            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="product-item carousel-item <?php echo e($i == 1 ? 'active':''); ?>">
                <img class="d-block w-100" src="<?php echo asset('images/products/'.$image->image); ?>" alt="First slide">
              </div>
              <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="mt-3">
          <p>Category <span class="badge badge-info"><?php echo e($product->category->name); ?></span></p>
        </div>

      </div>

      <div class="col-md-8">
        <div class="widget">
          <h3> <?php echo e($product->title); ?></h3>
            
          </h3>
          <hr>

          <div class="product-description">
            <?php echo $product->description; ?>

          </div>
        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>

  <!-- End Sidebar + Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\issabd\resources\views/frontend/pages/product/show.blade.php ENDPATH**/ ?>