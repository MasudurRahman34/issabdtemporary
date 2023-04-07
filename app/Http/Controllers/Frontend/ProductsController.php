<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Product;
use App\Models\EventProducts;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
  public function index()
  {
      // $products=DB::table('event_products')
      // ->join('products', 'event_products.product_id', '=', 'products.id')
      // ->join('product_images', 'product_images.product_id','=','products.id' )
      // ->select('*')
      // ->get();
      // $EventProducts=EventProducts::with('Product')->get();
      $products=Product::with('EventProducts')->paginate(15);
      return view('frontend.pages.product.index')->with('products', $products);
  }
  public function show($slug)
  {
      $product = Product::where('slug', $slug)->first();
      if (!is_null($product)) {
        return view('frontend.pages.product.show', compact('product'));
      }else {
        session()->flash('errors', 'Sorry !! There is no product by this URL..');
        return redirect()->route('products');
      }
  }
  public function groupDiscProduct($id){
    $group_disc_product=EventProducts::with('Units')->with('Product')->where('offer_type',$id)->where('is_active',1)->get();
    
    return view('frontend.pages.product.group_disc_product')->with('group_disc_product', $group_disc_product);
  }
}
