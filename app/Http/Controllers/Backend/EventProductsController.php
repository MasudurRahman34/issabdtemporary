<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\EventProducts;
use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class EventProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$product_id)
    {
        EventProducts::create(
            [
                'product_id'=>$product_id,
                'offer_type'=>$request->offer_type,
                'product_price'=>$request->product_price,
                'unit_id'=>$request->unit_id,
                'discount'=> $request->discount,
                'target_quantity'=> $request->target_quantity,
                'delivery_date'=>$request->deliver_date,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'is_active'=>$request->is_active,
                'admin_id'=>1
            
            ]
            );
            session()->flash('success', 'A new Event created successfully !!');
            return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventProducts  $eventProducts
     * @return \Illuminate\Http\Response
     */
    public function show(EventProducts $eventProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventProducts  $eventProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(EventProducts $eventProducts)
    {
        if (!is_null($eventProducts)) {
            $units=Units::get();
            return view('backend.pages.product.event.edit')->with('eventProducts',$eventProducts)->with('units',$units);
          }else {
            return Redirect::back();
          }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventProducts  $eventProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventProducts $eventProducts)
    {
        $eventProducts->offer_type=$request->offer_type;
        $eventProducts->product_price=$request->product_price;
                $eventProducts->unit_id=$request->unit_id;
                $eventProducts->discount= $request->discount;
                $eventProducts->target_quantity= $request->target_quantity;
                $eventProducts->delivery_date=$request->deliver_date;
                $eventProducts->start_date=$request->start_date;
                $eventProducts->end_date=$request->end_date;
                $eventProducts->is_active=$request->is_active;
                $eventProducts->admin_id= Auth::guard('admin')->user()->id;
                $eventProducts->save();
        
        session()->flash('success', 'Event Updated successfully !!');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventProducts  $eventProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventProducts $eventProducts)
    {
        //
    }
}
