<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\Pic;
use App\Type;
use App\Http\Requests;
use DB;
use Mail;

class WebController extends Controller
{
    //首页
    public function index()
    {

    }

    //登录页
    public function login()
    {
        return view("web/login");
    }

    //注册页
    public function register()
    {
        return view("web/register");
    }

   //商品详情页
    public function goods(Request $request, $id)
    {

        $midtype = DB::table('types')->where('pid',1)->limit(4)->get();
        //查询商品表拿到商品详细信息
        $data = DB::table('goods')->where("goods_id", $id)->get();

        $comments = DB::table('goods_comments')->where(["goodsid"=>$id,"content"=>1])->join('members','goods_comments.userid','=','members.id')->paginate(10);
        $comments_two = DB::table('goods_comments')->where(["goodsid"=>$id,"content"=>1])->join('members','goods_comments.userid','=','members.id')->paginate(10);
//        dd($comments);
        //返回的是二维数组所以得转成一维数组赋值到首页
        $data = $data[0];

        //判断username是否存在session中,存在则赋值到首页
        $bool =  $request->session()->has("username","comments");

        if($bool) {
            $username =  $request->session()->get("username");

            return view('web/lar_introduction', compact('username', 'data','midtype'));
        } else {

            return view('web/lar_introduction', compact('data', 'comments','comments_two','midtype'));
        }


    }


    //购物车页
    public function cart(Request $request)
    {
        //拿到当前用户的id
        $uid = $request->session()->get("webid");

        //查询购物车表拿到保存的数据
        $data = DB::table('cars')->where('userid', $uid)->get();

        $carydata = [];
        $number = 0;
        //判断当前用户是否有添加数据到购物车
        if(count($data) > 0) {

            //根据购物车表的数据查询商品表
            foreach ($data as $val){
                $id = $val['id'];
                $goodid = $val['goodsid'];
                $num = $val['num'];
                $gdata = DB::table('goods')->where("goods_id", $goodid)->get();
                $arr[$number] = [
                    "id" => $id,
                   "goods_name" => $gdata[0]['goods_name'],
                    "shop_price" => $gdata[0]['shop_price'],
                    "num" => $num,
                    "pic" => $gdata[0]['cover_img']
                ];
                $carydata = $arr;
                $number++;
            }
        }

        return view("web/cart", compact("carydata"));
    }

    //结算页
    public function pay(Request $request, $id=null, $goodnum=null)
    {

        if(!$request->session()->has("webusername")) {
            echo "<script>alert('请先登录!');window.location.href=(window.location.protocol+'//'+window.location.host+'/login')</script>";

        }
        //拿到当前用户的ID
        $userid =  $request->session()->get("webid");

        //地址数据
        $addressData = DB::table("addresses")->where("userid", $userid)->get();

        //判断是直接购买进来还是从购物车中进来
        if(!$id == null) {

            //商品数据
            $data = DB::table('goods')->where('goods_id', $id)->get();

        } else {

            //拿到用记提交的订单数据
            $data = $request->session()->get("shopData");

        }
        return view("web/pay", compact("data", "addressData", "goodnum"));


    }

    //结算成功页
    public function paysucceed()
    {

        return view("web/paysucceed");
    }

    //列表页
    public function lister()
    {
        // return view("web/list");
        return view("web/lar_list");

    }

    //订单页
    public function order()
    {
        return view("web/order");
    }

    public function myorder(Request $request)
    {
        //拿到当前用户的ID
        $userid = $request->session()->get("webid");

        //查询订单表
        $data = DB::table("orders")->where("userid", $userid)->get();

        return view("web/myorder", compact("data"));
    }

//用户中心页
    public function ucenter(Request $request)
    {

        if(!$request->session()->has("webusername")) {
            echo "<script>alert('请先登录!');window.location.href='login';</script>";
        }
        $name =  $request->session()->get("webusername");

        $id = $name;

        $user_datas = DB::table('members')->where('username','=',$id)->get();

        $user_datas = $user_datas[0];

        return view('web/center')->with('user_datas',$user_datas);

    }

    //用户组中心修改
    public function ucenteradd()
    {
        $uname = $_POST['uname'];

        $add = DB::table('members')->where('username',$uname)->update(['pname'=>$_POST['pname'],'name'=>$_POST['name'],'sex'=>$_POST['sex'],'address'=>$_POST['address'],'code'=>$_POST['code'],'email'=>$_POST['uemail'],'phone'=>$_POST['uphone']]);

        if($add>0)
        {

            exit("<script>alert('资料修改成功');window.location.href='center'</script>");

        }else{

            exit("<script>alert('修改资料失败，请修改资料后在提交');window.location.href='center'</script>");

        }
    }

