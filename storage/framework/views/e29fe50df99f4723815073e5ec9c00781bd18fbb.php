<script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/popper.min.js')); ?>" ></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>


<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	function addToCart(event_product_id,price_after_discount){
		console.log(price_after_discount);
		var url = "<?php echo e(url('/')); ?>";
		$.post( url+"/api/carts/store", 
			{ 
				event_product_id: event_product_id,
				price_after_discount: price_after_discount
			})
		  .done(function( data ) {
		  	data = JSON.parse(data);
		    if(data.status == 'success'){
		    	// toast
		    	alertify.set('notifier','position', 'top-center');
				alertify.success('<p style="color:white;">Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="<?php echo e(route('carts')); ?>">go to checkout page</a><p>');
  
		    	$("#totalItems").html(data.totalItems);
		    }
		  });
	}
</script>
<?php /**PATH C:\laragon\www\issabd\resources\views/frontend/partials/scripts.blade.php ENDPATH**/ ?>