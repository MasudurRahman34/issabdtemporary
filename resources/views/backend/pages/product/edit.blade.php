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
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            Edit Product
          </div>
          <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @include('backend.partials.messages')
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->title }}" >
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" rows="8" cols="80" class="form-control">{{ $product->description }}</textarea>

              </div>
              
              
              <div class="form-group">
                <label for="exampleInputEmail1">Select Category</label>
                <select class="form-control" name="category_id">
                  <option value="">Please select a category for the product</option>
                  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                    <option value="{{ $parent->id }}" {{ $parent->id == $product->category->id ? 'selected': '' }}>{{ $parent->name }}</option>

                    @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                      <option value="{{ $child->id }}"  {{ $child->id == $product->category->id ? 'selected': '' }}>{{ $child->name }}</option>

                    @endforeach

                  @endforeach
                </select>
              </div>
             
              <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            update Product Image
          </div>
        </div>
        <div class="card-body">
          <form action="">
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Image</button>
          </form>
        </div>
        
      </div>
      <div class="col-md-12">
          <div class="table-responsive">
        <table class="table table-hover table-striped"  id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              {{-- <th>Product Title</th> --}}
              <th>Active status</th>
              <th>offer type</th>
              <th>price</th>
              <th>unit</th>
              <th>discount</th>
              <th>target_quantity</th>
              <th>end date</th>
              <th>deliver date</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product->EventProducts as $event)
            <tr>
              <td>#</td>
              <td>{{ $event->is_active==1 ?'True':'False'  }}</td>
              <td>{{ $event->offer_type}}</td>
              <td>{{ $event->product_price }}</td>
              <td>{{ $event->Units->name }}</td>
              <td>{{ $event->discount }}</td>
              <td>{{ $event->target_quantity }}</td>
              <td>{{ $event->end_date }}</td>
              <td>{{ $event->delivery_date }}</td>
              <td>
                <a href="{{ route('admin.event.product.edit', $event->id) }}" class="badge bg-success btn-sm text-light">Edit</a>
                <a href="#deleteModal{{ $event->id }}" data-toggle="modal" class="badge bg-danger btn-sm text-light">Delete</a>
              </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Product Published To
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.event.product.store', $product->id) }}" method="POST">
            @csrf
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Offer Type</label>
                    <select name="offer_type" id="offer_type" class="form-select" id="inputGroupSelect01">
                      <option value=0>None</option>
                      <option value=1>Group Discount</option>
                      <option value=2>Daily discount</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">target_quantity</span>
                    <input type="number" class="form-control" name="target_quantity" id="target_quantity" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    <input type="number" class="form-control" value="0" name="product_price" id="product_price" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Unit</label>
                    <select name="unit_id" id="unit_id" class="form-select" id="inputGroupSelect01">
                      @foreach ($units as $unit)
                      <option value="{{$unit->uom}}">{{$unit->name}}</option> 
                      @endforeach
                      
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Discount</span>
                    <input type="number" class="form-control" name="discount" id="discount" value="0" min="0" max="100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Price after Discount</span>
                    <input type="number" class="form-control" name="price_after_discount" id="price_after_discount" min="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Start Date</span>
                    <input type="datetime-local" value="{{now()}}" class="form-control" name="start_date" id="start_date"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                    <input type="datetime-local" class="form-control" name="end_date" id="end_date" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Deliver Date</span>
                    <input type="datetime-local" class="form-control" name="deliver_date" id="deliver_date"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Active status</label>
                    <select name="is_active" id="is_active" class="form-select" id="inputGroupSelect01">
                      <option value="1">True</option>
                      <option value="0">False</option>
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