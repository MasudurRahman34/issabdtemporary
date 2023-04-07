<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventProducts extends Model
{
    use HasFactory; 
    public $fillable = [
        'product_id',
        'offer_type',
        'product_price',
        'unit_id',
        'discount',
        'target_quantity',
        'delivery_date',
        'start_date',
        'end_date',
        'is_active',
        'admin_id'
        
      ];
      public function Product()
        {
            return $this->belongsTo(Product::class,'product_id');
        }
      public function Units()
        {
            return $this->belongsTo(Units::class,'unit_id');
        }
     
}
