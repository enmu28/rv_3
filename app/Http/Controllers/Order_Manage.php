<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;

class Order_Manage extends Controller
{
    /**  Page Order View

     * @return: response view order
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function index(){
        $order = DB::table('mst_orders')
            ->join('mst_customers', 'mst_customers.customer_id', '=', 'mst_orders.customer_id')
            ->select('mst_orders.*', 'mst_customers.email')
            ->orderBy('mst_orders.order_id', 'desc')
            ->paginate(10);
        $total_order = DB::table('mst_orders')->count();
        Session::put('title', 'Orders');
        return view('order_1', ['order'=>$order, 'total_order'=>$total_order]);
    }

    /**  Pagination for page Order ( ajax )

     * @return: response view list_order
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $order = DB::table('mst_orders')
                ->join('mst_customers', 'mst_customers.customer_id', '=', 'mst_orders.customer_id')
                ->select('mst_orders.*', 'mst_customers.email')
                ->orderBy('mst_orders.order_id', 'desc')
                ->paginate(10);
            $total_order = DB::table('mst_orders')->count();
            return view('list_order', ['order'=>$order, 'total_order'=>$total_order])->render();
        }
    }


    /**  Search for page User ( ajax )
     * @param varchar od_search_email
     * @param varchar od_search_code
     * @param int od_search_status
     * @param int od_search_payment
     * @param datetime-local od_search_date
     * @return: response view list_user with key_search
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function search_order(Request $request){
        $od_search_email = $request->input('od_search_email');
        $od_search_code = $request->input('od_search_code');
        $od_search_status = $request->input('od_search_status');
        $od_search_payment = $request->input('od_search_payment');
        $od_search_date = $request->input('od_search_date');
//        dd($od_search_date);

        $query = DB::table('mst_orders')
            ->join('mst_customers', 'mst_customers.customer_id', '=', 'mst_orders.customer_id')
            ->select('mst_orders.*', 'mst_customers.email')
            ->orderBy('mst_orders.order_id', 'desc');
        if(isset($od_search_email)){
            $query = $query->where('mst_customers.email', 'like', '%'.$od_search_email.'%');
        }
        if(isset($od_search_code)){
            $query = $query->where('mst_orders.code_order', 'like', "$od_search_code");
        }
        if($od_search_status != "Null"){
            $query = $query->where('mst_orders.order_status', $od_search_status);
        }
        if($od_search_payment != "Null"){
            $query = $query->where('mst_orders.payment', $od_search_payment);
        }
        if(isset($od_search_date)){
            $query = $query->whereDate('mst_orders.created_at', $od_search_date);
        }
        $order = $query->paginate(10);
        $total_order = DB::table('mst_orders')->count();
        return view('list_order', ['order'=>$order, 'total_order'=>$total_order]);
    }

    /**  Not search ( ajax )
     * @return: response view not_order
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function not_order(){
        return view('not_order');
    }


    /** Search drop ( ajax )
     * @return: response view list_order
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function od_search_drop(){
        $order = DB::table('mst_orders')
            ->join('mst_customers', 'mst_customers.customer_id', '=', 'mst_orders.customer_id')
            ->select('mst_orders.*', 'mst_customers.email')
            ->orderBy('mst_orders.order_id', 'desc')
            ->paginate(10);
        $total_order = DB::table('mst_orders')->count();
        Session::put('title', 'Orders');
        return view('list_order', ['order'=>$order, 'total_order'=>$total_order]);
    }


    /**  Update Order ( ajax )

     * @param int order_id
     * @return: response value for popup Update Order
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function pop_order_update(Request $request){
        $order_id = $request->input('order_id');
        $order = DB::table('mst_orders')
            ->join('mst_customers', 'mst_customers.customer_id', '=', 'mst_orders.customer_id')
            ->select('mst_orders.*', 'mst_customers.email')->where('order_id', $order_id)->first();

        $update_order_email = $order->email;
        $update_order_total = $order->total_price;
        $update_order_status = $order->order_status;
        $update_order_date = $order->created_at;
        $date = new Carbon( $update_order_date );
        $time = $date->year."-".$date->format('m-d').'T'.$date->hour.":".$date->minute;

        return response()->json([
            'update_order_email' => $update_order_email,
            'update_order_total' => $update_order_total,
            'update_order_status' => $update_order_status,
            'update_order_date' => $time,
        ]);

//        DB::table('users')
//            ->where('id', 1)
//            ->update(['votes' => 1]);
    }


    /**  Update Order ( ajax )
     * @param int order_id
     * @param datetime-local update_order_date
     * @param int update_order_status
     * @return: response view list_order with value $result(notifi)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function order_update(Request $request){
        $order_id = $request->input('order_id');
        $update_order_date = $request->input('update_order_date');
        $update_order_status = $request->input('update_order_status');
        $updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $result = DB::table('mst_orders')->where('order_id', $order_id)->update([
            'order_status' => $update_order_status,
            'created_at' => $update_order_date,
            'updated_at' => $updated_at
        ]);
        if($result){
            return response()->json([
                'result' => 'Đã update thành công!',
            ]);
        }
    }


    /**  Delete Order ( ajax )
     * @param int order_id
     * @return: response view list_order with value $result
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function order_delete(Request $request){
        $order_id = $request->input('order_id');
        $result = DB::table('mst_orders')->where('order_id', $order_id)->delete();
        if($result){
            return response()->json([
                'result' => 'Đã xóa thành công!'
            ]);
        }
    }

    /** Change payment( ajax )

     * @param int order_id
     * @return: response json with value $key (notifi)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function order_open_key(Request $request){
        $order_id = $request->input('order_id');
        $open_key = DB::table('mst_orders')->where('order_id', $order_id)->first();
        $key = $open_key->payment;
        if($key == 0){
            $result = DB::table('mst_orders')->where('order_id', $order_id)->update([
                'payment' => 1
            ]);
        }else{
            $result = DB::table('mst_orders')->where('order_id', $order_id)->update([
                'payment' => 0
            ]);
        }
        if($result){
            return response()->json([
                'key' => $key
            ]);
        }
    }

}
