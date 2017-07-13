<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
// use Illuminate\Http\Request\CreatePostRequest;
// use Illuminate\Pagination\LengthAwarePaginator;
use DB;
class AdminController extends BaseController
{
    public function index(Request $request)
    {
    $pass = '';
         if(session('level') == 0)
         {
            $pass = 1;
         }

        $data = DB::table('users')->get();
    	return view('admin/index',compact('data','pass'));
    }

    //后台网站设置页面
    public function info()
    {

        return view('admin/info');
    }


    /**
    *
    *********************************************商品分类模块****************************************
    */
    //商品分类
    public function cate_list()
    {

        $types_data = DB::table('types')
                ->select(DB::raw('*,concat(path,id) as map'))
                ->orderBy('map','asc')
                ->paginate(20);

        $types_page = DB::table('types')
                ->select(DB::raw('*,concat(path,id) as map'))
                ->orderBy('map','asc')
                ->paginate(20);

        return view('admin/cate/index', compact('types_data','types_page'));
    }

    //商品分类添加显示
    public function cate_add()
    {
        $types = DB::table('types')
             ->select(DB::raw('*,concat(path,id) as map'))
             ->orderBy('map','asc')
             ->get();
        return view('admin/cate/add',compact('types'));
    }

    //商品分类添加
    public function doCateAdd(Request $request)
    {

        // $this->validate($request, [
        //     'title' => 'required|min:3|max:30',
        //     // 'content' => 'required',
        //     // 'published_at' => 'required'
        // ],[
        //     'required' => ':attribute 是必填字段',
        //     'min' => ':attribute 必须不少于3个字符',
        //     'max' => ':attribute 必须少于30个字符',
        // ],[
        //     'title' => '文章标题',
        //     // 'content' => '文章内容',
        //     // 'published_at' => '发布时间',
        // ]);
        
      //判断是不是传递过来的值
      if(!$request->has('id') || !$request->has('title')){
        return back();
      }

      $id = 0;
      $path = '0,';

      if($request->input('id') !=0){
            $id = $request->input('id');
            $path = DB::table('types')->where('id',$id)->pluck('path');
            $path = $path[0].$id.',';
      }

      $name = $request->input('title');
      $created_at = date("Y-m-d H:i:s");
            

      $type_add = DB::table('types')->insert(['name'=>$name,'pid'=>$id,'path'=>$path,'created_at'=>$created_at]);

        if ($type_add) {
            return redirect('/admin/cate_list')->with(['success' => '添加成功！！！！！！！']);
        } else {
            return back()->withInput();
        }

    }

     //商品分类编辑显示
    public function cate_edit($id,$pid,$name)
    {

        //分类列表
        $types = DB::table('types')
             ->select(DB::raw('*,concat(path,id) as map'))
             ->orderBy('map','asc')
             ->get();
        // var_dump($types);
        
        return view('admin/cate/edit',compact('types','id','pid','name'));
    }
    //商品分类处理
    public function doCateEdit(Request $request)
    {
        // dd($request->all());

        if(!$request->has('id') || !$request->has('title') ){
            return back()->withInput();
        }
        //修改记录ID
        $id = $request->input('id');
        //原来父ID
        $pid = $request->input('pid');
        //
        $tpid = $request->input('tpid');

        $title = $request->input('title');

        if($tpid==0){
            $path = '0,';
        }else{
            $path = DB::table('types')->where('id',$tpid)->pluck('path');
            $path = $path[0];
            $path = $path.$tpid.',';
        }

        $boo = DB::table('types')->where('id', $id)->update(['pid'=>$tpid,'path'=>$path,'name'=>$title]);
        if($boo){
            echo "<script>alert('修改成功')</script>"; 
             // return false;
            return redirect('/admin/cate_list');
        }
        
        // return view('/admin/cate_list');
    }

    //添加子分类显示
    public function cate_child($id,$pid)
    {

        //分类列表
        $types = DB::table('types')->get();
        return view('/admin/cate/child' ,compact('types','id','pid'));
    }

    //添加子分类处理
    public function doCateChild(Request $request)
    {


        if(!$request->has('title')){
            return back();
        }

        $id = $request->input('pid');
        $name = $request->input('title');    
        $data = DB::table('types')->where('id', $id)->get();
        $data = $data[0];
        // id,pid,path
        $path = $data['path'].$id.',';
        $boo = DB::table('types')->insert(['pid'=>$id,'path'=>$path,'name'=>$name,'created_at'=>date('Y-m-d H:i:s')]);

        if($boo){
            echo "<script>alert('子类添加成功')</script>";
        }
        // return view('admin/cate/del');
        return redirect('/admin/cate_list');


    }

    //商品分类删除
    public function cate_del(Request $request,$id)
    {
        
        $boo = DB::table('types')->where('id',$id)->delete();
        
        if($boo){
            echo "<script>alert('删除成功')</script>";
        }
        // return view('admin/cate/del');
        return redirect('/admin/cate_list');
    }

    /**
    *
    *********************************************商品管理模块****************************************
    */

    //商品管理
    public function goods_list()
    {

        return view('admin/goods/index');
    }

    //商品添加
    public function goods_add()
    {

        return view('admin/goods/add');
    }

     //商品编辑
    public function goods_edit()
    {

        return view('admin/goods/edit');
    }

    //商品删除
    public function goods_del()
    {

        return view('admin/goods/del');
    }

    /**
    *
    *********************************************订单模块****************************************
    */

    //订单管理
    public function order_list()
    {
        $data = DB::table('orders')->get();

        return view('admin/order/index', compact('data'));
    }

