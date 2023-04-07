<?php $__env->startSection('content'); ?>
  <!-- Start Sidebar + Content -->
<style>
   /* @media (max-width: 767px) {
        .our-slider {
          display: none;
        }
      } */
</style>
  
  <div class="our-slider d-flex justify-content-center" style="background-color: rgb(209, 253, 229); margin-top:50px;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">

            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($loop->index); ?>" class="<?php echo e($loop->index == 0 ? 'active' : ''); ?>"></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </ol>
          <div class="carousel-inner">

            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="carousel-item <?php echo e($loop->index == 0 ? 'active' : ''); ?>">
                <img class="d-block img-fluid rounded" alt="Responsive image" src="<?php echo e(asset('images/sliders/'.$slider->image)); ?>" alt="<?php echo e($slider->title); ?>"/>

                <div class="carousel-caption d-none d-md-block">
                  
                  
                  <?php if($slider->button_text): ?>
                    <p>
                      <a href="<?php echo e($slider->button_link); ?>" target="_blank" class="btn btn-danger"><?php echo e($slider->button_text); ?></a>
                    </p>
                  <?php endif; ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>

  <div class='container-fluid margin-top-20' style="margin-top: 100px">
    <div class="row">
      <div class="col-md-3"> <?php echo $__env->make('frontend.partials.product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
      
      

      <div class="col-md-9" style="">
        <div class="widget">
          <h3>All Products</h3>
          <?php echo $__env->make('frontend.pages.product.partials.all_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="widget">
        </div>
      </div>
    </div>
  </div>

  <!-- End Sidebar + Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\issabd\resources\views/frontend/pages/index.blade.php ENDPATH**/ ?>