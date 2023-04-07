<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\EventProducts;
use App\Models\Order;
use App\Models\Slider;

class PagesController extends Controller
{
  public function index()
  {
    $sliders = Slider::orderBy('priority', 'asc')->get();
    $products = Product::orderBy('id', 'desc')->paginate(9);
    $group_disc_product = EventProducts::with('Units')->with('Product')->where('is_active', 1)->get();
    //return view('frontend.pages.index', compact('products', 'sliders'));
    return view('frontend.pages.index', compact('group_disc_product', 'sliders'));


    //return view('frontend.pages.product.group_disc_product')->with('group_disc_product', $group_disc_product);
  }


  public function contact()
  {
    return view('frontend.pages.contact');
  }

  public function orderSearch(Request $request)
  {
    $order = Order::where('order_gen_id', $request->order_id)->first();
    return response()->json($order);
  }

  public function search(Request $request)
  {
    $search = $request->search;

    $products = Product::orWhere('title', 'like', '%' . $search . '%')
      ->orWhere('description', 'like', '%' . $search . '%')
      ->orWhere('slug', 'like', '%' . $search . '%')
      ->orWhere('price', 'like', '%' . $search . '%')
      ->orWhere('quantity', 'like', '%' . $search . '%')
      ->orderBy('id', 'desc')
      ->paginate(9);

    return view('frontend.pages.product.search', compact('search', 'products'));
  }
}
