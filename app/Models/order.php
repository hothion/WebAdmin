<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\users;
use App\Models\product;
use App\Models\order_status;
class order extends Model
{
    protected $table="orders";
    protected $fillable = [
        'id','id_product','id_user','quantity'
    ];
    function product(){
        return $this->hasMany("App\Models\product","id","id_product");
     }
      function users(){
        return $this->hasMany("App\Models\users","id","id_user");
     }
     function order_status(){
        return $this->hasMany("App\Models\order_status","id","id_orderStatus");

     }
}
