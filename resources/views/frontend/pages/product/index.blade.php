@extends('frontend.layouts.master')

@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-4">


        @include('frontend.partials.product-sidebar')

      </div>

      <div class="col-md-8">
        <div class="widget">
          <h3> All Product</h3>
          {{-- <h2 id="timer"></h3> --}}
          @include('frontend.pages.product.partials.all_products')
        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>
  <!-- End Sidebar + Content -->
@endsection
@section('scripts')
  <script>
    // Set the date we're counting down to
                var countDownDate = new Date().setTime(1659408825881);
                //endDate_Time=new Date().toDateString()";
                //endDate_Time=new Date().toDateString()";
                countDownDate = new Date(endDate_Time).getTime();
               // var end_time= "";
                //console.log(endDate_Time);

                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();
                    
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                    
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                // Output the result in an element with id="demo"
                document.getElementById("timer").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
                    
                // If the count down is over, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    // document.getElementById("submit").click();
                    // document.getElementById("expir").innerHTML = "EXPIRED";
                }
                }, 1000);
        
  </script>
@endsection