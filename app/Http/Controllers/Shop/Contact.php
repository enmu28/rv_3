<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;

class Contact extends Controller
{
    /**  Page Contact

     * @return: response view contact
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function index(){
        $total = $this->total_online();
        return view('shop.contact', ['total'=> $total]);
    }

    /**  Send Contact ( ajax )

     * @param varchar ho_ten
     * @param varchar email
     * @param varchar sdt
     * @param varchar dia_chi
     * @param varchar noi_dung
     * @return: response messege (errors and success)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function send_contact(Request $request){
        $ho_ten = $request->input('ho_ten');
        $email = $request->input('email');
        $sdt = $request->input('sdt');
        $dia_chi = $request->input('dia_chi');
        $noi_dung = $request->input('noi_dung');

        $messages = [
            'ho_ten.required' => 'Bạn chưa nhập Họ Tên!',
            'ho_ten.min' => 'Họ Tên không dưới 5 ký tự!',
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Email chưa đúng định dạng!',
            'sdt.required' => 'Bạn chưa nhập SĐT!',
            'sdt.regex' => 'Sai định dạng - SĐT VN!',
            'dia_chi.required' => 'Địa chỉ không để trống!',
            'noi_dung.required' => 'Nội dung không để trống!',
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'ho_ten' => 'required|min:5',
                'email' => 'required|email',
                'sdt' => 'required|regex:/(09)[0-9]{8}/',
                'dia_chi' => 'required',
                'noi_dung' => 'required',
            ],
            $messages
        );

        if ($validate->fails()) {
            return response()->json([
                'messenge' => $validate->errors(),
            ]);
        }
        else{
            DB::table('mst_contact')->insert([
                'contact_name' => $ho_ten,
                'contact_email' => $email,
                'contact_address' => $dia_chi,
                'contact_phone' => $sdt,
                'content' => $noi_dung,
                'created_date' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
        }
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
