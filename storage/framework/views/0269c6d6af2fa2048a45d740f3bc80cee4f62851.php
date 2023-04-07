<?php $__env->startSection('content'); ?>

  <!-- Start Sidebar + Content -->
  <div class='container-fluid margin-top-20'>
    <div class="row">
      <div class="col-md-3 col-sm-12">
        <?php echo $__env->make('frontend.partials.product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <div class="col-md-9 col-sm-12">
        <div class="widget">
          
          <?php if(count($group_disc_product) > 0): ?>
          <h3>Discount product</h3>
            <div class="row">
              <?php $timer_id = 1; ?>
                <?php $__currentLoopData = $group_disc_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_disc_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" id="end_date<?php echo e($timer_id); ?>" value="<?php echo e($group_disc_product->end_date); ?>" name="end_date[]">
                  <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-md-4">
                               
                                <?php $i = 1; ?>
              
                                <?php $__currentLoopData = $group_disc_product->Product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($i > 0): ?>
                                      <a class="text-center" href="<?php echo route('products.show', $group_disc_product->Product->slug); ?>">
                                        <img class="img-fluid rounded-start m-4"  src="<?php echo e(asset('images/products/'. $image->image)); ?>" alt="<?php echo e($group_disc_product->Product->title); ?>" >
                                      </a>
                                  <?php endif; ?>
                        
                                  <?php $i--; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                      
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">
                                      <a class="link-color" style="font-size:1rem" href="<?php echo route('products.show', $group_disc_product->Product->slug); ?>"><?php echo e($group_disc_product->Product->title); ?></a>
                                    </h6>
                                    <p class="card-text fw-bolder"><span style="font-size:1.5rem; font-weight: bold">Tk- <?php echo e($group_disc_product->product_price-$group_disc_product->discount); ?></span>  <s style="color: red"><?php echo e($group_disc_product->product_price); ?></s> (<?php echo e($group_disc_product->Units->name); ?>)</p> 
                                    
                                    
                                      
                                    <div class="timer mt-3 mb-3">
                                        <h5 id="timer<?php echo e($timer_id); ?>" class="pr-3">
                                          <span class="p-2 theme-bg-color text-light fw-bolder mr-1 rounded-2" id="day<?php echo e($timer_id); ?>"></span>
                                          <span class="p-2 theme-bg-color text-light fw-bolder mr-1 rounded-2" id="hour<?php echo e($timer_id); ?>"></span>
                                          <span class="p-2 theme-bg-color text-light fw-bolder mr-1 rounded-2" id="minute<?php echo e($timer_id); ?>"></span>
                                          <span class="p-2 theme-bg-color text-light fw-bolder mr-1 rounded-2" id="sec<?php echo e($timer_id); ?>"></span>
                                        </h5>
                                      
                                        
                                    </div>
                                    <div class="progress  mt-3 mb-3 mr-3" style="height: 25px;">
                                      
                                    </div>
                                    <div class="">
                                      <p>সম্ভাব্য ডেলিভারি সময় <?php echo e(date('d-M-Y', strtotime($group_disc_product->delivery_date))); ?>;</p>
                                    </div>
                                    <?php echo $__env->make('frontend.pages.product.partials.group_discount_cart-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
              
                      
                    </div>
                  </div>
                  <?php $timer_id++ ; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              
              </div>
              <?php else: ?>
              <h3>No product available</h3>
              <?php endif; ?>
      
             

        </div>
       
        <div class="widget">

        </div>
      </div>


    </div>
  </div>
  <!-- End Sidebar + Content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script>
              var n = $("input[name^= 'end_date'").length;
              console.log(n);
              for (let i = 1; i < n+1; i++) {
                var end_date = $('#end_date'+i).val();
                timer(end_date,i);
              }
              function timer(end_date,i){
                var countDownDate =Date.parse(end_date);
                // Update the count down every 1 second
                var x = setInterval(function() {
                // Get today's date and time
                var now = Date.parse(new Date());
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                // Output the result in an element with id="demo"
                document.getElementById("day"+i).innerHTML = days + "d ";
                document.getElementById("hour"+i).innerHTML =  + hours + "h ";
                document.getElementById("minute"+i).innerHTML = minutes + "m ";
                document.getElementById("sec"+i).innerHTML =seconds + "s ";
                
                    
                // If the count down is over, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    // document.getElementById("submit").click();
                    document.getElementById("timer"+i).innerHTML = "EXPIRED";
                    document.getElementById("disableTimerbutton"+i).style.visibility='hidden';
                }
                }, 1000);
              }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\issabd\resources\views/frontend/pages/product/group_disc_product.blade.php ENDPATH**/ ?>