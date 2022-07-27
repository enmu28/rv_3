<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin_Manage;
use App\Http\Controllers\Customer_Manage;
use App\Http\Controllers\Product_Manage;
use App\Http\Controllers\Order_Manage;
use App\Http\Controllers\OrderDetail_Manage;

use App\Http\Controllers\Shop\Shop;
use App\Http\Controllers\Shop\Product;
use App\Http\Controllers\Shop\News;
use App\Http\Controllers\Shop\Contact;
use App\Http\Controllers\Shop\Footer;
use App\Http\Controllers\Shop\Cart;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/', [UserController::class, 'getLogin']);
Route::post('admin/', [UserController::class, 'postLogin']);

Auth::routes();
Route::group(['middleware' => ['checklogin']], function() {
//    Route::get('user_1', [vidu::class, 'index'] )->name('user_1');
//    Route::get('customer_1', [vidu::class, 'customer_1'])->name('customer_1');
//    Route::get('product_1', [vidu::class, 'product_1'])->name('product_1');

    Route::get('admin/home', [Home::class, 'index'])->name('home');
    Route::get('admin/users', [Admin_Manage::class, 'index'])->name('users_manage');
    Route::get('admin/users/fetch_data', [Admin_Manage::class, 'fetch_data'])->name('fetch_data');
    Route::get('admin/search_user', [Admin_Manage::class, 'search_user'])->name('search_user');
    Route::get('admin/not_user', [Admin_Manage::class, 'not_user'])->name('not_user');
    Route::get('admin/search_drop', [Admin_Manage::class, 'search_drop'])->name('search_drop');

    Route::post('admin/pop_user_insert', [Admin_Manage::class, 'pop_user_insert'])
        ->name('pop_user_insert');
    Route::post('admin/pop_user_update', [Admin_Manage::class, 'pop_user_update'])
        ->name('pop_user_update');
    Route::post('admin/user_update', [Admin_Manage::class, 'user_update'])
        ->name('user_update');
    Route::post('admin/user_delete', [Admin_Manage::class, 'user_delete'])
        ->name('user_delete');
    Route::post('admin/user_open_key', [Admin_Manage::class, 'user_open_key'])
        ->name('user_open_key');

    //-------------------------------------------    CUSTOMER
    Route::get('admin/customer', [Customer_Manage::class, 'index'])->name('customers_manage');
    Route::get('admin/customer/fetch_data', [Customer_Manage::class, 'fetch_data'])->name('cs_fetch_data');
    Route::get('admin/search_customer', [Customer_Manage::class, 'search_customer'])->name('search_customer');
    Route::get('admin/not_customer', [Customer_Manage::class, 'not_customer'])->name('not_customer');
    Route::get('admin/cs_search_drop', [Customer_Manage::class, 'cs_search_drop'])->name('cs_search_drop');

    Route::post('admin/pop_customer_insert', [Customer_Manage::class, 'pop_customer_insert'])
        ->name('pop_customer_insert');
    Route::post('admin/cs_update', [Customer_Manage::class, 'cs_update'])
        ->name('cs_update');

    Route::post('admin/export_csv',[Customer_Manage::class, 'export_csv'])->name('export_csv');
    Route::get('admin/import',[Customer_Manage::class, 'import'])->name('import');
    Route::post('import_csv',[Customer_Manage::class, 'import_csv'])->name('import_csv');
    Route::post('admin/csv_insert_customer',[Customer_Manage::class, 'csv_insert_customer'])->name('csv_insert_customer');

    //-----------------------------------------    PRODUCT
    Route::get('admin/product', [Product_Manage::class, 'index'])->name('product_manage');
    Route::get('admin/product/fetch_data', [Product_Manage::class, 'fetch_data'])->name('pr_fetch_data');
    Route::get('admin/search_product', [Product_Manage::class, 'search_product'])->name('search_product');
    Route::get('admin/pr_search_drop', [Product_Manage::class, 'pr_search_drop'])->name('pr_search_drop');
    Route::get('admin/not_product', [Product_Manage::class, 'not_product'])->name('not_product');
    Route::post('admin/product_delete', [Product_Manage::class, 'product_delete'])->name('product_delete');
    Route::get('admin/edit_product', [Product_Manage::class, 'edit_product'])->name('edit_product');
    Route::get('admin/update_product/{id}', [Product_Manage::class, 'update_product'])->name('update_product');
    Route::post('admin/update2_product', [Product_Manage::class, 'update2_product'])->name('update2_product');
    Route::post('admin/insert_product', [Product_Manage::class, 'insert_product'])->name('insert_product');

    //----------------------------------------        ORDER
    Route::get('admin/order', [Order_Manage::class, 'index'])->name('order_manage');
    Route::get('admin/order/fetch_data', [Order_Manage::class, 'fetch_data'])->name('od_fetch_data');
    Route::get('admin/search_order', [Order_Manage::class, 'search_order'])->name('search_order');
    Route::get('admin/not_order', [Order_Manage::class, 'not_order'])->name('not_order');
    Route::get('admin/od_search_drop', [Order_Manage::class, 'od_search_drop'])->name('od_search_drop');
    Route::post('admin/pop_order_update', [Order_Manage::class, 'pop_order_update'])
        ->name('pop_order_update');
    Route::post('admin/order_update', [Order_Manage::class, 'order_update'])
        ->name('order_update');
    Route::post('admin/order_delete', [Order_Manage::class, 'order_delete'])
        ->name('order_delete');
    Route::post('admin/order_open_key', [Order_Manage::class, 'order_open_key'])
        ->name('order_open_key');

    //-----------------------------------------        ORDER DETAIL
    Route::get('admin/order_detail/{order_id}', [OrderDetail_Manage::class, 'index'])->name('order_detail');
    Route::post('admin/order_detail_update', [OrderDetail_Manage::class, 'order_detail_update'])->name('order_detail_update');
    Route::get('admin/order_update_list', [OrderDetail_Manage::class, 'order_update_list'])->name('order_update_list');
    Route::get('admin/print_PDF/{order_id}', [OrderDetail_Manage::class, 'print_PDF'])->name('print_PDF');
});


