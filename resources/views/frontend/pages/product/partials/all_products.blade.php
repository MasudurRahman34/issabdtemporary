<div class="row">

  @foreach ($group_disc_product as $group_disc_product)

    <div class="col-md-3">
      <div class="card">
        {{-- <img class="card-img-top feature-img" src="{{ asset('images/products/'. 'galaxy.png') }}" alt="Card image" > --}}
        @php $i = 1; @endphp

        @foreach ($group_disc_product->Product->images as $image)
          @if ($i > 0)
              <a href="{!! route('products.show', $group_disc_product->Product->slug) !!}">
                <img class="card-img-top feature-img" src="{{ asset('images/products/'. $image->image) }}" alt="{{ $group_disc_product->Product->title }}">
              </a>
          @endif

          @php $i--; @endphp
        @endforeach

        <div class="card-body">
          <h6 class="card-title">
            <a class="link-color" style="line-height: 1.7rem" href="{!! route('products.show', $group_disc_product->Product->slug) !!}">{{ $group_disc_product->Product->title }}</a>
          </h6>
          <p class="card-text fw-bolder"><span style="font-size:1rem; font-weight: bold; color:black;">Tk- {{ $group_disc_product->product_price-$group_disc_product->discount}} </span>  <s style="color: red">{{ $group_disc_product->product_price}}</s>({{$group_disc_product->Units->name}})</p> 
           @include('frontend.pages.product.partials.group_discount_cart-button')
        </div>
      </div>
    </div>

  @endforeach

</div>
<div class="mt-4 pagination">
  {{-- {{ dd($group_disc_product->links) }} --}}
</div>
