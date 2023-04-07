<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CheckoutsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $payments = Payment::orderBy('priority', 'asc')->get();
    return view('frontend.pages.checkouts', compact('payments'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name'  => 'required',
      'phone_no'  => 'required',
    ]);

    $order = new Order();

    // check transaction ID has given or not
    // if ($request->payment_method_id != 'cash_in') {
    //   if ($request->transaction_id == NULL || empty($request->transaction_id)) {
    //     session()->flash('sticky_error', 'Please give transaction ID for your payment');
    //     return back();
    //   }
    // }
   

    $order->name = $request->name;
    $order->phone_no = $request->phone_no;
    $order->shipping_address = $request->shipping_address;
    $order->shipping_address = $request->shipping_address;
    $order->payment_type = $request->payment_type;
    $order->ip_address = request()->ip();
    $order->transaction_id = $request->transaction_id;
    
    if (Auth::guard('web')->check()) {
      $order->user_id = Auth::guard('user')->user()->id;
    }elseif(Auth::guard('admin')->check()){
      $order->admin_id = Auth::guard('admin')->user()->id;
    }
    $order->save();

    foreach (Cart::totalCarts() as $cart) {
      $cart->order_id = $order->id;
      $cart->save();
    }

    session()->flash('success', 'অর্ডার সম্পন্ন হয়েছে। অর্ডার নম্বরটি- '.$order->order_gen_id .' সংরক্ষণ করুন ; ধন্যবাদ !');
    return redirect()->route('index');
  }
}
