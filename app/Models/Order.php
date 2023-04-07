<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\IdIncreamentable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  use SoftDeletes, IdIncreamentable;
    protected $dates=[
        'creadted_at',
        'updated_at',
        'deleted_at'
    ];
    public function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }
  public $fillable = [
    'order_gen_id',
    'user_id',
    'admin_id',
    'ip_address',
    'payment_id',
    'name',
    'phone_no',
    'shipping_address',
    'email',
    'message',
    'is_paid',
    'is_completed',
    'is_seen_by_admin',
    'transaction_id'
  ];

  public function IdIncreamentable():array{
    return [
        'source'=>'id',
        'prefix'=>'orkl-',
        'attribute'=>'order_gen_id',
    ];
}

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function carts()
  {
    return $this->hasMany(Cart::class);
  }

  public function payment()
  {
    return $this->belongsTo(Payment::class);
  }

}
