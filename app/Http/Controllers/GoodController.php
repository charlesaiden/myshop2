<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Good;
use App\Type;
use App\Http\Requests;
use Illuminate\Support\Facades\Redis;
// use Redis;
use DB;



class GoodController extends Controller
{
    //后台产品列表页aa
    public function index(Request $req)
    {
        // Redis::set('name','1111111');
        // $name = Redis::get('name');
        // echo $name;
        $goodtypes = DB::table('types')
            ->select(DB::raw('*,concat(path,id) as map'))
             ->orderBy('map','asc')
             ->get();

        $goods = DB::table('goods as g')->join('types as t','t.id','=','g.typeid')->select('g.goods_id','g.goods_name','g.is_new','g.is_hot','g.is_recommend','is_on_sale','g.sort','cover_img','t.name','g.updated_at');
        
        // $data = $goods->paginate(20);

        if($req->isMethod('GET')){

            $search['is_new'] = $req->input('is_new');
            $search['is_hot'] = $req->input('is_hot');
            $search['is_recommend'] = $req->input('is_recommend');
            $search['is_on_sale'] = $req->input('is_on_sale');
            $search['cid'] = $req->input('cid');
            $search['keywords'] = $req->input('keywords');

            if(!empty($req->has('is_new'))){
                $goods->where('is_new', $req->input('is_new'));
                // dump($goods);
            }

            if(!empty($req->has('is_hot'))){
                $goods->where('is_hot', $req->input('is_hot'));
                // dump($goods);
            }

            if(!empty($req->has('is_recommend'))){
                $goods->where('is_recommend', $req->input('is_recommend'));
                // dump($goods);
            }

            if(!empty($req->has('is_on_sale'))){
                $goods->where('is_on_sale', $req->input('is_on_sale'));
                // dump($goods);
            }

            if(!empty($req->has('cid'))){
                $goods->where('typeid', $req->input('cid'));
                
            }

            if(!empty($req->has('keywords'))){
                $keywords = $req->input('keywords');
                $goods->where('goods_name','like','%'.$keywords.'%');
                // $goods->where(DB::raw("goods_name like '%{{$keywords}}%'"));
                // dump($goods);
            }

        }

       $goods = $goods->paginate(10);
            // echo $goods->toSql();
            // dd($goods);

    	return view('admin/goods/index', compact('goods','goodtypes','search'));
    }

    //产品页面显示
    public function add()
    {

        $goodtypes = DB::table('types')
            ->select(DB::raw('*,concat(path,id) as map'))
             ->orderBy('map','asc')
             ->get();
        

    	return view('admin/goods/add' ,compact('goodtypes'));
    }