    //地址删除设置默认
    public function addres(Request $request)
    {
        if(!$request->session()->has("webusername")) {

            echo "<script>alert('请先登录!');window.location.href='login';</script>";

        }

        $uid =  $request->session()->get("webid");

        $addres_data = DB::table('addresses')->where('userid',$uid)->paginate(10);
//        dd($uid);
        if (isset($_GET['id']) == true && $_GET['perform'] == 'delete')
        {
            $delete = DB::table('addresses')->where('id',$_GET['id'])->delete();

            if ($delete > 0)
            {

                exit("<script>alert('删除成功');window.location.href='addres'</script>");

            }else{

                exit("<script>alert('删除失败');window.location.href='addres'</script>");

            }
        }

        if (isset($_GET['id']) == true && isset($_GET['perform']) == true)
        {
            DB::table('addresses')->where('userid',$_GET['perform'])->update(['status'=>0]);
            $status = DB::table('addresses')->where('id',$_GET['id'])->update(['status'=>1]);

            if ($status > 0)
            {

                exit("<script>alert('设置默认成功');window.location.href='addres'</script>");

            }else{

                exit("<script>alert('设置默认失败');window.location.href='addres'</script>");

            }
        }
//        dd($addres_data);
        return view("web/addres",compact('addres_data'));

    }

    //地址添加修改
    public function addresadd(Request $request)
    {
        $uid =  $request->session()->get("webid");

        if (isset($_POST['created_at']) == true)
        {
            $add = DB::table('addresses')->insert(['userid'=>$uid,'created_at'=>$_POST['created_at'],'province'=>$_POST['province'],'city'=>$_POST['city'],'county'=>$_POST['county'],'detailed_address'=>$_POST['uaddress'],'consignee'=>$_POST['uname'],'phone'=>$_POST['uphone'],'code'=>$_POST['code']]);

            if ($add)
            {

                exit("<script>alert('添加地址成功');window.location.href='addres'</script>");

            }else{

                exit("<script>alert('添加地址失败');window.location.href='addres'</script>");

            }
        }

    }

    //地址修改页输出
    public function addresedit($id,Request $request)
    {
        if(!$request->session()->has("webusername")) {

            echo "<script>alert('请先登录!');window.location.href='login';</script>";

        }

        $addres_data = DB::table('addresses')->where('id',$id)->paginate(10);

        $addres_data = $addres_data[0];

        return view("web/addresedat",compact('addres_data'));

    }

    //修改页提交
    public function addreseditadd()
    {
        $time = date('y-m-d h:i:s',time());

        $update = DB::table('addresses')->where('id',$_POST['addresid'])->update(['updated_at'=>$time,'province'=>$_POST['province'],'city'=>$_POST['city'],'county'=>$_POST['county'],'detailed_address'=>$_POST['uaddress'],'consignee'=>$_POST['uname'],'phone'=>$_POST['uphone'],'code'=>$_POST['code']]);

        if ($update > 0)
        {

            exit("<script>alert('修改地址成功');window.location.href='addres'</script>");

        }else{

            exit("<script>alert('修改地址失败');window.location.href='addres'</script>");

        }

    }


    //注册页Ajax请求处理
    public function registerAjax()
    {

        if(isset($_POST['email']) == false && isset($_POST['pass']) == false) {

            $username = $_POST['username'];

            $data = DB::table("members")->where("username","=",$username)->get();

            echo count($data);

        }else if(isset($_POST['pass']) == false) {

            $email = $_POST['email'];

            $data = DB::table('members')->where('email',$email)->get();

            echo count($data);

        } else {
            $time = date('y-m-d h:i:s',time());
            $data = DB::table("members")->insert([

                "username"=>$_POST['username'],
                "email"=>$_POST['email'],
                "state"=>0,
                "pass"=>password_hash($_POST['pass'],PASSWORD_DEFAULT),
                "updated_at"=>$time

            ]);

            $data2 = DB::table("members")->where("username","=",$_POST['username'])->get();

            $datamail = $data2[0];

            $base64 = base64_encode($datamail['id']);

            $url = 'http://'.$_SERVER['HTTP_HOST'].'/activation/'.$base64;

            Mail::raw(  "激活地址：".$url,function ($message){

                $message->subject('商城激活邮件');

                $message->to($_POST['email']);

            });

            echo $data;
        }

    }

    //登录页Ajax请求处理
    public function loginAjax(Request $request)
    {
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        //查询用户名是否存在
        $data = DB::table('members')->where('username', '=', $username)->get();

        $bool =  count($data);

        //大于0则存在
        if($bool > 0) {

            $data = DB::table('members')->where('username', '=', $username)->get();

            foreach($data as $val) {

                $password = $val['pass'];

                $bool =  password_verify($pass,$password);


               $id = $val['id'];

               $state = $val['state'];

            }

        }

        if($bool && $state != 0){

            echo "2";
            $request->session()->put("webusername", $username);
            $request->session()->put("webid", $id);

        }elseif($state == 0) {

            echo "1";
            $request->session()->put("webusername", $username);
            $request->session()->put("webid", $id);
        }else {

            echo "0";
        }


    }

    //找回密码
    public function Retrieve()
    {
        return view("web/Retrieve");
    }

    //找回密码 ajax
    public function Retrieveajax()
    {
        $email = $_POST['email'];

        $data = DB::table("members")->where("email","=",$email)->get();

        echo count($data);
    }

    //找回密码修改页面 ajax
    public function Retrievepass()
    {

        $data = DB::table("members")->where("email","=",$_POST['email'])->get();

        $bool =  count($data);

        if ($data >0 )
        {
            $datamail = $data[0];

            $base64 = base64_encode($datamail['username']);
            $base642 =  base64_encode($datamail['updated_at']);
            $url = 'http://'.$_SERVER['HTTP_HOST'].'/changepass/'.$base64.'/'.$base642;

            Mail::raw(  "激活地址：".$url,function ($message){

                $message->subject('商城激活邮件');

                $message->to($_POST['email']);

            });
        }

        if ($bool)
        {
            echo "1";
        }else
        {
            echo "2";
        }
    }

    //用户退出
    public function quit(Request $request)
    {
        $request->session()->pull("webusername");
        $request->session()->pull("webid");
        echo "<script>alert(' 退出成功!');window.location.href='index';</script>";
    }

    //评论页输出
    public function message(Request $request)
    {
        if(!$request->session()->has("webusername")) {

            echo "<script>alert('请先登录!');window.location.href='login';</script>";

        }

        $uid =  $request->session()->get("webid");

        $page = DB::table('goods_comments')->where('userid',$uid)->join('goods','goods_comments.goodsid','=','goods.goods_id')->paginate(10);
//        dd($page);

        $data = DB::table('goods_comments')->where('userid',$uid)->join('goods','goods_comments.goodsid','=','goods.goods_id')->paginate(10);

        return view("web/message",compact('data','page'));
    }

    //评论页修改
    public function messageadd()
    {

        $update = DB::table('goods_comments')->where('id', $_POST['messageid'])->update(['message'=>$_POST['messageadd']]);

        if ($update > 0)
        {
            $time = date('y-m-d h:i:s',time());

            DB::table('goods_comments')->where('id', $_POST['messageid'])->update(['updated_at'=>$time,'content'=>0]);

            exit("<script>alert('修改评论成功');window.location.href='message'</script>");

        }else{

            exit("<script>alert('修改评论失败');window.location.href='message'</script>");

        }

    }


    //城市三级联动
    public function cityModel()
    {
        $upid = $_GET['upid'];

        $data = DB::table('district')->where('upid', $upid)->get();

        echo json_encode($data);
    }

    //支付页添加地址
    public function payAddress(Request $request)
    {
       $consignee = $_POST['consignee'];
       $phone = $_POST['phone'];
       $province = $_POST['province'];
       $city = $_POST['city'];
       $county = $_POST['county'];
       $detailed_address = $_POST['detailed_address'];
       $code = $_POST['code'];

       //拿到存在session里面的用户id
       $userid =  $request->session()->get("webid");

       //判断收货人,用户ID,收货地址,手机号码,地区是否存在,存在则不添加(禁止添加同样的数据)
        $formerly = DB::table("addresses")->where([
            "userid"=>$userid,
            "consignee"=>$consignee,
            "phone"=>$phone,
            "province"=>$province,
            "city"=>$city,
            "county"=>$county,
            "detailed_address"=>$detailed_address
            ])->get();

        if(count($formerly) > 0) {

            echo "2";
        } else {

            //写入数据库
            $data = DB::table("addresses")->insert([

                "userid"=>$userid,
                "consignee"=>$consignee,
                "phone"=>$phone,
                "province"=>$province,
                "city"=>$city,
                "county"=>$county,
                "detailed_address"=>$detailed_address,
                "code"=>$code,
                "status"=>0
            ]);
            echo $data;
        }


    }


