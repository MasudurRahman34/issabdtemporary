<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function images()
  {
    return $this->hasMany(ProductImage::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function EventProducts()
  {
    return $this->hasMany(EventProducts::class,'product_id');
  }
  public function Units()
  {
    return $this->belongsTo(Units::class);
  }
}
