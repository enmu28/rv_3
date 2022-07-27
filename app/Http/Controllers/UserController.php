<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mst_users;
use Auth;
use Validator;
use DB;
use Session;
use Response;
use Cookie;
use Carbon\Carbon;

class UserController extends Controller
{

    /**  Redirect Login

     * @return: response view login
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function getLogin(Request $request)
    {
//        $request->session()->pull('remember_token', 'default');
        if (session('remember_token')==1) {
            Session::put('title', 'User');
            return redirect()->route('users_manage');
        }
        else{
            return view('login');
        }
    }

    /**  Login

     * @param varchar email
     * @param varchar password
     * @param int remember
     * @return: response view home
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function postLogin(Request $request)
    {
        $messages = [
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Email chưa đúng định dạng!',
            'password.required' => 'Bạn chưa nhập Password!'
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            $messages
        );

        if ($validate->fails()) {
            return View('login')->withErrors($validate);
        } else {
            $remember= $request->input('remember');
            $email = $request->input('email');
            $password = $request->input('password');
            $arr = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];


//          Kiểm tra đăng nhập Auth
            if (Auth::guard('mst_user')->attempt($arr, $remember)) {
                $user = DB::table('mst_users')->where('email', $email)->first();
                $last_login_at = Carbon::now('Asia/Ho_Chi_Minh');
                $last_login_ip = $request->ip();
                DB::table('mst_users')->update(['last_login_at' => $last_login_at, 'last_login_ip'=> $last_login_ip]);

                if($request->input('remember')=='on'){
                    Session::put('remember_token', 1);
                }
                Session::put('user_name',$user->name);
                Session::put('title', 'User');
                return redirect()->route('users_manage');
            } else {
                return view('login', ['miss'=>'Đăng nhập sai thông tin!']);
            }
        }
    }
}