    //产品处理页面
    public function doAdd(Request $request)
    {
        
        // dump($request->all());

        $this->validate($request, [
            'goods_name' => 'required|min:3|max:30',
            'typeid' => 'required',
            // 'shop_price'=>'required',
            // 'created_at' => 'required'
        ],[
            'required' => ':attribute 是必填字段',
            'min' => ':attribute 必须不少于3个字符',
            'max' => ':attribute 必须少于30个字符',
        ],[
            'goods_name' => '商品名称',
            'typeid' => '分类名称',
            // 'shop_price'=>'价格',
            // 'created_at' => '发布时间',
        ]);

        // dd(1);

        // $messages = $validator->errors();

        // echo $messages->first('goods_name');

        if($request->isMethod('POST')){

            // var_dump($request->except('_token'));
            // exit;
            $goods_name = $request->input('goods_name');
            $typeid = $request->input('typeid');
            $goods_sn = $request->input('goods_sn');
            $shop_price = $request->input('shop_price');
            $mareket_price = $request->input('mareket_price');
            $cost_price = $request->input('cost_price');
            $goods_remake = $request->input('goods_remake');
            $goods_content = $request->input('goods_content');
            $sales_num = $request->input('sales_num');
            $is_on_sale = $request->input('is_on_sale');
            $is_recommend = $request->input('is_recommend');
            $is_new = $request->input('is_new');
            $is_hot = $request->input('is_hot');
            $store_count = $request->input('store_count');
            $click_num = $request->input('click_num');
            $created_at = $request->input('datetime');
            $original_img = $request->File('original_img');

            // $file = $request->File('original_img');
            // var_dump($original_img);

            $fileUrl = array();
            if(count($original_img) > 0){
                
                foreach($original_img as $val){
                    if(empty($val)){
                        continue;
                    }

                    $ext = $val->getClientOriginalExtension();     // 扩展名
                    $fileName = date('Y-m-d_H-i-s').uniqid().'.'.$ext;
                    $val->move('./upload', $fileName);
                    // $file = $img->open($val->move('./upload', $fileName));
                    // dd($file);
                    $fileUrl[] = $fileName;   
                }

            }
            $fileUrl = implode(',', $fileUrl);
            $goods = new Good();
            $goods->goods_name = $goods_name;
            $goods->typeid = $typeid;
            $goods->goods_sn = $goods_sn;
            $goods->shop_price = $shop_price;
            $goods->mareket_price = $mareket_price;
            $goods->cost_price = $cost_price;
            $goods->goods_remake = $goods_remake;
            $goods->goods_content = $goods_content;
            $goods->sales_num = $sales_num;
            $goods->is_on_sale = $is_on_sale;
            $goods->is_recommend = $is_recommend;
            $goods->is_new = $is_new;
            $goods->is_hot = $is_hot;
            $goods->store_count = $store_count;
            $goods->click_num = $click_num;
            $goods->created_at = $created_at;
            $goods->original_img = $fileUrl;
            // dd($goods);
            $data_add = $goods->save();
            
            if($data_add){
                echo "<script>alert('添加成功');</script>";
                return redirect('/admin/goods_list');
            }
            
        }

    }

    //产品编辑页面显示
    public function edit($id)
    {
        $goodtypes = DB::table('types')
            ->select(DB::raw('*,concat(path,id) as map'))
             ->orderBy('map','asc')
             ->get();

        $goodsrow = Good::find($id);
        // dd($goodsrow['goods_id']);
        $orimg = explode(',', $goodsrow['original_img']);

        return view('admin/goods/edit', compact('goodtypes','goodsrow','orimg','id'));
    }

    //商品编辑处理页
    public function doEdit(Request $request)
    {
        
        // var_dump($request->all());
        // exit;
        $data = $request->except('_token');
        $data['cover_img'] = substr($data['cover_img'], 6);
        $id = $data['goods_id'];
        

        if($request->hasFile('file')){

            $ext = $request->file('file')->getClientOriginalExtension();     // 扩展名
            $fileName = date('Y-m-d_H-i-s').uniqid().'.'.$ext;
            $request->file('file')->move('./upload',$fileName);
            
            $original_img = DB::table('goods')->where('goods_id',$id)->pluck('original_img');
            $original_img = $original_img[0];
            $original_img .= ','.$fileName;
            DB::table('goods')->where('goods_id',$id)->update(['original_img'=>$original_img]);
        }
        unset($data['goods_id']);
        unset($data['file']);

        // dd($data);
        $boo = Good::where('goods_id',$id)->update($data);
        // if($boo){
            // exit();
            return redirect('/admin/goods_list');
        // }
    }
    //新品
    public function changeNew(Request $req ,$new)
    {   

        $id = $req->input('id');
        $is_new = $req->input('is_new');

        if($is_new == '1'){
            $is_new = '0';
        }elseif($is_new == '0'){
            $is_new = '1';
        }

        $boo = Good::where('goods_id',$id)->update(['is_new'=>$is_new]);

        $newNum = Good::where('goods_id',$id)->pluck('is_new');
        $newNum = $newNum[0];
        
        // echo $tt;
        if($newNum ==1){
            echo 0;
        }elseif($newNum==0){
            echo 1;
        }
    }
    //热销
    public function changeHot(Request $req, $hot,$tid)
    {   
        
        $id = $req->input('id');
        $is_hot = $req->input('is_hot');

        if($is_hot == '1'){
            $is_hot = '0';
        }elseif($is_hot == '0'){
            $is_hot = '1';
        }

        $boo = Good::where('goods_id',$id)->update(['is_hot'=>$is_hot]);

        $newNum = Good::where('goods_id',$id)->pluck('is_hot');
        $newNum = $newNum[0];
        
        // echo $tt;
        if($newNum ==1){
            echo 0;
        }elseif($newNum==0){
            echo 1;
        }
    }

