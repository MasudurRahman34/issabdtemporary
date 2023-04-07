<div class="row">

  <?php $__currentLoopData = $group_disc_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_disc_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="col-md-3">
      <div class="card">
        
        <?php $i = 1; ?>

        <?php $__currentLoopData = $group_disc_product->Product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($i > 0): ?>
              <a href="<?php echo route('products.show', $group_disc_product->Product->slug); ?>">
                <img class="card-img-top feature-img" src="<?php echo e(asset('images/products/'. $image->image)); ?>" alt="<?php echo e($group_disc_product->Product->title); ?>">
              </a>
          <?php endif; ?>

          <?php $i--; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="card-body">
          <h6 class="card-title">
            <a class="link-color" style="line-height: 1.7rem" href="<?php echo route('products.show', $group_disc_product->Product->slug); ?>"><?php echo e($group_disc_product->Product->title); ?></a>
          </h6>
          <p class="card-text fw-bolder"><span style="font-size:1rem; font-weight: bold; color:black;">Tk- <?php echo e($group_disc_product->product_price-$group_disc_product->discount); ?> </span>  <s style="color: red"><?php echo e($group_disc_product->product_price); ?></s>(<?php echo e($group_disc_product->Units->name); ?>)</p> 
           <?php echo $__env->make('frontend.pages.product.partials.group_discount_cart-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<div class="mt-4 pagination">
  
</div>
<?php /**PATH C:\laragon\www\issabd\resources\views/frontend/pages/product/partials/all_products.blade.php ENDPATH**/ ?>