    //注册成功返回页
    public function activation($id)
    {
        $base64 = base64_decode($id);

        $update = DB::table('members')->where('id',$base64)->update(['state'=>1]);

        if ($update > 0 )
        {
            return view("web/activation");

        }else{

            return view("web/activation2");

        }

    }

    //修改密码页面
    public function changepass($id,$time)
    {
        $base64 = base64_decode($id);
        $base642 = base64_decode($time);

        $data  = DB::table('members')->where('username',$base64)->get();

        if ($data[0]['username'] == $base64 && $data[0]['updated_at'] == $base642){
//            dd($id);
            return view("web/changepass",compact('id'));

        }else{

            $url = 'http://'.$_SERVER['HTTP_HOST'];

            echo "<script>alert('链接已失效');window.location.href='$url'</script>";

        }
    }

    public function changepassword()
    {
        $time = date('y-m-d h:i:s',time());
        $base64 = base64_decode($_POST['changepass']);
        $update = DB::table('members')->where('username',$base64)->update([
        "pass"=>password_hash($_POST['pass'],PASSWORD_DEFAULT),
        'state'=>1,
        'updated_at'=>$time
    ]);

        if ($update)
        {
            echo "1";
        }else
        {
            echo "0";
        }
        exit();

    }

    //购物车页ajax
    public function cartAjax(Request $request, $id, $gnum)
    {
        if(!$request->session()->has("webusername")) {
            echo "<script>alert('请先登录!');window.location.href=(window.location.protocol+'//'+window.location.host+'/login')</script>";
        }

        //查询商品表拿到商品数据
        $data = DB::table("goods")->where("goods_id", $id)->get();


        //拿到当前用户的id
        $uid = $request->session()->get("webid");

        //判断购物车表有没有一样的数据,有则加1,没有则添加
        $formerly = DB::table("cars")->where([
            "userid"=>$uid,
            "goodsid"=>$id
        ])->get();

        if(count($formerly) > 0 ) {
            //商品数量加1
           $bool = DB::table("cars")->where([
                "userid"=>$uid,
                "goodsid"=>$id
            ])->increment('num');

           echo $bool;
        } else {

           $bool =  DB::table('cars')->insert([
               "userid"=>$uid,
               "goodsid"=>$data[0]['goods_id'],
               "num"=>$gnum
           ]);

           echo $bool;
        }

    }

    //购物车删除
    public function cartDelete() {

        //购物车商品ID
        $id =  $_GET['id'];

        //删除该商品
        $data = DB::table("cars")->where("id", $id)->delete();

        echo $data;

    }

    //购物车结算存session
    public function cartSession(Request $request)
    {
        $shopData = $_GET['shopData'];

        //存进session之前先清除session之前的数据
        $request->session()->pull("shopData");

        //把订单数据存进session
        $request->session()->put("shopData", $shopData);

        echo "1";
    }

    //购物车页存session里的数据存进订单表
    public function paysucceedAjax(Request $request)
    {
        //拿到提交过来的订单数据
        $orderData = $_GET['orderData'];

//        $request->session()->put("sheshi", $orderData);
      //拿到当前用户的ID
        $userid = $request->session()->get("webid");

        //生成一个订单号
        $ordernum = $userid.date("YmdHis", time()).rand(100,999);

        //订单创建时间
        $ordertime = date("Y-m-d H:i:s");

        foreach($orderData as $val) {

            $data = DB::table('orders')->insert([
                "userid" => $userid,
                "ordernum" => $ordernum,
                "linkman" => $val['linkman'],
                "address" => $val['address'],
                "imgurl" => $val['cover_img'],
                "phone" => $val['phone'],
                "goods" => $val['goods_name'],
                "status" => 0,
                "total" => $val['order_price'],
                "created_at" => $ordertime
            ]);
        }
        $arr = [
            "data"=> $data,
            "ordernum"=> $ordernum
        ];

        echo json_encode($arr);
    }
}




