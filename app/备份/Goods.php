<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Types;
class Goods extends Model
{
    //
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';

   public function Types()
    {
    	return $this->hasMany('App\Types', 'typeid', 'goods_id');
    }
}
