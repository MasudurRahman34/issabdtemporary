<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
  use SoftDeletes;
  public $fillable = [
    'event_product_id',
    'user_id',
    'ip_address',
    'order_id',
    'product_quantity',
    'price_after_discount',
    'deliver_status',
    'order_status',
    'deleted_at'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }

  // public function product()
  // {
  //   return $this->belongsTo(Product::class);
  // }
  public function EventProducts()
  {
    return $this->belongsTo(EventProducts::class, 'event_product_id');
  }


  /**
   * total carts
   * @return integer total cart model
   */
  public static function totalCarts()
  {
    if (Auth::check()) {
      $carts = Cart::where('user_id', Auth::id())
        ->orWhere('ip_address', request()->ip())
        ->where('order_id', NULL)
        ->get();
    } else {
      $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
    }
    return $carts;
  }

  /**
   * total Items in the cart
   * @return integer total item
   */
  public static function totalItems()
  {
    $carts = Cart::totalCarts();

    $total_item = 0;

    foreach ($carts as $cart) {
      $total_item += $cart->product_quantity;
    }
    return $total_item;
  }
}