    //推荐
    public function changeRecommend(Request $req, $recommend,$pid,$tid)
    {   
        
        $id = $req->input('id');
        $is_recommend = $req->input('is_recommend');

        if($is_recommend == '1'){
            $is_recommend = '0';
        }elseif($is_recommend == '0'){
            $is_recommend = '1';
        }

        $boo = Good::where('goods_id',$id)->update(['is_recommend'=>$is_recommend]);

        $newNum = Good::where('goods_id',$id)->pluck('is_recommend');
        $newNum = $newNum[0];
        
        // echo $tt;
        if($newNum ==1){
            echo 0;
        }elseif($newNum==0){
            echo 1;
        }
    }

    //是否上架
    public function changeSale(Request $req, $sale,$pid,$tid,$kid)
    {   
        
        $id = $req->input('id');
        $is_on_sale = $req->input('is_on_sale');

        if($is_on_sale == '1'){
            $is_on_sale = '0';
        }elseif($is_on_sale == '0'){
            $is_on_sale = '1';
        }

        $boo = Good::where('goods_id',$id)->update(['is_on_sale'=>$is_on_sale]);

        $newNum = Good::where('goods_id',$id)->pluck('is_on_sale');
        $newNum = $newNum[0];
        
        // echo $tt;
        if($newNum ==1){
            echo 0;
        }elseif($newNum==0){
            echo 1;
        }
    }
    // 商品编辑添加
    // public function addEditImg(Request $request)
    // {
    //     dump($request->all());
    //     $id = $request->input('id');
    //     $name = $request->input('name');
    //     $file = $request->file($name);
    //     dd($file);

    // }

    //商品编辑删除图片处理
    public function delEditImg(Request $request)
    {   
        // dd($request->all());

        $id = $request->input('id');
        $path = $request->input('path');
        $fileDir = './upload/';
        $fileName = $fileDir.$path;

        $url = DB::table('goods')->where('goods_id',$id)->pluck('original_img');
        $url = $url[0];
        $urlarr = explode(',', $url);
        $key = array_search($path,$urlarr);

            unset($urlarr[$key]);
            $url = implode(',', $urlarr);

            if($fileName){
                unlink($fileName);
            }

            $boo = DB::table('goods')->where('goods_id',$id)->update(['original_img'=>$url]);

        if($boo){
            echo 1;
        }else{
            echo 0;
        }

    }

    //删除商品
    public function del($id)
    {
        $original_img = DB::table('goods')->where('goods_id',$id)->pluck('original_img');
        $original_img = $original_img[0];
        $original = explode(',', $original_img);


        foreach($original as $val){

            unlink('./upload/'.$val);

        }

        $good = Good::find($id); 
        $good->delete();
    }

