@extends('frontend.layouts.master')

@section('content')
  <!-- Start Sidebar + Content -->
<style>
   /* @media (max-width: 767px) {
        .our-slider {
          display: none;
        }
      } */
</style>
  
  <div class="our-slider d-flex justify-content-center" style="background-color: rgb(209, 253, 229); margin-top:50px;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">

            @foreach ($sliders as $slider)
             <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index}}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
            @endforeach

          </ol>
          <div class="carousel-inner">

            @foreach ($sliders as $slider)
              <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                <img class="d-block img-fluid rounded" alt="Responsive image" src="{{ asset('images/sliders/'.$slider->image) }}" alt="{{ $slider->title }}"/>

                <div class="carousel-caption d-none d-md-block">
                  {{-- <h5>{{ $slider->title }}</h5> --}}
                  
                  @if ($slider->button_text)
                    <p>
                      <a href="{{ $slider->button_link }}" target="_blank" class="btn btn-danger">{{ $slider->button_text }}</a>
                    </p>
                  @endif

                </div>
            </div>
            @endforeach
            

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>

  <div class='container-fluid margin-top-20' style="margin-top: 100px">
    <div class="row">
      <div class="col-md-3"> @include('frontend.partials.product-sidebar')</div>
      {{-- <div class="col-md-9 col-sm-12">
       <div class="row">
        <div class="col-md-6">
              <form class="form-inline" style="">
              <input class="form-control mr-sm-2 input-lg" type="search" placeholder="প্রোডাক্ট সার্চ " aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">প্রোডাক্ট সার্চ </button>
            </form>
        </div>
        <div class="col-md-6">
              <form class="form-inline" style="">
              <input class="form-control mr-sm-2 input-lg" type="search" placeholder="অর্ডার সার্চ" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">অর্ডার সার্চ</button>
            </form>
        </div>
       </div>
          
      </div> --}}
      {{-- <div class="col-md-3">
       
      </div> --}}

      <div class="col-md-9" style="">
        <div class="widget">
          <h3>All Products</h3>
          @include('frontend.pages.product.partials.all_products')
        </div>
        <div class="widget">
        </div>
      </div>
    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection
