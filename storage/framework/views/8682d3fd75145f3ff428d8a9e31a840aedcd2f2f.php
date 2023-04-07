<?php $__env->startSection('content'); ?>
<?php if(count($carts) > 0): ?>
    

  <div class='container margin-top-20'>
    <h2>My Cart Items</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-stripe">
        <thead>
          <tr>
            <th>No.</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Quantity</th>
            <th>Unit Price After discount</th>
            <th>Sub total Price</th>
            <th>
              Delete
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total_price = 0;
          ?>
          <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
            <tr>
              <td>
                <?php echo e($loop->index + 1); ?>

                <?php echo e($cart->EventProducts->product_price); ?>

              </td>
              <td>
                <a href="<?php echo e(route('products.show', $cart->EventProducts->Product->slug)); ?>"><?php echo e($cart->EventProducts->Product->title); ?></a>
              
              </td>
              <td>
                <?php $__currentLoopData = $cart->EventProducts->Product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <img src="<?php echo e(asset('images/products/'. $image->image)); ?>" width="60px">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
              </td>
              <td>
                <form class="form-inline" action="<?php echo e(route('carts.update', $cart->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <input type="number" name="product_quantity" class="form-control" value="<?php echo e($cart->product_quantity); ?>"/>
                  <button type="submit" class="badge badge-success border-success">Update</button>
                </form>
              </td>
              <td>
                <?php echo e($cart->price_after_discount); ?> Taka
              </td>
              <td>
                <?php
                $total_price += $cart->price_after_discount * $cart->product_quantity;
                ?>

                <?php echo e($cart->price_after_discount * $cart->product_quantity); ?> Taka
              </td>
              <td>
                <form class="form-inline" action="<?php echo e(route('carts.delete', $cart->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="cart_id" />
                  <button type="submit" class="badge badge-danger border-danger">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td colspan="4"></td>
            <td>
              Total Amount:
            </td>
            <td colspan="2">
              <strong>  <?php echo e($total_price); ?> Taka</strong>
            </td>
          </tr>
        </tbody>
      </table>
      </div>

      <div class="float-right">
        <a href="<?php echo e(route('products.group.discount',[1])); ?>" class="btn btn-success btn-sm">আরও কিনুন ..</a>
        <a href="<?php echo e(route('checkouts')); ?>" class="btn btn-warning btn-sm">কনফার্ম</a>
      </div>
      <div class="clearfix"></div>
      <?php else: ?>
      <div class="alert alert-warning">
        <strong>There is no item in your cart.</strong>
        <br>
        <a href="<?php echo e(route('products.group.discount',[1])); ?>" class="btn btn-info btn-lg">আরও কিনুন ..<</a>
      </div>
      <?php endif; ?>
      
 
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\issabd\resources\views/frontend/pages/carts.blade.php ENDPATH**/ ?>