
<div>
  <h5>Special Offers</h5>
  <ul class="list-group border-0">
    <li class="list-group-item border-0"><a class="link-color" href="{{route('products.group.discount',[1])}}">Group discount</a></li>
    <li class="list-group-item border-0"><a class="link-color" href="{{route('products.group.discount',[2])}}">Daily offer</a></li>
    <li class="list-group-item border-0"><a class="link-color" href="{{route('index')}}">ALL</a></li>
  </ul>
</div>
{{-- <div class="list-group m-2">
  <h5>Categories</h5>
  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
    <a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action" data-bs-toggle="collapse">
      <img src="{!! asset('images/categories/'.$parent->image) !!}" width="50">
      {{ $parent->name }}
    </a>
    <div class="collapse
      @if (Route::is('categories.show'))
        @if (App\Models\Category::ParentOrNotCategory($parent->id, $category->id))
          show
        @endif
      @endif
    " id="main-{{ $parent->id }}">
      <div class="child-rows">
        @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
          <a href="{!! route('categories.show', $child->id) !!}" class="list-group-item list-group-item-action bg-success">
            @if (Route::is('categories.show'))
              @if ($child->id == $category->id)
                active
              @endif
            @endif
            ">
            <img src="{!! asset('images/categories/'.$child->image) !!}" width="30">
            {{ $child->name }}
          </a>
        @endforeach
      </div>


    </div>
  @endforeach
</div> --}}