    //订单修改
    public function order_update()
    {
        $id = $_POST['id'];
        $order_linkman = $_POST['order_linkman'];
        $order_address = $_POST['order_address'];
        $order_code = $_POST['order_code'];
        $order_phone = $_POST['order_phone'];
        $order_price = $_POST['order_price'];
        $update_bool = DB::table('orders')->where('id', $id)->update([
            "linkman" => $order_linkman,
            "code" => $order_code,
            "address" => $order_address,
            "phone" => $order_phone,
            "total" => $order_price
        ]);
        echo $update_bool;

    }

     //订单编辑
    public function order_edit($id)
    {
       $data = DB::table('orders')->where('id','=',$id)->get();

       $data = $data[0];

        return view('admin/order/edit', compact('data'));
    }

    //订单删除
    public function order_del()
    {
       $id = $_GET['id'];

       $data = DB::table('orders')->where("id", "=", $id)->delete();

       echo $data;

    }

    //发货
    public function order_send($id)
    {
        
        return view('admin/order/send', compact("id"));
    }

    public function send()
    {
        $id =  $_GET['id'];

        $expressid = $_GET['expressid'];

        $data = DB::table("orders")->where("id", $id)->update([
            "expressid"=>$expressid,
            "status"=>1
            ]);


        echo $data;
    }

//    public function send()
//    {
//        $expressid = $_GET['expressid'];
//        $data = DB::table("orders")->update(['expressid'=>$expressid]);
//        echo $data;
//    }
    /**
    *
    *********************************************管理员模块****************************************
    */

    //管理员模块
    public function admin_list()
    {
        $user_admin = DB::table('users')->where('level','<=','3')->paginate(10);

        $users_page = DB::table('users')->paginate(10);
        // dump($user_admin);
        return view('admin/admin/index',compact('user_admin','users_page'));
    }

    //管理员添加
    public function admin_add()
    {

        return view('admin/admin/add');
    }

    public function doAdminAdd()
    {
        $add_user['username'] = $_POST['username'];
        $add_user['pass'] = $_POST['pass'];
        $add_user['level'] = $_POST['level'];
        $bloon = DB::table('users')->insert($add_user);
        if($bloon){
            echo "<script>alert('添加成功')</script>"; 
            return view('admin/admin/add');
  
        }
        return view('admin/admin/add');
    }

     //管理员编辑
    public function admin_edit($id)
    {
        $user_data = DB::table('users')->where('id',$id)->get();
        $user_data = $user_data[0];
        // dd($user_data);
        return view('admin/admin/edit',compact('user_data'));
    }

    public function doAdminEdit()
    {
        $id = $_POST['id'];
        $edit_user['username'] = $_POST['username'];
        $edit_user['pass'] = $_POST['pass'];
        $edit_user['level'] = $_POST['level'];
        $booln = DB::table('users')->where('id',$id)->update(['username'=>$_POST['username'],'pass'=>$_POST['pass'],'level'=>$_POST['level']]);
        if($booln){

            echo "<script>alert('修改成功')</script>"; 
            return redirect('/admin/admin_list');

        }

    }
    //管理员删除
    public function admin_del($id)
    {

        $userid = DB::table('users')->where('id',$id)->delete();
        if($userid){
             echo "<script>alert('删除成功')</script>"; 

            return redirect('/admin/admin_list/');
        }
        
    }

    /**
     *
     *********************************************评论模块****************************************
     */

    //评论列表
    public function comments_list()
    {

        $page = DB::table('goods_comments')->join('goods','goods_comments.goodsid','=','goods.goods_id')->paginate(10);

        $data = DB::table('goods_comments')->join('goods','goods_comments.goodsid','=','goods.goods_id')->paginate(10);

        return view('admin/comments/index',compact('data','page'));

    }

    //评论审核
    public function comments_add()
    {
        $add = DB::table('goods_comments')->where('id',$_GET['id'])->get();

        $add = $add[0];

        return view('admin/comments/add',compact('add'));

    }

    //评论审核修改
    public function comments_submit()
    {

        $submit = DB::table('goods_comments')->where('id', $_POST['comments_id'])->update(['content'=>$_POST['state']]);

        if ($submit > 0 )
        {

            exit("<script>alert('审核修改成功');window.location.href='comments_list'</script>");

        }else{

            echo "<script>alert('请修改后在提交');window.history.go(-1);</script>";

        }

    }

    /**
     *
     *********************************************友情链接****************************************
     */

    //友情链接列表url
    public function link_list()
    {
        $list = DB::table('links')->paginate(10);
        $page = DB::table('links')->paginate(10);
        return view('admin/links/index',compact('list','page'));
    }

    //友情链接添加
    public function link_add()
    {

            return view("admin/links/add");

    }

    //友链添加处理页面
    public function link_submit()
    {

            $submit = DB::table('links')->insert(['name'=>$_POST['linkname'], 'url'=>$_POST['link']]);

            if ($submit)
            {
                exit("<script>alert('添加成功');window.location.href='link_list'</script>");
            }

    }

    //友链删除
    public function link_updata()
    {

        $add = DB::table('links')->where('id',$_GET['id'])->delete();

        if ($add > 0)
        {

            exit("<script>alert('删除成功');window.location.href='link_list'</script>");

        }

    }

    //友链编辑
    public function link_upadd()
    {
        $upadd = DB::table('links')->where('id',$_GET['id'])->get();

        $upadd = $upadd[0];

        return view("admin/links/upadd",compact('upadd'));
    }

    //友链编辑成功
    public function link_upadds()
    {

        $upadd = DB::table('links')->where('id', $_POST['linkid'])->update(['name'=>$_POST['linkname'], 'url'=>$_POST['link']]);

        if ($upadd > 0 )
        {

            exit("<script>alert('修改成功');window.location.href='link_list'</script>");

        }else{

            exit("<script>alert('修改失败');history.go(-1);</script>");

        }

    }
}


