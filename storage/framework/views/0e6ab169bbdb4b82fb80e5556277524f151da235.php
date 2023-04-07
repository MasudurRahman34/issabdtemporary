<form class="form-inline" action="<?php echo e(route('carts.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="event_product_id" value="<?php echo e($group_disc_product->id); ?>">
    <input type="hidden" name="price_after_discount" value="<?php echo e($group_disc_product->product_price-$group_disc_product->discount); ?>">
    <button type="button" class="btn btn-outline-success btn-lg" id="disableTimerbutton<?php echo e(isset($timer_id) ? $timer_id : ''); ?>" onclick="addToCart(<?php echo e($group_disc_product->id); ?>, <?php echo e($group_disc_product->product_price-$group_disc_product->discount); ?>)"><i class="fa fa-plus"></i>কিনুন </button>
    <p id='timer'></p>
  </form><?php /**PATH C:\laragon\www\issabd\resources\views/frontend/pages/product/partials/group_discount_cart-button.blade.php ENDPATH**/ ?>