Route::namespace('Shop')->group(function(){
    Route::get('/', [Shop::class, 'index'])->name('shop_home');
    Route::get('/total_online', [Shop::class, 'total_online'])->name('total_online');

    Route::get('category_product', [Product::class, 'category_product'])->name('shop_category_product');
    Route::get('search_product', [Product::class, 'search_product'])->name('shop_search_product');
    Route::get('/product/fetch_data', [Product::class, 'fetch_data'])->name('shop_fetch_data');
    Route::get('product/{slug}', [Product::class, 'product_detail'])->name('shop_product_detail');

    Route::get('news', [News::class, 'index'])->name('shop_news');
    Route::get('news/category_post', [News::class, 'category_post'])->name('shop_category_post');
    Route::get('news/{name}', [News::class, 'news'])->name('shop_news_');

    Route::get('contact', [Contact::class, 'index'])->name('shop_contact');
    Route::post('send_contact', [Contact::class, 'send_contact'])->name('send_contact');

    Route::get('gioi-thieu', [Footer::class, 'introduce'])->name('introduce');
    Route::get('dieu-khoan', [Footer::class, 'conditions'])->name('conditions');
    Route::get('chinh-sach', [Footer::class, 'policy'])->name('policy');


    Route::post('into_cart', [Cart::class, 'into_cart'])->name('into_cart');
    Route::get('cart', [Cart::class, 'cart'])->name('cart');
    Route::get('cart_handling', [Cart::class, 'cart_handling'])->name('cart_handling');
    Route::post('pay', [Cart::class, 'pay'])->name('pay');
});

Route::get('z', function(Request $request){
//    $request->session()->forget('cart');
    dd(session('cart'));
});
