<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    
    
    <a class="navbar-brand theme-bg-color p-2 text-light rounded-1" href="<?php echo e(route('index')); ?>">
      ISSHABD.COM
      
    </a>
    
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item nav-link">Call For Order 01609150700</li>
        
        
        
        
        

      </ul>
    </div>
      <ul class="navbar-nav ml-auto">
        <li>
          <a class="nav-link btn-cart-nav" href="<?php echo e(route('carts')); ?>">
  
            <button class="btn btn-outline-success">
              <span class="mt-1">Cart</span>
              <span class="badge badge-warning" id="totalItems" style="font-size: 1rem;">
                <?php echo e(App\Models\Cart::totalItems()); ?>

              </span>
            </button>
  
          </a>
        </li>
      </ul>
</div>
</nav>
<!-- End Navbar Part -->
<?php /**PATH C:\laragon\www\issabd\resources\views/frontend/partials/nav.blade.php ENDPATH**/ ?>