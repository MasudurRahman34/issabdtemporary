@extends('frontend.layouts.master')

@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container-fluid margin-top-20'>
    <div class="row">
      <div class="col-md-3">

        @include('frontend.partials.product-sidebar')

      </div>

      <div class="col-md-9">
        
        <div class="widget">
          <h5 class="p-4"> All Products in <span class="border border-success p-2">{{ $category->name }} Category</span></h5>
          @php
          $products = $category->products()->paginate(9);
          @endphp

          @if ($products->count() > 0)
            @include('frontend.pages.product.partials.all_products')
          @else
            <div class="alert alert-warning">
              No Products has added yet in this category !!
            </div>
          @endif

        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection
