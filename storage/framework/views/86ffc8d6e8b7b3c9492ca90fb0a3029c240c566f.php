<html>
<head>
  <title>Invoice - <?php echo e($order->id); ?></title>

  <link rel="stylesheet" href="<?php echo e(asset('css/admin_style.css')); ?>">
  
  <style>
    body {
    font-family: 'AdorshoLipi', Arial, sans-serif !important;
}

  .content-wrapper{
    background: #FFF;
  }
  .invoice-header {
    background: #f7f7f7;
    padding: 10px 20px 10px 20px;
    border-bottom: 1px solid gray;
}
.invoice-right-top h3 {
    padding-right: 20px;
    margin-top: 20px;
    color: #ec5d01;
    font-size: 55px!important;
    font-family: serif;
}
.invoice-left-top {
    border-left: 4px solid #affce5;
    padding-left: 20px;
    padding-top: 20px;
}
thead {
        background: #affce5;
        /* color: #FFF; */
    }

    .authority h5 {
        margin-top: -10px;
        /* color:#affce5; */
        /*text-align: center;*/
    }
    .thanks h4 {
        /* color: #affce5; */
        font-size: 25px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
    .site-address p {
          line-height: 6px;
          font-weight: 300;
      }
      
</style>


</head>
<body>

  <div class="content-wrapper">

    <div class="invoice-header">
      <div class="float-left site-logo">
        
      </div>
      
      <div class="clearfix"></div>
    </div>

    <div class="invoice-description">
      <div class="invoice-left-top float-left">
        <h6>Invoice to</h6>
         <h5><?php echo e($order->name); ?></h5>
         <div class="address">
          
           <p>Phone: <?php echo e($order->phone_no); ?></p>
           
         </div>
      </div>
      <div class="invoice-right-top float-right">
        <div class=" site-address" style="margin-top:10px">
           <h4>From</h4>
        <p>Isshabd.com</p>
        <p>Sharoskati Bazar</p>
        <p>Phone: <a href="">01609150700</a></p>
        
      </div>
        <h4>Invoice #<?php echo e($order->id); ?></h4>
         <p>
           <?php echo e($order->created_at); ?>

         </p>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="">
    
        <h3>Products</h3>

        <?php if($order->carts->count() > 0): ?>
        <table class="table table-bordered table-stripe text-right">
          <thead>
            <tr>
              <th>No.</th>
              <th>Product Title</th>
              <th>Product Quantity</th>
              <th>Unit Price</th>
              <th>Sub total Price</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total_price = 0;
            ?>
            <?php $__currentLoopData = $order->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <?php echo e($loop->index + 1); ?>

              </td>
              <td>
                <a href="<?php echo e(route('products.show', $cart->EventProducts->Product->id)); ?>"><?php echo e($cart->EventProducts->Product->title); ?></a>
              </td>
              <td>
                <?php echo e($cart->product_quantity); ?>

              </td>
              <td>
                <?php echo e($cart->EventProducts->product_price- $cart->EventProducts->discount); ?> Taka
              </td>
              <td>
                <?php
                $total_price += ($cart->EventProducts->product_price- $cart->EventProducts->discount) * $cart->product_quantity;
                ?>

                <?php echo e(($cart->EventProducts->product_price- $cart->EventProducts->discount) * $cart->product_quantity); ?> Taka
              </td>
              
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <tr>
              <td colspan="3"></td>
              <td>
                Shipping Cost:
              </td>
              <td colspan="2">
                <strong>  (+)<?php echo e($order->shipping_charge); ?> Taka</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td>
                Discount:
              </td>
              <td colspan="2">
                <strong> (-) <?php echo e($order->custom_discount); ?> Taka</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td>
             Total Amount:
              </td>
              <td colspan="2">
                <hr style="background-color: black">
                <strong>  <?php echo e($total_price + $order->shipping_charge - $order->custom_discount); ?> Taka</strong>
              </td>
            </tr>
          </tbody>
        </table>
        <?php endif; ?>

        

        <div class="authority float-right mt-5">
            <p>-----------------------------------</p>
            <h5>Authority Signature:</h5>
          </div>
          <div class="clearfix"></div>

  </div>

</body>
</html><?php /**PATH C:\laragon\www\issabd\resources\views/backend/pages/orders/invoice.blade.php ENDPATH**/ ?>