<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use PDF;

class OrdersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    $orders = Order::orderBy('id', 'desc')->get();
    return view('backend.pages.orders.index', compact('orders'));
  }

  public function show($id)
  {
    $order = Order::find($id);
    $order->is_seen_by_admin = 1;
    $order->save();

    return view('backend.pages.orders.show')->with('order', $order);
  }

  public function confirm(Request $request, $id)
  {
    $order = Order::find($id);
    if ($order->is_confirm) {
      $order->is_confirm = 0;
      $order->is_paid = 0;
      $order->order_amount = 0;
    } else {
      $order->is_paid = 0;
      $order->is_confirm = 1;
      $order->order_amount = ($request->confirm_order_amount + $order->shipping_charge) - $order->custom_discount;
    }

    $order->save();
    session()->flash('success', 'Order completed status changed ..!');
    return back();
  }

  public function chargeUpdate(Request $request, $id)
  {
    $order = Order::find($id);

    $order->shipping_charge = $request->shipping_charge;
    $order->custom_discount = $request->custom_discount;
    $order->is_confirm = 0;
    $order->is_paid = 0;
    $order->save();
    session()->flash('success', 'Order charge and discount has changed ..!');
    return back();
  }

  /**
   * generate Invoice
   * 
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function generateInvoice($id)
  {
    $order = Order::find($id);

    //return view('backend.pages.orders.invoice', compact('order'));

    $pdf = PDF::loadView('backend.pages.orders.invoice', compact('order'));

    return $pdf->stream('invoice.pdf');
    //return $pdf->download('invoice.pdf');
  }

  public function paid(Request $request, $id)
  {

    $order = Order::find($id);
    if ($order->is_paid) {
      $order->is_paid = 0;
      $order->order_amount = 0;
      $order->is_confirm = 0;
    } else {
      $order->is_paid = 1;
      $order->is_confirm = 1;
      $order->order_amount = ($request->order_amount + $order->shipping_charge) - $order->custom_discount;
    }
    $order->save();
    session()->flash('success', 'Order paid status changed ..!');
    return back();
  }
}
