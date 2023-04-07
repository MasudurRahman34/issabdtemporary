@extends('frontend.layouts.master')

@section('content')
@if (count($carts) > 0)
    

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
          @php
          $total_price = 0;
          @endphp
          @foreach ($carts as $cart)
          
            <tr>
              <td>
                {{ $loop->index + 1 }}
                {{$cart->EventProducts->product_price}}
              </td>
              <td>
                <a href="{{ route('products.show', $cart->EventProducts->Product->slug) }}">{{ $cart->EventProducts->Product->title }}</a>
              
              </td>
              <td>
                @foreach($cart->EventProducts->Product->images as $image)
                  <img src="{{ asset('images/products/'. $image->image) }}" width="60px">
                @endforeach;
              </td>
              <td>
                <form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
                  @csrf
                  <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
                  <button type="submit" class="badge badge-success border-success">Update</button>
                </form>
              </td>
              <td>
                {{ $cart->price_after_discount}} Taka
              </td>
              <td>
                @php
                $total_price += $cart->price_after_discount * $cart->product_quantity;
                @endphp

                {{ $cart->price_after_discount * $cart->product_quantity }} Taka
              </td>
              <td>
                <form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="cart_id" />
                  <button type="submit" class="badge badge-danger border-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
          <tr>
            <td colspan="4"></td>
            <td>
              Total Amount:
            </td>
            <td colspan="2">
              <strong>  {{ $total_price }} Taka</strong>
            </td>
          </tr>
        </tbody>
      </table>
      </div>

      <div class="float-right">
        <a href="{{route('products.group.discount',[1])}}" class="btn btn-success btn-sm">আরও কিনুন ..</a>
        <a href="{{ route('checkouts') }}" class="btn btn-warning btn-sm">কনফার্ম</a>
      </div>
      <div class="clearfix"></div>
      @else
      <div class="alert alert-warning">
        <strong>There is no item in your cart.</strong>
        <br>
        <a href="{{route('products.group.discount',[1])}}" class="btn btn-info btn-lg">আরও কিনুন ..<</a>
      </div>
      @endif
      
 
  </div>
@endsection
