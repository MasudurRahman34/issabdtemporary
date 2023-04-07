@extends('backend.layouts.master')
<style>
  .input-group-text{
    font-size: .8rem !important;
  }
</style>
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
<div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            update event product <span class="bg-success">({{$eventProducts->Product->title}})</span>
          </div>
        </div>
        <div class="card-body">
          <form action="{{route('admin.event.product.update',$eventProducts->id)}}" method="POST">
            @csrf
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Offer Type</label>
                    <select name="offer_type" id="offer_type" class="form-select" id="inputGroupSelect01">
                      <option value='0' {{$eventProducts->offer_type==0 ? 'selected':''}}>None</option>
                      <option value='1' {{$eventProducts->offer_type==1 ?'selected' : ''}}>Group Discount</option>
                      <option value='2' {{$eventProducts->offer_type==2 ?'selected': ''}}>Daily discount</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">target_quantity</span>
                    <input type="number" value="{{$eventProducts->target_quantity}}" class="form-control" name="target_quantity" id="target_quantity" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    <input type="number" class="form-control" value="{{$eventProducts->product_price}}" name="product_price" id="product_price" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Unit</label>
                    <select name="unit_id" id="unit_id"  class="form-select" id="inputGroupSelect01">
                      @foreach ($units as $unit)
                      <option value="{{$unit->uom}}">{{$unit->name}}</option> 
                      @endforeach
                      
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Discount</span>
                    <input type="number" class="form-control"  name="discount" id="discount" value="{{$eventProducts->discount}}" min="0" max="100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Price after Discount</span>
                    <input type="number" class="form-control" value="" name="price_after_discount" id="price_after_discount" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Start Date</span>
                    <input type="datetime-local" value="{{$eventProducts->start_date}}" class="form-control" name="start_date" id="start_date"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                    <input type="datetime-local" class="form-control" value="{{$eventProducts->end_date}}" name="end_date" id="end_date"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Deliver Date</span>
                    <input type="datetime-local" class="form-control" value="{{$eventProducts->delivery_date}}" name="deliver_date" id="deliver_date"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Active status</label>
                    <select name="is_active" id="is_active" class="form-select" id="inputGroupSelect01">
                      <option value="1" {{$eventProducts->is_active == 1 ? 'selected':''}}>True</option>
                      <option value="0" {{$eventProducts->is_active == 0 ? 'selected':''}}>False</option>
                    </select>
                  </div>
                </div>
                
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Event Product</button>
          </form>
        </div>
      </div>
  </div>
</div>
</div>
  <!-- main-panel ends -->
@endsection
@section('scripts')
  <script>
     $("#product_price, #unit_id, #discount").on('focus change keydown keyup click',function(){
        var price_after_discount = (Number($("#product_price").val()) * Number($('#unit_id').val())) - Number($('#discount').val());
       $('#price_after_discount').val(price_after_discount);
    });
  </script>
@endsection