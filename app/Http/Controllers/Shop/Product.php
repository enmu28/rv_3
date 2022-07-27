<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class Product extends Controller
{

    /**  Search product
     *
     * @param varchar name_product
     * @return: return view shop.product
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function search_product(Request $request){
        $total = $this->total_online();
        $search_product = $request->input("name_product");
        $product = DB::table('mst_product')->where('product_name', 'like', '%'.$search_product.'%')->orderBy('product_id', 'desc')
            ->paginate(6);
        $total_product = count(DB::table('mst_product')->where('product_name', 'like', '%'.$search_product.'%')->get());
//        dd($product);
        $rau = count(DB::table('mst_product')->where('catagory_id', 1)->get());
        $cu = count(DB::table('mst_product')->where('catagory_id', 2)->get());
        $qua = count(DB::table('mst_product')->where('catagory_id', 3)->get());
        $thit = count(DB::table('mst_product')->where('catagory_id', 5)->get());
        $ca = count(DB::table('mst_product')->where('catagory_id', 6)->get());
        $cua = count(DB::table('mst_product')->where('catagory_id', 7)->get());
        $co_ga = count(DB::table('mst_product')->where('catagory_id', 9)->get());
        $khong_ga = count(DB::table('mst_product')->where('catagory_id', 10)->get());
        return view('shop/product', ['total_product'=> $total_product, 'product'=>$product,
            'rau' => $rau, 'cu' => $cu, 'qua' => $qua,
           'thit' => $thit, 'ca' => $ca, 'cua' => $cua,
             'co_ga' => $co_ga, 'khong_ga' => $khong_ga, 'total'=> $total
            ]);
    }

    /**  Search product with catagory
     *
     * @param varchar catagory
     * @return: return view shop.product
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function category_product(Request $request){
        $total = $this->total_online();
        $category = $request->input('category');
        if($category == 4){
            $product = DB::table('mst_product')->where('catagory_id', 5)->orwhere('catagory_id', 6)->orwhere('catagory_id', 7)
                ->orderBy('product_id', 'desc')
                ->paginate(6);
            $total_product = count(DB::table('mst_product')->where('catagory_id', 5)->orwhere('catagory_id', 6)->orwhere('catagory_id', 7)->get());
        }
        elseif($category == 8){
            $product = DB::table('mst_product')->where('catagory_id', 9)->orwhere('catagory_id', 10)->orderBy('product_id', 'desc')
                ->paginate(6);
            $total_product = count(DB::table('mst_product')->where('catagory_id', 9)->orwhere('catagory_id', 10)->get());
        }
        else{
            $product = DB::table('mst_product')->where('catagory_id', $category)->orderBy('product_id', 'desc')
                ->paginate(6);
            $total_product = count(DB::table('mst_product')->where('catagory_id', $category)->get());
        }
        $rau = count(DB::table('mst_product')->where('catagory_id', 1)->get());
        $cu = count(DB::table('mst_product')->where('catagory_id', 2)->get());
        $qua = count(DB::table('mst_product')->where('catagory_id', 3)->get());
        $thit = count(DB::table('mst_product')->where('catagory_id', 5)->get());
        $ca = count(DB::table('mst_product')->where('catagory_id', 6)->get());
        $cua = count(DB::table('mst_product')->where('catagory_id', 7)->get());
        $co_ga = count(DB::table('mst_product')->where('catagory_id', 9)->get());
        $khong_ga = count(DB::table('mst_product')->where('catagory_id', 10)->get());
        return view('shop/product', ['product'=>$product, 'total_product'=> $total_product,
            'rau' => $rau, 'cu' => $cu, 'qua' => $qua,
            'thit' => $thit, 'ca' => $ca, 'cua' => $cua,
            'co_ga' => $co_ga, 'khong_ga' => $khong_ga, 'total'=> $total
        ]);
    }


    /**  Show information product details
     *
     * @param varchar $slug
     * @return: return view shop.product_detail
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function product_detail($slug){
        $total = $this->total_online();
        $product = DB::table('mst_product')->where('slug', 'like', $slug)->first();
        if($product->catagory_id==5 || $product->catagory_id==6 || $product->catagory_id==7){
            $product_1 = DB::table('mst_product')
                ->where('catagory_id', 6)->orwhere('catagory_id', 7)->orwhere('catagory_id', 5)
                ->where('product_id', '<>', $product->product_id)
                ->limit(2)->get();
        }
        elseif($product->catagory_id==9 || $product->catagory_id==10){
            $product_1 = DB::table('mst_product')->where('product_id', '!=', $product->product_id)
                ->where('catagory_id', 9)->orwhere('catagory_id', 10)
                ->limit(2)->get();
        }
        else{
            $product_1 = DB::table('mst_product')
                ->where('catagory_id', $product->catagory_id)
                ->where('product_id', '<>', $product->product_id)
                ->limit(2)->get();
        }
//        dd($product_1);
        return view('shop.product_detail', ['product'=> $product, 'product_1'=>$product_1, 'total'=> $total]);
    }

    /**  Function total online
     *
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
