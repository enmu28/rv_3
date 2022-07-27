<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class Shop extends Controller
{

    /**  View shop (Home)
     *
     * @return: return view Shop
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function index(Request $request){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        $ip = DB::table('mst_online')->where('ip_address', 'like', $ipaddress)->first();
        if($ip == NULL){
            DB::table('mst_online')->insert([
                'ip_address' => $ipaddress,
                'time_local' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
            $online = DB::table('mst_online')->where('time_local', '>=', (Carbon::now('Asia/Ho_Chi_Minh')->subMinute(2)))->get();

        }else{
            DB::table('mst_online')
                ->where('ip_address', 'like', $ipaddress)
                ->update(['time_local' => Carbon::now('Asia/Ho_Chi_Minh')]);
            $online = DB::table('mst_online')->where('time_local', '>=', (Carbon::now('Asia/Ho_Chi_Minh')->subMinute(2)))->get();
        }
        $online = count($online);

        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $product = DB::table('mst_product')  ->orderBy('created_at', 'desc')->limit(4)->get();
        $season = DB::table('mst_product')->where('season', $dt->month)->inRandomOrder()->limit(4)->get();
        return view('shop/home', ['product'=>$product, 'season'=>$season, 'total'=> $online]);
    }


    /**  Function total online

     * @return: return value count($online)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function total_online(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        $ip = DB::table('mst_online')->where('ip_address', 'like', $ipaddress)->first();
        if($ip == NULL){
            DB::table('mst_online')->insert([
                'ip_address' => $ipaddress,
                'time_local' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
            $online = DB::table('mst_online')->where('time_local', '>=', (Carbon::now('Asia/Ho_Chi_Minh')->subMinute(2)))->get();

        }else{
            DB::table('mst_online')
                ->where('ip_address', 'like', $ipaddress)
                ->update(['time_local' => Carbon::now('Asia/Ho_Chi_Minh')]);
            $online = DB::table('mst_online')->where('time_local', '>=', (Carbon::now('Asia/Ho_Chi_Minh')->subMinute(2)))->get();
        }
        $online = count($online);
        return response()->json([
            'total' => $online
        ]);
    }
}
