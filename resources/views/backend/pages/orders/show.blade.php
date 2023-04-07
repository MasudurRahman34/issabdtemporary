@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Order No =  {{ $order->order_gen_id }}
      </div>
      <div class="card-body">
        @include('backend.partials.messages')
        <h3>Order Infomations</h3>
        <div class="row">
          <div class="col-md-6 border-right">
            <p><strong>Orderer Name : </strong>{{ $order->name }}</p>
            <p><strong>Orderer Phone : </strong>{{ $order->phone_no }}</p>
            <p><strong>Orderer Email : </strong>{{ $order->email }}</p>
            <p><strong>Orderer Shipping Address : </strong>{{ $order->shipping_address }}</p>
            <p><strong>Confirm Status : </strong>{{ $order->is_confirm ==1 ? "গ্রহণ করা হয়েছে" : "গ্রহণ করা হয়নি" }} 
              <form action="{{ route('admin.order.confirm', $order->id) }}" class="form-inline" style="display: inline-block!important;" method="post">
                  @csrf
                  <input type="hidden" id="confirm_order_amount" name="confirm_order_amount" value="0">
                  @if ($order->is_confirm)
                  <input type="submit" value="অর্ডার বাতিল করুন" class="btn btn-danger">
                  @else
                  <input type="submit" value="অর্ডার গ্রহণ করুন" class="btn btn-success">
                  @endif
              </form>
            </p>
            <p><strong>Paid Status : </strong>{{ $order->paid ==1 ? "পরিশোধ করা হয়েছে" : "পরিশোধ হয়নি " }}
            <form action="{{ route('admin.order.paid', $order->id) }}" class="form-inline" style="display: inline-block!important;" method="post">
                @csrf
                <input type="hidden" id="order_amount" name="order_amount" value="0">
                @if ($order->is_paid)
                <input type="submit" value="পেমেন্ট বাতিল করুন " class="btn btn-danger btn-sm">
                @else
                <input type="submit" value="পরিশোধ করুন" class="btn btn-success btn-sm">
                @endif
              </form>
            
            </p>

          </div>
          <div class="col-md-6">
            
            {{-- <p><strong>Order Payment Method: </strong> {{ $order->payment->name }}</p>
            <p><strong>Order Payment Transaction: </strong> {{ $order->transaction_id }}</p> --}}
          </div>
          <div class="col-md-12 text-right">
            <a href="{{ route('admin.order.invoice', $order->id) }}" class=" ml-2 btn btn-info">প্রিন্ট </a>
          </div>
        </div>
        <hr>
        <h3>Ordered Items: </h3>

        @if ($order->carts->count() > 0)
        <div class="table-responsive">
        <table class="table table-bordered table-stripe">
          <thead>
            <tr>
              <th>No.</th>
              <th>Product Title</th>
              <th>Product Image</th>
              <th>Product Quantity</th>
              <th>Unit Price</th>
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
            @foreach ($order->carts as $cart)
            <tr>
              <td>
                {{ $loop->index + 1 }}
              </td>
              <td>
                <a href="{{ route('products.show', $cart->EventProducts->Product->slug) }}">{{ $cart->EventProducts->Product->title }}</a>
              </td>
              <td>
                @if ($cart->EventProducts->Product->images->count() > 0)
          
                <img src="{{ asset('images/products/'. $cart->EventProducts->Product->images->first()->image) }}" width="60px">
                @endif
              </td>
              <td>
                <form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
                  @csrf
                  <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
                  <button type="submit" class="btn btn-success ml-1 btn-sm">পরিবর্তন করুন</button>
                </form>
              </td>
              <td>
                {{ $cart->price_after_discount }} Taka
              </td>
              <td>
                @php
                $total_price += $cart->price_after_discount * $cart->product_quantity;
                @endphp

                {{ $cart->price_after_discount * $cart->product_quantity }} Taka
              </td>
              <td>

                <div class="modal fade" id="deleteModal{{ $cart->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('carts.delete', $cart->id) }}"  method="post">
                          @csrf
                  <input type="hidden" name="cart_id" />
                          <button type="submit" class="btn btn-danger">Permanent Delete</button>
                        </form>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#deleteModal{{ $cart->id }}" data-bs-toggle="modal" class="btn btn-danger">Delete</a>
                {{-- <form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
                  @csrf
                  <input type="hidden" name="cart_id" />
                  <button type="submit" class="badge badge-danger">Delete</button>
                </form> --}}
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
                <input type="hidden" id="total_item_amount" value="{{ $total_price }}">
              </td>
            </tr>
          </tbody>
        </table>
        </div>
        @endif
        
        <hr>

        <div class="row">
           <div class="col-md-6">
              
            </div>
          <div class="col-md-6">
                    <form action="{{ route('admin.order.charge', $order->id) }}" class="" method="post">
                    @csrf
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label">Shipping Cost</label>
                          <div class="col-sm-8">
                          <input type="number" name="shipping_charge" id="shipping_charge" value="{{ $order->shipping_charge }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-4 col-form-label">Custom Discount</label>
                          <div class="col-sm-8">
                          <input type="number" name="custom_discount" id="custom_discount"  value="{{ $order->custom_discount }}">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-4 col-form-label">সর্বমোট </label>
                          <div class="col-sm-8">
                          <input type="number" name="total_order" id="total_order"  value="0" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-8 float-right">
                            <input type="submit" value="পরিবর্তন করুন" class="btn btn-success btn-sm float-right">
                          <div>
                        <div>
                    {{-- <label for="">Shipping Cost</label>
                    <input type="number" name="shipping_charge" id="shipping_charge" value="{{ $order->shipping_charge }}">
                    <br>

                    <label for="">Custom Discount</label>

                    <input type="number" name="custom_discount" id="custom_discount"  value="{{ $order->custom_discount }}">
                    <br> --}}

                   
                   
                  </form>
            </div>

           
        </div>
        
        
       
        <hr>

        


        

      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->
@section('scripts')
<script>
  $(document).ready(function () {
   var total_item_amount=Number($('#total_item_amount').val());
    $('#order_amount').val(total_item_amount);
    $('#confirm_order_amount').val(total_item_amount);
    var shipping_charge=Number($('#shipping_charge').val());
    var custom_discount=Number($('#custom_discount').val());
  var total_order_amount=(total_item_amount+shipping_charge)-custom_discount;
      $('#total_order').val(total_order_amount);
      $('#shipping_charge, #custom_discount').keyup(function (e) { 
         var shipping_charge=Number($('#shipping_charge').val());
    var custom_discount=Number($('#custom_discount').val());
  var total_order_amount=(total_item_amount+shipping_charge)-custom_discount;
      $('#total_order').val(total_order_amount);
      });

  });
</script>
@endsection
@endsection
