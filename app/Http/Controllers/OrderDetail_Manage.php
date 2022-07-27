<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use PDF;

class OrderDetail_Manage extends Controller
{
    /**  Page Order Details
     * @param int order_id
     * @return: response view customer
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function index($order_id){

        $list_product = DB::table('mst_order_detail')
            ->join('mst_product', 'mst_product.product_id', '=', 'mst_order_detail.product_id')
            ->where('mst_order_detail.order_id', $order_id)
            ->select('mst_order_detail.*', 'mst_product.product_name')
            ->paginate(5);
        $detail = DB::table('mst_orders')
            ->join('mst_customers', 'mst_customers.customer_id', '=', 'mst_orders.customer_id')
            ->where('mst_orders.order_id', $order_id)
            ->select('mst_orders.*', 'mst_customers.customer_name', 'mst_customers.email', 'mst_customers.tel_num', 'mst_customers.address')
            ->first();
        return view('order_detail_1', ['list_product'=> $list_product, 'detail'=> $detail]);
    }

    /**  Update Order Detail ( ajax )

     * @param int odd_id
     * @param varchar odd_name
     * @param varchar odd_note
     * @param int odd_status
     * @param int odd_payment
     * @param varchar odd_address
     * @param varchar odd_phone
     * @return: response view list_customer with result new
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function order_detail_update(Request $request){
//        dd($request->all());
        $odd_id = $request->input('odd_id');
        $odd_name = $request->input('odd_name');
        $odd_note = $request->input('odd_note');
        $odd_status = $request->input('odd_status');
        $odd_payment = $request->input('odd_payment');
        $odd_address = $request->input('odd_address');
        $odd_phone = $request->input('odd_phone');
        $messages = [
            'odd_name.required' => 'Họ tên không để trống!',
            'odd_address.required' => 'Địa chỉ không để trống!',
            'odd_phone.required' => 'Bạn chưa nhập SĐT!',
            'odd_phone.regex' => 'Sai định dạng - SĐT VN!',
        ];

        $validate = Validator::make(
            $request->all(),
            [
                'odd_name' => 'required',
                'odd_address' => 'required',
                'odd_phone' => 'required|regex:/(09)[0-9]{8}/',
            ],
            $messages
        );
        if ($validate->fails()) {
            return response()->json([
                'messenge' => $validate->errors(),
            ]);
        }
        else{
            $updated_at = Carbon::now('Asia/Ho_Chi_Minh');

            $customer = DB::table('mst_orders')->where('order_id', $odd_id)->first();
            $customer_id = $customer->customer_id;
            $result = DB::table('mst_customers')->where('customer_id', $customer_id)->update([
                'customer_name' => $odd_name,
                'address' => $odd_address,
                'tel_num' => $odd_phone,
            ]);
            $result_1 = DB::table('mst_orders')->where('order_id', $odd_id)->update([
                'note_customer' => $odd_note,
                'order_status' => $odd_status,
                'payment' => $odd_payment
            ]);
            return response()->json([
                'result' => 'Đã sửa thành công!',
            ]);
        }
    }

    /** Update list when update order_detail ( ajax )
     * @param: int odd_id
     * @return: response view list_customer
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function order_update_list(Request $request){
        $order_id = $request->input('odd_id');
        $detail = DB::table('mst_orders')
            ->join('mst_customers', 'mst_customers.customer_id', '=', 'mst_orders.customer_id')
            ->where('mst_orders.order_id', $order_id)
            ->select('mst_orders.*', 'mst_customers.customer_name', 'mst_customers.email', 'mst_customers.tel_num', 'mst_customers.address')
            ->first();
        return view('list_order_detail', ['detail'=> $detail]);
    }


    /** print file PDF
     * @param: int order_id
     * @return: response view list_customer
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function print_PDF($order_id){
        $list_product = DB::table('mst_order_detail')
            ->join('mst_product', 'mst_product.product_id', '=', 'mst_order_detail.product_id')
            ->where('mst_order_detail.order_id', $order_id)
            ->select('mst_order_detail.*', 'mst_product.product_name')
            ->get();
        $detail = DB::table('mst_orders')
            ->join('mst_customers', 'mst_customers.customer_id', '=', 'mst_orders.customer_id')
            ->where('mst_orders.order_id', $order_id)
            ->select('mst_orders.*', 'mst_customers.customer_name', 'mst_customers.email', 'mst_customers.tel_num', 'mst_customers.address')
            ->first();
        $pdf = PDF::loadView('pdf_order_detail',  ['list_product'=>$list_product, 'detail'=>$detail]);
        return $pdf->download('order_detail.pdf');
    }
}
