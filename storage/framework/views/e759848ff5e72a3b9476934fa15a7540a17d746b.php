<?php $__env->startSection('content'); ?>
  <div class='container margin-top-20 mb-3'>
    <div class="card card-body">
      <h2>Confirm Items</h2>
      <hr>
      <div class="row">
        <div class="col-md-7 border-right">
          <?php $__currentLoopData = App\Models\Cart::totalCarts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>
              <?php echo e($cart->EventProducts->Product->title); ?> -
              <strong><?php echo e($cart->price_after_discount); ?> taka </strong>
              - <?php echo e($cart->product_quantity); ?> item
            </p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-md-5">
          <?php
          $total_price = 0;
          ?>
          <?php $__currentLoopData = App\Models\Cart::totalCarts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $total_price += $cart->price_after_discount * $cart->product_quantity;
            ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <p>Total Price : <strong><?php echo e($total_price); ?></strong> Taka</p>
          <p>Total Price with shipping cost: <strong><?php echo e($total_price); ?></strong> Taka</p>
        </div>
      </div>
      <p>
        <a href="<?php echo e(route('carts')); ?>">অর্ডার পরিবর্তন করুন </a>
      </p>
    </div>
    <div class="card card-body mt-2 mb-4">
      <h5>Shipping Address (প্রেরণের ঠিকানা)</h5>

      <form method="POST" action="<?php echo e(route('checkouts.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">Reciever Name <span class="text-danger">*</span></label>

          <div class="col-md-6">
            <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : ''); ?>" required autofocus placeholder="প্রাপকের নাম">

            <?php if($errors->has('name')): ?>
              <span class="invalid-feedback">
                <strong><?php echo e($errors->first('name')); ?></strong>
              </span>
            <?php endif; ?>
          </div>
        </div>


     

        <div class="form-group row">
          <label for="phone_no" class="col-md-4 col-form-label text-md-right">Phone No <span class="text-danger">*</span></label>

          <div class="col-md-6">
            <input id="phone_no" type="text" class="form-control<?php echo e($errors->has('phone_no') ? ' is-invalid' : ''); ?>" name="phone_no" value="<?php echo e(Auth::check() ? Auth::user()->phone_no : ''); ?>" required placeholder="মোবাইল নম্বর">

            <?php if($errors->has('phone_no')): ?>
              <span class="invalid-feedback">
                <strong><?php echo e($errors->first('phone_no')); ?></strong>
              </span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="shipping_address" class="col-md-4 col-form-label text-md-right">Shipping Address(প্রেরণের ঠিকানা) <span class="text-danger">*</span></label>

          <div class="col-md-6">
            <textarea id="shipping_address" class="form-control<?php echo e($errors->has('shipping_address') ? ' is-invalid' : ''); ?>" rows="2" name="shipping_address" placeholder="Sharoskati Bazar / সরসকাটি ,সরসকাটি বাজার"></textarea>

            <?php if($errors->has('message')): ?>
              <span class="invalid-feedback">
                <strong><?php echo e($errors->first('shipping_address')); ?></strong>
              </span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="payment_type" class="col-md-4 col-form-label text-md-right">payment method (টাকা প্রদান পদ্ধতি) <span class="text-danger">*</span></label>

          <div class="col-md-6">
            <select class="form-control" name="payment_type" id="payment_type" required>
              <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($payment->name); ?>"><?php echo e($payment->name); ?> (<?php echo e($payment->short_name); ?>)</option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
          </div>
        </div>
        <div class="form-group row transaction_section hidden">
          <label for="transaction_id" class="col-md-4 col-form-label text-md-right">Transaction Id <span class="text-danger">*</span></label>

          <div class="col-md-6">
            <input id="transaction_id" type="text" class="form-control<?php echo e($errors->has('transaction_id') ? ' is-invalid' : ''); ?>" name="transaction_id" value="" placeholder="ট্রান্সজেকশন নম্বর">
            <?php if($errors->has('phone_no')): ?>
              <span class="invalid-feedback">
                <strong><?php echo e($errors->first('transaction_id')); ?></strong>
              </span>
            <?php endif; ?>
            <span class="">বিকাশ , নগদ -> সেন্ড মানি -> 01609150700</span>
          </div>
           
        </div>

        <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-success">
              অর্ডার করুন
            </button>
          </div>
        </div>

      </div>


    </form>

  </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script type="text/javascript">
  $("#payment_type").change(function(){
    $payment_method = $("#payment_type").val();
    console.log($payment_method);

    if ($payment_method == "cash on delivery(COD)") {
      $(".transaction_section").addClass('hidden');
      $("#transaction_id").addClass('hidden');
    }else if (($payment_method == "bkash" || $payment_method == "nagad" || $payment_method == "rocket")) {
      $(".transaction_section").removeClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }
  });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\issabd\resources\views/frontend/pages/checkouts.blade.php ENDPATH**/ ?>