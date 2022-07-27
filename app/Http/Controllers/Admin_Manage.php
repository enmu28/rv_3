<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use phpDocumentor\Reflection\Types\Null_;
use Session;

class Admin_Manage extends Controller
{
    /**  Page User View

     * @return: response view user
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function index(){
        $user = DB::table('mst_users')->where('is_delete', 1)->orderBy('id', 'desc')
            ->paginate(10);
        $total_user = DB::table('mst_users')->count();
        Session::put('title', 'Users');
        return view('user_1', ['user'=>$user, 'total_user'=>$total_user]);
    }


    /**  Pagination for page User ( ajax )

     * @return: response view list_user
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $user = DB::table('mst_users')->where('is_delete', 1)->orderBy('id', 'desc')
                ->paginate(10);
            $total_user = DB::table('mst_users')->where('is_delete', 1)->count();
            return view('list_user', ['user'=>$user, 'total_user'=>$total_user])->render();
        }
    }


    /**  Search for page User ( ajax )

     * @param varchar search_name
     * @param varchar search_email
     * @param int search_group
     * @param int search_status
     * @return: response view list_user with key_search
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function search_user(Request $request){
        $search_name = $request->input('search_name');
        $search_email = $request->input('search_email');
        $search_group = $request->input('search_group');
        $search_status = $request->input('search_status');

        $query = DB::table('mst_users')->where('is_delete', 1)->orderBy('id', 'desc');
        if(isset($search_name)){
            $query = $query->where('name', 'like', '%'.$search_name.'%');
        }
        if(isset($search_email)){
            $query = $query->where('email', 'like', '%'.$search_email.'%');
        }
        if($search_group != "Null"){
            $query = $query->where('group_role', $search_group);
        }
        if($search_status != "Null"){
            $query = $query->where('is_active', $search_status);
        }
        $user = $query->paginate(10);
        $total_user = DB::table('mst_users')->where('is_delete', 1)->count();
        return view('list_user', ['user'=>$user, 'total_user'=>$total_user]);
    }

    /** Search drop ( ajax )

     * @return: response view list_user
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function search_drop(){
        $user = DB::table('mst_users')->where('is_delete', 1)->orderBy('id', 'desc')
            ->paginate(10);
        $total_user = DB::table('mst_users')->where('is_delete', 1)->count();
        return view('list_user', ['user'=>$user, 'total_user'=>$total_user]);
    }


    /**  Not search ( ajax )

     * @return: response view not_user
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function not_user(){
        return view('not_user');
    }


    /**  Insert User ( ajax )

     * @param varchar pop_user_name
     * @param varchar email
     * @param varchar pop_user_password
     * @param varchar pop_user_pw
     * @param int pop_user_group
     * @return: response view list_user with result new
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function pop_user_insert(Request $request){
        $pop_user_name = $request->input('pop_user_name');
        $email = $request->input('email');
        $pop_user_password = $request->input('pop_user_password');
        $pop_user_pw = $request->input('pop_user_pw');
        $pop_user_group = $request->input('pop_user_group');

//        dd($request->all());
        $messages = [
            'pop_user_name.required' => 'Bạn chưa nhập Họ Tên!',
            'pop_user_name.min' => 'Họ Tên không dưới 5 ký tự!',
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Email chưa đúng định dạng!',
            'email.unique' => 'Email đã tồn tại!',
            'pop_user_password.required' => 'Bạn chưa nhập Password!',
            'pop_user_password.regex' => 'Nhập sai định dạng Password!',
            'pop_user_pw.required' => 'Bạn chưa xác nhậnPassword!',
            'pop_user_pw.same' => 'Bạn nhập không giống Password!'
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'pop_user_name' => 'required|min:5',
                'email' => 'required|email|unique:mst_users',
                'pop_user_password' => 'required|regex:/(?=.*\d).{5,}/',
                'pop_user_pw' => 'required|same:pop_user_password',
            ],
            $messages
        );

        if ($validate->fails()) {
            return response()->json([
                'messenge' => $validate->errors(),
            ]);
        }else{
            $created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $result = DB::table('mst_users')->insert([
                'name' => $pop_user_name,
                'email' => $email,
                'password' => $pop_user_password,
                'group_role' => $pop_user_group,
                'last_login_at' => 'Null',
                'last_login_ip' => 'Null',
                'created_at' => $created_at
            ]);
            if($result){
                return response()->json([
                    'result' => 'Đã thêm thành công!',
                ]);
            }
        }
    }


    /**  Update User ( ajax )

     * @param int user_id
     * @return: response value for popup Update User
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function pop_user_update(Request $request){
        $user_id = $request->input('user_id');
        $user = DB::table('mst_users')->where('id', $user_id)->first();

        $name = $user->name;
        $email = $user->email;
        $password = $user->password;
        $group_role = $user->group_role;
        $is_active = $user->is_active;


        return response()->json([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'group_role' => $group_role,
            'is_active' => $is_active
        ]);

    }


    /**  Update User ( ajax )

     * @param int id
     * @param varchar pop_user_name
     * @param varchar email
     * @param varchar pop_user_password
     * @param int pop_user_group
     * @return: response view list_user with value $result(notifi)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function user_update(Request $request){
        $id = $request->input('id');
        $pop_user_name = $request->input('pop_user_name');
        $email = $request->input('email');
        $pop_user_password = $request->input('pop_user_password');
        $pop_user_group = $request->input('pop_user_group');

        $messages = [
            'pop_user_name.required' => 'Bạn chưa nhập Họ Tên!',
            'pop_user_name.min' => 'Họ Tên không dưới 5 ký tự!',
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Email chưa đúng định dạng!',
            'pop_user_password.required' => 'Bạn chưa nhập Password!',
            'pop_user_password.regex' => 'Nhập sai định dạng Password!',
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'pop_user_name' => 'required|min:5',
                'email' => 'required|email',
                'pop_user_password' => 'required|regex:/(?=.*\d).{5,}/',
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
            $result = DB::table('mst_users')->where('id', $id)->update([
                'name' => $pop_user_name,
                'email' => $email,
                'password' => $pop_user_password,
                'group_role' => $pop_user_group,
                'updated_at' => $updated_at
            ]);
            if($result){
                return response()->json([
                    'result' => 'Đã update thành công!',
                ]);
            }
        }
    }


    /**  Delete User ( ajax )

     * @param int id
     * @return: response view list_user with value $messenge_delete
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function user_delete(Request $request){
        $id = $request->input('id');
        $result = DB::table('mst_users')->where('id', $id)->delete();
        if($result){
            return response()->json([
                'messenge_delete' => 'Đã xóa thành công!'
            ]);
        }
    }

    /** Open key User( ajax )

     * @param int id
     * @return: response json with value $key (notifi)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function user_open_key(Request $request){
        $id = $request->input('id');
        $open_key = DB::table('mst_users')->where('id', $id)->first();
        $key = $open_key->is_active;
        if($key == 0){
            $result = DB::table('mst_users')->where('id', $id)->update([
                'is_active' => 1
            ]);
        }else{
            $result = DB::table('mst_users')->where('id', $id)->update([
                'is_active' => 0
            ]);
        }
        if($result){
            return response()->json([
                'key' => $key
            ]);
        }
    }
}
