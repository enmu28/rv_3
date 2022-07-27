<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use Storage;
use Session;

class Product_Manage extends Controller
{
    /**  Page Product

     * @return: response view product
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function index(){
        $product = DB::table('mst_product')->orderBy('product_id', 'desc')
            ->paginate(10);
        $total_product = DB::table('mst_product')->count();
        Session::put('title', 'Product');
        return view('product_1', ['product'=>$product, 'total_product'=>$total_product]);
    }

    /**  Pagination for page Product ( ajax )

     * @return: response view list_product
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $product = DB::table('mst_product')->orderBy('product_id', 'desc')
                ->paginate(10);
            $total_product = DB::table('mst_product')->count();
            return view('list_product', ['product'=>$product, 'total_product'=>$total_product])->render();
        }
    }


    /**  Search for page Product ( ajax )

     * @param varchar pr_search_name
     * @param int pr_search_status
     * @param int pr_search_price_1
     * @param int pr_search_price_2
     * @return: response view list_product with key_search
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function search_product(Request $request){
        $pr_search_name = $request->input('pr_search_name');
        $pr_search_status = $request->input('pr_search_status');
        $pr_search_price_1 = $request->input('pr_search_price_1');
        $pr_search_price_2 = $request->input('pr_search_price_2');

        $query = DB::table('mst_product')->orderBy('product_id', 'desc');
        if(isset($pr_search_name)){
            $query = $query->where('product_name', 'like', '%'.$pr_search_name.'%');
        }
        if($pr_search_status != "Null"){
            $query = $query->where('is_sales', $pr_search_status);
        }
        if(isset($pr_search_price_1)){
            $query = $query->where('product_price', '>=', $pr_search_price_1);
        }
        if(isset($pr_search_price_2)){
            $query = $query->where('product_price', '<=', $pr_search_price_2);
        }
        $product = $query->paginate(10);
        $total_product = DB::table('mst_product')->count();
        return view('list_product', ['product'=>$product, 'total_product'=>$total_product]);
    }


    /** Search drop ( ajax )

     * @return: response view list_product
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function pr_search_drop(){
        $product = DB::table('mst_product')->orderBy('product_id', 'desc')
            ->paginate(10);
        $total_product = DB::table('mst_product')->count();
        return view('list_product', ['product'=>$product, 'total_product'=>$total_product]);
    }


    /**  Not search ( ajax )

     * @return: response view not_product
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function not_product(){
        return view('not_product');
    }


    /**  Delete Product ( ajax )

     * @param int id
     * @return: response view list_product with value $messenge_delete (notifi)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function product_delete(Request $request){
        $id = $request->input('id');
        $result = DB::table('mst_product')->where('product_id', $id)->delete();
        if($result){
            return response()->json([
                'messenge_delete' => 'Đã xóa thành công!'
            ]);
        }
    }


    /**  Return view Edit Product ( ajax )

     * @return: response view edit_product
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function edit_product(Request $request){
        return view('edit_product');
    }


    /**  Insert Product ( ajax )

     * @param varchar edit_product_name
     * @param varchar description
     * @param file image_file
     * @param int edit_product_price
     * @param int edit_product_status
     * @return: response view edit product with value $result (notifi)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function insert_product(Request $request){
        $edit_product_name = $request->input('edit_product_name');
        $description = $request->input('description');
        $image_file = $request->file('image_file');
        $edit_product_price = $request->input('edit_product_price');
        $edit_product_status = $request->input('edit_product_status') == 0 ? 0 : 1;
//        dd($request->all());
        $messages = [
            'edit_product_name.required' => 'Tên sản phẩm không được bỏ trống!',
            'edit_product_price.required' => 'Nhập giá sản phẩm!',
            'edit_product_price.min' => 'Gía bán không được nhỏ hơn 0!',
            'image_file.mimes' => 'Không phải định dạng jpeg, png, jpg',
            'image_file.max' => 'Dung lượng nhỏ hơn 2Mb',
            'image_file.dimensions' => 'Kích thước không quá 1024px'
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'edit_product_price' => 'required|min:2',
                'edit_product_name' => 'required',
                'image_file' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=1024,max_height=1024'
            ],
            $messages
        );
//        dd($validate);
        if ($validate->fails()) {
            return redirect('edit_product')
                ->withErrors($validate);
//                ->withInput();
        }
        else{
            $created_at = Carbon::now('Asia/Ho_Chi_Minh');
            if($request->hasFile('image_file')){
                $storedPath = $image_file->move('image', $image_file->getClientOriginalName());
                $result = DB::table('mst_product')->insert([
                    'product_name' => $edit_product_name,
                    'product_image' => $image_file->getClientOriginalName(),
                    'product_price' => $edit_product_price,
                    'description' => $description,
                    'is_sales' => $edit_product_status,
                    'created_at' => $created_at
                ]);
                if($result){
                    return view('edit_product', ['result'=> 'Đã thêm thành công!']);
                }
            }else{
                $result = DB::table('mst_product')->insert([
                    'product_name' => $edit_product_name,
                    'product_price' => $edit_product_price,
                    'description' => $description,
                    'is_sales' => $edit_product_status,
                    'created_at' => $created_at
                ]);
                if($result){
                    return view('edit_product', ['result'=> 'Đã thêm thành công!']);
                }
            }
        }
    }

    /**  Insert value for view Update_Product

     * @param int id
     * @return: data response view update_product with values
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function update_product($id){
        $product = DB::table('mst_product')->where('product_id', $id)->first();
        $product_name = $product->product_name;
        $product_image = $product->product_image;
        $product_price = $product->product_price;
        $product_id = $id;
        $description = $product->description;
        $is_sales = $product->is_sales;
//        dd($product);
        return view('update_product', ['product_id'=> $product_id, 'product_name'=> $product_name, 'product_image'=>$product_image,
            'product_price'=>$product_price, 'description'=>$description, 'is_sales'=>$is_sales]);
    }

    /**  Update Product

     * @param Request $request
     * @return: data response view update_product with value $result (notifi)
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    public function update2_product(Request $request){
        $id = $request->input('product_id');
        $edit_product_name = $request->input('edit_product_name');
        $description = $request->input('description');
        $image_file = $request->file('image_file');
        $edit_product_price = $request->input('edit_product_price');
        $edit_product_status = $request->input('edit_product_status') == 0 ? 0 : 1;
//        dd($request->all());
        $messages = [
            'edit_product_name.required' => 'Tên sản phẩm không được bỏ trống!',
            'edit_product_price.required' => 'Nhập giá sản phẩm!',
            'edit_product_price.min' => 'Gía bán không được nhỏ hơn 0!',
            'image_file.mimes' => 'Không phải định dạng jpeg, png, jpg',
            'image_file.max' => 'Dung lượng lớn hơn 2Mb',
            'image_file.dimensions' => 'Kích thước không quá 1024px'
        ];
        $validate = Validator::make(
            $request->all(),
            [
                'edit_product_price' => 'required|min:2',
                'edit_product_name' => 'required',
                'image_file' => 'mimes:jpeg,png,jpg|max:2048|dimensions:max_width=1024,max_height=1024'
            ],
            $messages
        );
//        dd($validate);
        if ($validate->fails()) {
            $route = 'update_product/'.$id;
            return redirect($route)
                ->withErrors($validate);
//                ->withInput();
        }
        else{
            $updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            if($request->hasFile('image_file')){
                $storedPath = $image_file->move('image', $image_file->getClientOriginalName());
                $result = DB::table('mst_product')->where('product_id', $id)->update([
                    'product_name' => $edit_product_name,
                    'product_image' => $image_file->getClientOriginalName(),
                    'product_price' => $edit_product_price,
                    'description' => $description,
                    'is_sales' => $edit_product_status,
                    'updated_at' => $updated_at
                ]);
                if($result){
                    return view('update_product', ['result'=> 'Đã update thành công!']);
                }
            }else{
                $result = DB::table('mst_product')->where('product_id', $id)->update([
                    'product_name' => $edit_product_name,
                    'product_price' => $edit_product_price,
                    'product_image' => '',
                    'description' => $description,
                    'is_sales' => $edit_product_status,
                    'updated_at' => $updated_at
                ]);
                if($result){
                    return view('update_product', ['result'=> 'Đã update thành công!']);
                }
            }
        }
    }
}
