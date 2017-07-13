<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Goods;
class Types extends Model
{
    //
    protected $table = 'types';
    protected $primaryKey = 'id';


   public function Goodss()
   {
   		return $this->belongsTo('App\Goods','typeid', 'goods_id');
   }

}