    //
    public function web_index()
    {

        // Redis::set('name','charleslai');

        //前台广告
        $banner = DB::table('pics')->pluck('name');
        //中部导航
        $midtype = DB::table('types')->where('pid',1)->limit(4)->get();
        // dd($midtype);
        //右侧栏分类
        $typelist = DB::table('types')->where('pid',0)->limit(10)->get();
        foreach($typelist as $key=>$val){
            $typelist[$key]['child'] = DB::table('types')->where('pid',$val['id'])->get();
        }
       foreach ($typelist as $key => $val) {

            foreach($val['child'] as $k=>$v){
                $typelist[$key]['child'][$k]['son'] = DB::table('types')->where('pid',$val['child'][$k]['id'])->get();
            }

       }
       //推荐
       $recommend = DB::table('goods')->select('goods_id','goods_name','goods_remake','cover_img')->where(['is_on_sale'=>1,'is_recommend'=>1])->orderBy('updated_at', 'desc')->limit(3)->get();

       //热销
       $hot = DB::table('goods')->select('goods_id','typeid','goods_name','goods_remake','cover_img')->where(['is_on_sale'=>1,'is_hot'=>1])->orderBy('updated_at', 'desc')->limit(4)->get();
       
       //点心、蛋糕类
       $candylist = [];

       $candylist['name'] = DB::table('types')->where('id', 1)->pluck('name')[0];
       $candylist['id'] = 1;
       $candylist['child'] = DB::table('types')->where('pid', 1)->get();
       $candylist['one'] = DB::table('goods as g')->leftjoin('types as t', 'g.typeid','=','t.id')->where('g.typeid', 1)->orderBy('g.created_at','desc')->limit(1)->get()[0];
       $candylist['two'] = DB::table('goods as g')->leftjoin('types as t', 'g.typeid','=','t.id')->where('g.typeid', 1)->orderBy('g.created_at','desc')->limit(2)->get();
       $candylist['four'] = DB::table('goods as g')->leftjoin('types as t', 'g.typeid','=','t.id')->where('g.typeid', 1)->orderBy('g.created_at','desc')->limit(4)->get();
       // dump($candylist);
       //坚果、炒货
       $pufflist = [];
       $pufflist['name'] = DB::table('types')->where('id', 2)->pluck('name')[0];
       $pufflist['id'] = 2;
       $pufflist['child'] = DB::table('types')->where('pid', 2)->get();

       $pufflist['one'] = DB::table('goods as g')->leftjoin('types as t', 'g.typeid','=','t.id')->where('g.typeid', 2)->orderBy('g.created_at','desc')->limit(1)->get()[0];

       $pufflist['two'] = DB::table('goods as g')->leftjoin('types as t', 'g.typeid','=','t.id')->where('g.typeid', 2)->orderBy('g.created_at','desc')->limit(2)->get();


       $pufflist['four'] = DB::table('goods as g')->leftjoin('types as t', 'g.typeid','=','t.id')->where('g.typeid', 2)->orderBy('g.created_at','desc')->limit(4)->get();


       //熟食、肉类
       $meatlist = [];
       $meatlist['name'] = DB::table('types')->where('id', 3)->pluck('name')[0];
       $meatlist['id'] = 3;
       $meatlist['child'] = DB::table('types')->where('pid', 3)->get();
       $meatlist['list'] = DB::table('goods as g')->leftjoin('types as t', 'g.typeid','=','t.id')->where('g.typeid', 3)->orderBy('g.created_at','desc')->limit(12)->get();
       // dump($meatlist);

       return view('web/lar_index', compact('banner','typelist','recommend','hot','candylist','candylist','pufflist','meatlist','midtype'));
    }

    //前台分类列表
    public function cat_list($pid)
    {

        $midtype = DB::table('types')->where('pid',1)->limit(4)->get();
        // $pid = $id
        $typelist = DB::table('types')->where('pid',0)->limit(10)->get();
        foreach($typelist as $key=>$val){
            $typelist[$key]['child'] = DB::table('types')->where('pid',$val['id'])->get();
        }
       foreach ($typelist as $key => $val) {

            foreach($val['child'] as $k=>$v){
                $typelist[$key]['child'][$k]['son'] = DB::table('types')->where('pid',$val['child'][$k]['id'])->get();
            }

       }

        // dump($typelist);
        return view('web/lar_cat_list',compact('typelist','pid','midtype'));
    }

    //前台商品列表页
    public function lister($pid)
    {
        $midtype = DB::table('types')->where('pid',1)->limit(4)->get();
        $goodslist = Good::where('typeid',$pid)->orderBy('updated_at','desc')->paginate(12);
        
        return  view('web/lar_list', compact('goodslist','midtype'));
    }

    //前台商品详细页
    // public function webDetail($id)
    // {
    //     $data = DB::table('goods')->where('goods_id',$id)->get();
    //     $detail = $data[0];
    //     $detail['original_img'] = explode(',',trim($detail['original_img'],','));
    //     // dd($detail);
    //     return view('web/lar_introduction', compact('detail'));
    // }

}
