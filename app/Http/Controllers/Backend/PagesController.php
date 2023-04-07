<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Image;

class PagesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    $report = [];
    $report['todayOrder'] = Order::whereDate('created_at', Carbon::today())->count();

    $report['todayConfirm'] = Order::whereDate('created_at', Carbon::today())->where('is_confirm', 1)->count();
    $report['todayNotConfirm'] = Order::whereDate('created_at', Carbon::today())->where('is_confirm', 0)->count();
    $report['todayIncome'] = Order::whereDate('created_at', Carbon::today())->where('is_paid', 1)->sum('order_amount');
    $report['todayPayable'] = Order::whereDate('created_at', Carbon::today())->where('is_confirm', 1)->where('is_paid', 0)->sum('order_amount');


    $report['totalOrder'] = Order::count();
    $report['totalIncome'] = Order::where('is_paid', 1)->sum('order_amount');
    $report['totalPayable'] = Order::where('is_confirm', 1)->where('is_paid', 0)->sum('order_amount');
    //return $report;

    return view('backend.pages.index')->with(["report" => $report]);
  }
}
