<form class="form-inline" action="<?php echo e(route('carts.store')); ?>" method="post">
  <?php echo csrf_field(); ?>
  <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
  <button type="button" class="btn btn-success" onclick="addToCart(<?php echo e($product->id); ?>)"><i class="fa fa-plus"></i> Add to cart</button>
  <p id='timer'></p>
</form>
<?php /**PATH C:\laragon\www\issabd\resources\views/frontend/pages/product/partials/cart-button.blade.php ENDPATH**/ ?>