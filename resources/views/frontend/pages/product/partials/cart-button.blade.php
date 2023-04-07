<form class="form-inline" action="{{ route('carts.store') }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <button type="button" class="btn btn-success" onclick="addToCart({{ $product->id }})"><i class="fa fa-plus"></i> Add to cart</button>
  <p id='timer'></p>
</form>