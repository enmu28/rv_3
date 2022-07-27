<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class News extends Controller
{
    /**  Go to page news

     * @return: return view shop.news with values
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function index(){
        $total = $this->total_online();
        $news = DB::table('mst_post')->orderBy('post_views', 'desc')->paginate(3);
        $post_new = DB::table('mst_post')->orderBy('created_at', 'desc')->limit(4)->get();
        $total_news = count(DB::table('mst_post')->get());
//        dd($news);
        return view('shop.news', ['news'=>$news, 'post_new'=>$post_new, 'total_news'=> $total_news, 'total'=> $total]);
    }

    /**  Go to view news with $value catagory
     *
     * @param int category
     * @return: return view shop.news with values
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function category_post(Request $request){
        $total = $this->total_online();
        $catagory_id = $request->category;
        if($catagory_id == 1){
            $news = DB::table('mst_post')->where('catagory_id', '=', 4)
                ->orwhere('catagory_id', '=', 5)->paginate(3);
        }
        elseif($catagory_id == 2){
            $news = DB::table('mst_post')->where('catagory_id', '=', 6)
                ->orwhere('catagory_id', '=', 7)->paginate(3);
        }
        else{
            $news = DB::table('mst_post')->where('catagory_id', '=', $catagory_id)->paginate(3);
        }

        $post_new = DB::table('mst_post')->orderBy('created_at', 'desc')->limit(4)->get();
        $total_news = count(DB::table('mst_post')->where('catagory_id', '=', $catagory_id)->get());
        return view('shop.news', ['news'=>$news, 'post_new'=>$post_new, 'total_news'=> $total_news, 'total'=> $total]);
    }

    /**  Go to new detail
     *
     * @param varchar post_name
     * @return: return view shop.new_detail with values
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function news($post_name){
        $total = $this->total_online();
        $new = DB::table('mst_post')->where('post_name', 'like', $post_name)->first();
        $post_views = $new->post_views;
        DB::table('mst_post')->where('post_name', 'like', $post_name)->update(['post_views' => ($post_views + 1)]);
        $post_new = DB::table('mst_post')->orderBy('created_at', 'desc')->limit(4)->get();
        return view('shop.new_detail', ['new'=>$new, 'post_new'=>$post_new, 'total'=> $total]);
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
        return $online;
    }

}
