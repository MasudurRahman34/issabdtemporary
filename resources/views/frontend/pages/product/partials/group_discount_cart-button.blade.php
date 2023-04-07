<form class="form-inline" action="{{ route('carts.store') }}" method="post">
    @csrf
    <input type="hidden" name="event_product_id" value="{{ $group_disc_product->id }}">
    <input type="hidden" name="price_after_discount" value="{{ $group_disc_product->product_price-$group_disc_product->discount}}">
    <button type="button" class="btn btn-outline-success btn-lg" id="disableTimerbutton{{isset($timer_id) ? $timer_id : '' }}" onclick="addToCart({{ $group_disc_product->id}}, {{$group_disc_product->product_price-$group_disc_product->discount}})"><i class="fa fa-plus"></i>কিনুন </button>
    <p id='timer'></p>
  </form>