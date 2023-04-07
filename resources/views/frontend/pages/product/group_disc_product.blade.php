@extends('frontend.layouts.master')

@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container-fluid margin-top-20'>
    <div class="row">
      <div class="col-md-3 col-sm-12">
        @include('frontend.partials.product-sidebar')
      </div>
      <div class="col-md-9 col-sm-12">
        <div class="widget">
          
          @if (count($group_disc_product) > 0)
          <h3>Discount product</h3>
            <div class="row">
              @php $timer_id = 1; @endphp
                @foreach ($group_disc_product as $group_disc_product)
                    <input type="hidden" id="end_date{{$timer_id}}" value="{{$group_disc_product->end_date}}" name="end_date[]">
                  <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-md-4">
                               
                                @php $i = 1; @endphp
              
                                @foreach ($group_disc_product->Product->images as $image)
                                  @if ($i > 0)
                                      <a class="text-center" href="{!! route('products.show', $group_disc_product->Product->slug) !!}">
                                        <img class="img-fluid rounded-start m-4"  src="{{ asset('images/products/'. $image->image) }}" alt="{{ $group_disc_product->Product->title }}" >
                                      </a>
                                  @endif
                        
                                  @php $i--; @endphp
                                @endforeach
                            </div>
                      {{-- <img class="card-img-top feature-img" src="{{ asset('images/products/'. 'galaxy.png') }}" alt="Card image" > --}}
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">
                                      <a class="link-color" style="font-size:1rem" href="{!! route('products.show', $group_disc_product->Product->slug) !!}">{{ $group_disc_product->Product->title }}</a>
                                    </h6>
                                    <p class="card-text fw-bolder"><span style="font-size:1.5rem; font-weight: bold">Tk- {{ $group_disc_product->product_price-$group_disc_product->discount}}</span>  <s style="color: red">{{ $group_disc_product->product_price}}</s> ({{$group_disc_product->Units->name}})</p> 
                                    
                                    
                                      
                                    <div class="timer mt-3 mb-3">
                                        <h5 id="timer{{$timer_id}}" class="pr-3">
                                          <span class="p-2 theme-bg-color text-light fw-bolder mr-1 rounded-2" id="day{{$timer_id}}"></span>
                                          <span class="p-2 theme-bg-color text-light fw-bolder mr-1 rounded-2" id="hour{{$timer_id}}"></span>
                                          <span class="p-2 theme-bg-color text-light fw-bolder mr-1 rounded-2" id="minute{{$timer_id}}"></span>
                                          <span class="p-2 theme-bg-color text-light fw-bolder mr-1 rounded-2" id="sec{{$timer_id}}"></span>
                                        </h5>
                                      
                                        
                                    </div>
                                    <div class="progress  mt-3 mb-3 mr-3" style="height: 25px;">
                                      {{-- <div class="progress-bar progress-bar-striped" role="progressbar" style="background-color:gray"
                                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                        40% Complete (Required more)
                                      </div> --}}
                                    </div>
                                    <div class="">
                                      <p>সম্ভাব্য ডেলিভারি সময় {{date('d-M-Y', strtotime($group_disc_product->delivery_date))}};</p>
                                    </div>
                                    @include('frontend.pages.product.partials.group_discount_cart-button')
                                </div>
                            </div>
                        </div>
              
                      
                    </div>
                  </div>
                  @php $timer_id++ ; @endphp
                @endforeach
                
              
              </div>
              @else
              <h3>No product available</h3>
              @endif
      
             

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
@endsection