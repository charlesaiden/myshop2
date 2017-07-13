<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
class Good extends Model
{
    //
    protected $table = 'goods';
    
    protected $primaryKey = 'goods_id';

    protected $fillable = ['goods_id','goods_name', 'typeid', 'goods_sn' , 'shop_price' , 'mareket_price', 'cost_price' , 'cover_img', 'goods_remake', 'goods_content','sales_num', 'is_on_sale' , 'is_recommend' , 'is_new' ,'is_hot' ,'store_count', 'click_num' ,'original_img','created_at'];

   public function Types()
    {
    	return $this->hasMany('App\Type', 'id', 'typeid');
    }

   // public function Type()
   // {
   // 		return $this->belongsTo('App\Good','id', 'typeid');
   // }

}
