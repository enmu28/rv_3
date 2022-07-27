<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use DB;

class Cart extends Controller
{
    public function into_cart(Request $request){
        $id = $request->input('id');
        $sl = $request->input('sl');
        $total_product = 0;
        $product = DB::table('mst_product')->where('product_id', $id)->first();

        if($request->session()->has('cart')){
            if($id){
                $k = 0;
                $cart = $request->session()->get('cart');
                for ($i = 0; $i < count($cart); $i++) {
                    if ($cart[$i]['id'] == $id) {
                        $cart[$i]['sl'] = $cart[$i]['sl'] + $sl;
                        $total_product = $cart[$i]['sl'];
                        $k++;
                        break;
                    }
                }
                if($k ==0){
                    $cart = $request->session()->get('cart');
                    array_push($cart, ['id' => $id, 'sl' => $sl]);
                }
                $request->session()->put('cart', $cart);
            }
        }
        else{
            $cart = array();
            array_push($cart, ['id' => $id, 'sl' => $sl]);
            $total_product = 1;
            $request->session()->put('cart', $cart);
        }


        $total = 0;
        $cart = $request->session()->get('cart');
        for ($i = 0; $i < count($cart); $i++) {
            $total += $cart[$i]['sl'];
        }
//        $request->session()->forget('cart');
        return response()->json([
            'result' => 'Đã thêm '.$product->product_name.' vào giỏ hàng!',
            'total' => $total,
            'total_product' => $total_product
        ]);
    }

    public function cart(){
        $total = $this->total_online();
        return view('shop.cart', ['total'=>$total]);
    }

    public function cart_handling(Request $request){
        $total = 0;
        $cart = $request->session()->get('cart');
        for ($i = 0; $i < count($cart); $i++) {
            $total += $cart[$i]['sl'];
        }
        return view('shop.cart_handling', ['total'=>$total]);
    }

    public function pay(Request $request){
        //        order_id       code_order         total_price       note_customer         customer_id           created_at    /
//        order_id      product_id        product_price      quantity
        $email = $request->input('email');
        $ho_ten = $request->input('ho_ten');
        $sdt = $request->input('sdt');
        $dia_chi = $request->input('dia_chi');
        $ghi_chu = $request->input('ghi_chu');
        $tong_tien = $request->input('tong_tien');
        $cart = $request->session()->get('cart');

        $id = DB::table('mst_orders')->insertGetId([
            'code_order' => "#".base_convert(time()+1, 10, 16),
            'total_price' => $tong_tien,
            'note_customer' => $ghi_chu,
            'customer_id' => 1,
            'customer_name' => $ho_ten,
            'customer_email' => $email,
            'customer_address' => $dia_chi,
            'customer_phone' => $sdt,
            'created_at' => Carbon::today(),
        ]);
        for ($i = 0; $i < count($cart); $i++) {
            $product = DB::table('mst_product')->where('product_id', $cart[$i]['id'])->first();
            DB::table('mst_order_detail')->insert([
                'order_id' => $id,
                'product_id' => $cart[$i]['id'],
                'product_price' => $product->product_price,
                'quantity' => $cart[$i]['sl'],
            ]);
        }
        $request->session()->forget('cart');
        return response()->json([
            'result' => 'Đã đặt hàng thành công!',
        ]);
    }

    public function total_online()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        $ip = DB::table('mst_online')->where('ip_address', 'like', $ipaddress)->first();
        if ($ip == NULL) {
            DB::table('mst_online')->insert([
                'ip_address' => $ipaddress,
                'time_local' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
            $online = DB::table('mst_online')->where('time_local', '>=', (Carbon::now('Asia/Ho_Chi_Minh')->subMinute(2)))->get();

        } else {
            DB::table('mst_online')
                ->where('ip_address', 'like', $ipaddress)
                ->update(['time_local' => Carbon::now('Asia/Ho_Chi_Minh')]);
            $online = DB::table('mst_online')->where('time_local', '>=', (Carbon::now('Asia/Ho_Chi_Minh')->subMinute(2)))->get();
        }
        $online = count($online);
        return $online;
    }
}
