<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Imports\Imports;
use App\Exports\Exports;
use Excel;
use Session;

class Customer_Manage extends Controller
{
    /**  Page Customer

 * @return: response view customer
 * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
 * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
 */
    public function index(){
        $customer = DB::table('mst_customers')->orderBy('customer_id', 'desc')
            ->paginate(10);
        $total_customer = DB::table('mst_customers')->count();
        Session::put('title', 'Customer');
        return view('customer_1', ['customer'=>$customer, 'total_customer'=>$total_customer]);
    }

    /**  Pagination for page Customer ( ajax )

     * @return: response view list_customer
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $customer = DB::table('mst_customers')->orderBy('customer_id', 'desc')
                ->paginate(10);
            $total_customer = DB::table('mst_customers')->count();
            return view('list_customer', ['customer'=>$customer, 'total_customer'=>$total_customer])->render();
        }
    }


    /**  Search for page Customer ( ajax )

     * @param varchar cs_search_name
     * @param varchar cs_search_email
     * @param varchar cs_search_address
     * @param int cs_search_status
     * @return: response view list_customer with key_search
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function search_customer(Request $request){
        $cs_search_name = $request->input('cs_search_name');
        $cs_search_email = $request->input('cs_search_email');
        $cs_search_status = $request->input('cs_search_status');
        $cs_search_address = $request->input('cs_search_address');

        $query = DB::table('mst_customers')->orderBy('customer_id', 'desc');
        if(isset($cs_search_name)){
            $query = $query->where('customer_name', 'like', '%'.$cs_search_name.'%');
        }
        if(isset($cs_search_email)){
            $query = $query->where('email', 'like', '%'.$cs_search_email.'%');
        }
        if($cs_search_status != "Null"){
            $query = $query->where('is_active', $cs_search_status);
        }
        if(isset($cs_search_address)){
            $query = $query->where('address', 'like', '%'.$cs_search_address.'%');
        }
        $customer = $query->paginate(10);
//        dd($customer);
        $total_customer = $query->count();
        return view('list_customer', ['customer'=>$customer, 'total_customer'=>$total_customer]);
    }


    /**  Not search ( ajax )

     * @return: response view not_customer
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function not_customer(){
        return view('not_customer');
    }


    /** Search drop ( ajax )

     * @return: response view list_customer
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function cs_search_drop(){
        $customer = DB::table('mst_customers')->orderBy('customer_id', 'desc')
            ->paginate(10);
        $total_customer = DB::table('mst_customers')->count();
        return view('list_customer', ['customer'=>$customer, 'total_customer'=>$total_customer]);
    }


    /**  Insert Customer ( ajax )

     * @param varchar pop_customer_name
     * @param varchar email
     * @param varchar pop_customer_phone
     * @param varchar pop_customer_address
     * @param int pop_customer_status
     * @return: response view list_customer with result new
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function pop_customer_insert(Request $request){
        $pop_customer_name = $request->input('pop_customer_name');
        $email = $request->input('email');
        $pop_customer_phone = $request->input('pop_customer_phone');
        $pop_customer_address = $request->input('pop_customer_address');
        $pop_customer_status = $request->input('pop_customer_status');

//        dd($request->all());
        $messages = [
            'pop_customer_name.required' => 'Bạn chưa nhập Họ Tên!',
            'pop_customer_name.min' => 'Họ Tên không dưới 5 ký tự!',
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Email chưa đúng định dạng!',
            'email.unique' => 'Email đã tồn tại!',
            'pop_customer_phone.required' => 'Bạn chưa nhập SĐT!',
            'pop_customer_phone.regex' => 'Sai định dạng - SĐT VN!',
            'pop_customer_address.required' => 'Địa chỉ không để trống!',
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'pop_customer_name' => 'required|min:5',
                'email' => 'required|email|unique:mst_customers',
                'pop_customer_phone' => 'required|regex:/(09)[0-9]{8}/',
                'pop_customer_address' => 'required',
            ],
            $messages
        );

        if ($validate->fails()) {
            return response()->json([
                'messenge' => $validate->errors(),
            ]);
        }
        else{
            $created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $result = DB::table('mst_customers')->insert([
                'customer_name' => $pop_customer_name,
                'email' => $email,
                'tel_num' => $pop_customer_phone,
                'address' => $pop_customer_address,
                'is_active' => $pop_customer_status,
                'created_at' => $created_at
            ]);
            if($result){
                return response()->json([
                    'result' => 'Đã thêm thành công!',
                ]);
            }
        }
    }


    /**  Update Customer ( ajax )

     * @param int cs_id
     * @param varchar name
     * @param varchar address
     * @param varchar tel_num
     * @return: response view list_customer with result new
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function cs_update(Request $request){
        $id = $request->input('cs_id');
        $name = $request->input('name');
        $address = $request->input('address');
        $tel_num = $request->input('tel_num');
        $updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $messages = [
            'name.required' => 'Bạn chưa nhập Họ Tên!',
            'name.min' => 'Họ Tên không dưới 5 ký tự!',
            'tel_num.required' => 'Bạn chưa nhập SĐT!',
            'tel_num.regex' => 'Sai định dạng - SĐT VN!',
            'address.required' => 'Địa chỉ không để trống!',
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:5',
                'tel_num' => 'required|regex:/(09)[0-9]{8}/',
                'address' => 'required',
            ],
            $messages
        );

        if ($validate->fails()) {
            return response()->json([
                'messenge' => $validate->errors(),
            ]);
        }
        else{
            $result = DB::table('mst_customers')->where('customer_id', $id)->update([
                'customer_name' => $name,
                'address' => $address,
                'tel_num' => $tel_num,
                'updated_at' => $updated_at
            ]);
            if($result){
                return response()->json([
                    'result' => 'Đã thêm thành công!',
                ]);
            }
        }
    }



    /**  Download file CSV
     *
     * @return: download file CSV
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function export_csv(){
        return Excel::download(new Exports , 'customers.xlsx');
    }



    /**  Redirect to page Import Customer

     * @return: response view imports
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function import(){
        DB::table('mst_imports')->where('is_active', 1)->delete();
        return view('imports');
    }



    /**  Import file CSV, insert value to Table mst_imports

     * @return: response view list_imports with result new
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function import_csv(Request $request){
        DB::table('mst_imports')->where('is_active', 1)->delete();
        $path = $request->file('file')->getRealPath();
        Excel::import(new Imports, $path);
        $customer = DB::table('mst_imports')->get();
        return view('list_imports', ['customer'=>$customer]);
    }



    /**  Insert Customer from file CSV ( ajax )

     * @param int id
     * @param varchar cs_name
     * @param varchar email
     * @param varchar cs_address
     * @param varchar cs_tel_num
     * @return: response view list_imports with result new
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function csv_insert_customer(Request $request){
        $id = $request->input('id');
        $cs_name = $request->input('cs_name');
        $email = $request->input('email');
        $cs_address = $request->input('cs_address');
        $cs_tel_num = $request->input('cs_tel_num');
//        dd($request->all());
        $messages = [
            'cs_name.required' => 'Bạn chưa nhập Họ Tên!',
            'cs_name.min' => 'Họ Tên không dưới 5 ký tự!',
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Email chưa đúng định dạng!',
            'email.unique' => 'Email đã tồn tại!',
            'cs_tel_num.required' => 'Bạn chưa nhập SĐT!',
            'cs_tel_num.regex' => 'Sai định dạng - SĐT VN!',
            'address.required' => 'Địa chỉ không để trống!',
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'cs_name' => 'required|min:5',
                'email' => 'required|email|unique:mst_customers',
                'cs_address' => 'required',
                'cs_tel_num' => 'required|regex:/(09)[0-9]{8}/',
            ],
            $messages
        );
        if ($validate->fails()) {
            return response()->json([
                'messenge' => $validate->errors(),
            ]);
        }
        else{
            $created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $result = DB::table('mst_customers')->insert([
                'customer_name' => $cs_name,
                'email' => $email,
                'tel_num' => $cs_tel_num,
                'address' => $cs_address,
                'created_at' => $created_at
            ]);
            if($result){
                DB::table('mst_imports')->where('id', $id)->delete();
                $customer = DB::table('mst_imports')->get();
                return view('list_imports_1', ['customer'=>$customer]);
            }
        }
    }
}
