<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('mst_order_detail')->insert([
//            'name' => 'Nguyen Van B',
//            'email' => 'ad@gmail.com',
//            'password' => bcrypt('12345'),
//            'group_role' => '1',
//            'last_login_at' => '0',
//            'last_login_ip' => '0'
//        ]);
//        DB::table('mst_product_catagory')->insert([
//            [
//                'name' => 'Rau',
//                'id_parent' => 0,
//            ],
//            [
//                'name' => 'Củ',
//                'id_parent' => 0,
//            ],
//            [
//                'name' => 'Quả',
//                'id_parent' => 0,
//            ],
//            [
//                'name' => 'Đồ đông lạnh',
//                'id_parent' => 0,
//            ],
//            [
//                'name' => 'Thịt',
//                'id_parent' => 4,
//            ],
//            [
//                'name' => 'Cá',
//                'id_parent' => 4,
//            ],
//                [
//                'name' => 'Cua',
//                'id_parent' => 4,
//            ],
//            [
//                'name' => 'Đồ uống',
//                'id_parent' => 0,
//            ],
//            [
//                'name' => 'Có ga',
//                'id_parent' => 8,
//            ],
//            [
//                'name' => 'Không ga',
//                'id_parent' => 8,
//            ],
//        ]);

//        DB::table('mst_product')->insert([
//            [
//                'product_name' => 'Quả Cherry',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_cherry.jpg',
//                'season' => 9,
//                'slug' => Str::of('Quả Cherry')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:43'
//            ],
//            [
//                'product_name' => 'Quả Nhãn',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_nhan.jpg',
//                'season' => 9,
//                'slug' => Str::of('Quả Nhãn')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:44'
//            ],
//            [
//                'product_name' => 'Quả Na',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_na.jpg',
//                'season' => 9,
//                'slug' => Str::of('Quả Na')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:45'
//            ],
//            [
//                'product_name' => 'Quả Lê',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_le.jpg',
//                'season' => 9,
//                'slug' => Str::of('Quả Lê')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:46'
//            ],
//            [
//                'product_name' => 'Quả Khế',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_khe.jpg',
//                'season' => 7,
//                'slug' => Str::of('Quả Khế')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:47'
//            ],
//            [
//                'product_name' => 'Quả Cọ',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_coj.jpg',
//                'season' => 4,
//                'slug' => Str::of('Quả Cọ')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:48'
//            ],
//            [
//                'product_name' => 'Quả Việt Quất',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_viet_quat.jpg',
//                'season' => 4,
//                'slug' => Str::of('Quả Việt Quất')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:49'
//            ],
//            [
//                'product_name' => 'Quả Khóm',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_khom.jpg',
//                'season' => 5,
//                'slug' => Str::of('Quả Khóm')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:50'
//            ],
//            [
//                'product_name' => 'Quả Vú Sữa',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_vu_sua.jpg',
//                'season' => 4,
//                'slug' => Str::of('Quả Vú Sữa')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:51'
//            ],
//            [
//                'product_name' => 'Quả Cam',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_cam.jpg',
//                'season' => 5,
//                'slug' => Str::of('Quả Cam')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:52'
//            ],
//            [
//                'product_name' => 'Quả Bơ',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_bo.jpg',
//                'season' => 6,
//                'slug' => Str::of('Quả Bơ')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:53'
//            ],
//            [
//                'product_name' => 'Quả Chôm Chôm',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_chom_chom.jpg',
//                'season' => 6,
//                'slug' => Str::of('Quả Chôm Chôm')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:54'
//            ],
//            [
//                'product_name' => 'Quả Táo',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'qua_tao.jpg',
//                'season' => 7,
//                'slug' => Str::of('Quả Táo')->slug('-'),
//                'catagory_id' => 3,
//                'created_at' => '2021-9-13 21:15:55'
//            ],
//            [
//            'product_name' => 'Củ Cải',
//            'product_price' => 2500,
//            'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//            'product_image' => 'cu_cai.jpg',
//            'season' => 7,
//            'slug' => Str::of('Củ Cải')->slug('-'),
//            'catagory_id' => 2,
//            'created_at' => '2021-9-13 21:15:56'
//             ],
//            [
//                'product_name' => 'Củ Gừng',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'cu_gung.jpg',
//                'season' => 7,
//                'slug' => Str::of('Củ Gừng')->slug('-'),
//                'catagory_id' => 2,
//                'created_at' => '2021-9-13 21:15:57'
//            ],
//            [
//                'product_name' => 'Củ Hành Tây',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'cu_hanh_tay.jpg',
//                'season' => 8,
//                'slug' => Str::of('Củ Hành Tây')->slug('-'),
//                'catagory_id' => 2,
//                'created_at' => '2021-9-13 21:15:58'
//            ],
//            [
//                'product_name' => 'Củ Lang',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'cu_lang.jpg',
//                'season' => 8,
//                'slug' => Str::of('Củ Lang')->slug('-'),
//                'catagory_id' => 2,
//                'created_at' => '2021-9-13 21:15:59'
//            ],
//            [
//                'product_name' => 'Củ Lun',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'cu_lun.jpg',
//                'season' => 8,
//                'slug' => Str::of('Củ Lun')->slug('-'),
//                'catagory_id' => 2,
//                'created_at' => '2021-9-13 21:16:00'
//            ],
//            [
//                'product_name' => 'Củ Sắn',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'cu_san.jpg',
//                'season' => 8,
//                'slug' => Str::of('Củ Sắn')->slug('-'),
//                'catagory_id' => 2,
//                'created_at' => '2021-9-13 21:16:01'
//            ],
//            [
//                'product_name' => 'Khoai Dong',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'khoai_dong.jpg',
//                'season' => 8,
//                'slug' => Str::of('Khoai Dong')->slug('-'),
//                'catagory_id' => 2,
//                'created_at' => '2021-9-13 21:16:02'
//            ],
//            [
//                'product_name' => 'Rau Cải',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'rau_cai.jpg',
//                'season' => 8,
//                'slug' => Str::of('Rau Cải')->slug('-'),
//                'catagory_id' => 1,
//                'created_at' => '2021-9-13 21:16:04'
//            ],
//            [
//                'product_name' => 'Rau Lan',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'rau_lan.jpg',
//                'season' => 2,
//                'slug' => Str::of('Rau Lan')->slug('-'),
//                'catagory_id' => 1,
//                'created_at' => '2021-9-13 21:16:05'
//            ],
//            [
//                'product_name' => 'Rau Mùi',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'rau_mui.jpg',
//                'season' => 8,
//                'slug' => Str::of('Rau Mùi')->slug('-'),
//                'catagory_id' => 1,
//                'created_at' => '2021-9-13 21:16:09'
//            ],
//            [
//                'product_name' => 'Rau Tần Ô',
//                'product_price' => 2500,
//                'description' => 'Trái cây là nguồn cung cấp vitamin và muối khoáng quan trọng trong chế
//                                    độ ăn của mỗi người, vì ăn trực tiếp không qua nấu nướng nên trái cây
//                                     giữ nguyên được hàm lượng vitamin và khoáng chất, song nó chứa nguồn chất
//                                     xơ dồi dào, tốt cho sức khỏe cũng như việc giữ dáng, giảm cân',
//                'product_image' => 'rau_tan_o.jpg',
//                'season' => 3,
//                'slug' => Str::of('Rau Tần Ô')->slug('-'),
//                'catagory_id' => 1,
//                'created_at' => '2021-9-13 21:17:04'
//            ],
//
//            [
//                'product_name' => 'Thịt bò',
//                'product_price' => 2500,
//                'description' => 'Giàu protein, chứa tất cả các amino acid thiết yếu và trong hầu hết
//                             các trường hợp là nguồn cung cấp kẽm, vitamin B12, selen, phosphor, niacin,
//                              vitamin B6, choline, riboflavin và sắt',
//                'product_image' => 'thit.jpg',
//                'season' => 0,
//                'slug' => Str::of('Thịt bò')->slug('-'),
//                'catagory_id' => 5,
//                'created_at' => '2021-9-13 21:17:04'
//            ],
//            [
//                'product_name' => 'Cá',
//                'product_price' => 2500,
//                'description' => 'Giàu protein, chứa tất cả các amino acid thiết yếu và trong hầu hết
//                             các trường hợp là nguồn cung cấp kẽm, vitamin B12, selen, phosphor, niacin,
//                              vitamin B6, choline, riboflavin và sắt',
//                'product_image' => 'ca.jpg',
//                'season' => 0,
//                'slug' => Str::of('Cá')->slug('-'),
//                'catagory_id' => 6,
//                'created_at' => '2021-9-13 21:17:05'
//            ],
//            [
//                'product_name' => 'Cua',
//                'product_price' => 2500,
//                'description' => 'Giàu protein, chứa tất cả các amino acid thiết yếu và trong hầu hết
//                             các trường hợp là nguồn cung cấp kẽm, vitamin B12, selen, phosphor, niacin,
//                              vitamin B6, choline, riboflavin và sắt',
//                'product_image' => 'cua.jpg',
//                'season' => 0,
//                'slug' => Str::of('Cua')->slug('-'),
//                'catagory_id' => 7,
//                'created_at' => '2021-9-13 21:17:06'
//            ],
//            [
//                'product_name' => 'Coca Cola',
//                'product_price' => 2500,
//                'description' => 'Nước ngọt có ga chứa nước cacbon dioxide bão hòa ',
//                'product_image' => 'coca.jpg',
//                'season' => 0,
//                'slug' => Str::of('Coca Cola')->slug('-'),
//                'catagory_id' => 9,
//                'created_at' => '2021-9-13 21:17:07'
//            ],
//            [
//                'product_name' => 'Pepsi',
//                'product_price' => 2500,
//                'description' => 'Nước ngọt có ga chứa nước cacbon dioxide bão hòa ',
//                'product_image' => 'pepsi.jpg',
//                'season' => 0,
//                'slug' => Str::of('Pepsi')->slug('-'),
//                'catagory_id' => 9,
//                'created_at' => '2021-9-13 21:17:08'
//            ],
//            [
//                'product_name' => 'Cafe',
//                'product_price' => 2500,
//                'description' => 'Cà phê là một loại thức uống được ủ từ hạt cà phê rang, lấy từ quả
//                                 của cây cà phê. Các giống cây cà phê được bắt nguồn từ vùng nhiệt đới
//                                 châu Phi và các vùng Madagascar, Comoros, Mauritius và Réunion trên các khu vực thuộc đường xích đạo.',
//                'product_image' => 'cafe.jpg',
//                'season' => 0,
//                'slug' => Str::of('Cafe')->slug('-'),
//                'catagory_id' => 10,
//                'created_at' => '2021-9-13 21:17:09'
//            ],
//        ]);

        DB::table('mst_post_catagory')->insert([
            [
                'name' => 'Nông sản',
                'id_parent' => 0,
            ],
            [
                'name' => 'Hải sản',
                'id_parent' => 0,
            ],
            [
                'name' => 'Một số thông tin khác',
                'id_parent' => 0,
            ],
            [
                'name' => 'Cách mua sắm',
                'id_parent' => 1,
            ],
            [
                'name' => 'Bảo quản',
                'id_parent' => 1,
            ],
            [
                'name' => 'Cách mua sắm',
                'id_parent' => 2,
            ],
            [
                'name' => 'Bảo quản',
                'id_parent' => 2,
            ],
        ]);

        DB::table('mst_post')->insert([
           [
               'post_auth' => 'Nguyễn Văn B',
               'post_title' => 'Mẹo giữ rau củ quả tươi lâu hơn',
               'post_content' => "<h4>Phân loại rau củ trước khi cho vào tủ lạnh</h4>
                                    Mỗi loại rau củ sẽ có thời gian bảo quản và hư hỏng khác nhau.
                                     Cách bảo quản rau trong tủ lạnh đúng cách là bạn cần phân loại cụ thể và cho 
                                     chúng vào từng túi riêng trước khi cho vào tủ lạnh.
                                     <h4>Nhiệt độ bảo bảo quản thích hợp</h4>
                                        Tủ lạnh ở nhiệt độ 1-4 độ C sẽ bảo quản rau củ được tốt hơn vì vi 
                                        khuẩn thường phát triển mạnh ở nhiệt độ trên 4 độ C. Tuy nhiên cũng đừng 
                                        để nhiệt độ quá thấp hay cho rau củ vào tủ đông, điều này sẽ khiến rau củ 
                                        bị đóng băng hay nhanh hỏng hơn.",
               'post_excerpt' => "Mẹo giữ rau củ quả tươi lâu gồm các bước như : Phân loại rau củ trước khi cho vào tủ lạnh,
                                   Nhiệt độ bảo quản thích hợp",
               'post_name' => "bao-quan-rau-cu",
               'post_image' => 'http://it15.internship.rcvn.work/image/rau_cu_qua.jpg',
               'post_views' => 0,
                'catagory_id' => '4',
               'created_at' => '2021-9-14 21:15:01'
           ],
            [
                'post_auth' => 'Nguyễn Văn B',
                'post_title' => 'Mẹo giữ hải sản tươi lâu hơn',
                'post_content' => "<h4>Phân loại hải sản khi cho vào tủ lạnh</h4>
                                    Mỗi loại hải sản sẽ có thời gian bảo quản và hư hỏng khác nhau.
                                     Cách bảo quản hải sản trong tủ lạnh đúng cách là bạn cần phân loại cụ thể và cho 
                                     chúng vào từng túi riêng trước khi cho vào tủ lạnh.
                                     <h4>Nhiệt độ bảo bảo quản thích hợp</h4>
                                        Tủ lạnh ở nhiệt độ 1-4 độ C sẽ bảo quản hải sản được tốt hơn vì vi 
                                        khuẩn thường phát triển mạnh ở nhiệt độ trên 4 độ C. Tuy nhiên cũng đừng 
                                        để nhiệt độ quá thấp hay cho hải sản vào tủ đông, điều này sẽ khiến hải sản 
                                        bị đóng băng hay nhanh hỏng hơn.",
                'post_excerpt' => "Mẹo giữ hải sản tươi lâu gồm các bước như : Phân loại hải sản trước khi cho vào tủ lạnh,
                                   Nhiệt độ bảo quản thích hợp",
                'post_name' => "bao-quan-hai-san",
                'post_image' => 'http://it15.internship.rcvn.work/image/cua.jpg',
                'post_views' => 1,
                'catagory_id' => '6',
                'created_at' => '2021-9-14 21:15:02'
            ],
            [
                'post_auth' => 'Nguyễn Văn B',
                'post_title' => 'Cách lựa chọn rau củ quả tươi ngon',
                'post_content' => "<h4>Chọn rau củ tươi dựa vào hình dáng bên ngoài</h4>
                                    Rau quả tươi thường còn lành lặn, nguyên vẹn, không bị trầy xước hay nát, phần cuống không bị thâm nhũn. Các loại rau, củ quả phải gọt vỏ như bí, bầu, mướp... thường an toàn hơn các loại rau ăn lá.<br>
                                    Rau bị phun thuốc kích thích thường có lá xanh tốt bất thường, cọng rất non, to mập, những bó rau đó chỉ cần để từ sáng đến chiều là có thể bị nẫu, héo rũ.
                                     <h4>Dựa vào màu sắc để chọn rau củ quả tươi</h4>
                                        Rau củ và quả tươi có màu sắc tự nhiên, không bị héo úa. Không có bất kì màu sắc bất thường nào. Bạn nên chú ý các loại củ quả màu xanh hoặc có màu sắc khá thất thường.<br>
                                        Với rau ăn lá: không nên chọn những loại rau có màu xanh quá đậm, quá mướt, lá bóng mà nên chọn rau có màu xanh nhạt, cây rau nhìn bình thường.",
                'post_excerpt' => "Cách lựa chọn rau củ quả tươi ngon gồm các bước như : Chọn rau củ tươi dựa vào hình dáng bên ngoài,
                                   Dựa vào màu sắc để chọn rau củ quả tươi",
                'post_name' => "lua-chon-rau-cu",
                'post_image' => 'http://it15.internship.rcvn.work/image/rau_cu_qua.jpg',
                'post_views' => 2,
                'catagory_id' => '5',
                'created_at' => '2021-9-14 21:15:03'
            ],
            [
                'post_auth' => 'Nguyễn Văn B',
                'post_title' => 'Cách lựa chọn hải sản tươi ngon',
                'post_content' => "<h4>Chọn hải sản tươi dựa vào hình dáng bên ngoài</h4>
                                    Hải sản tươi thường còn lành lặn, nguyên vẹn, không bị trầy xước hay nát, phần cuống không bị thâm nhũn. Các loại hải sản phải gọt vỏ như bí, bầu, mướp... thường an toàn hơn các loại rau ăn lá.<br>
                                    Hải sản bị phun thuốc kích thích thường có lá xanh tốt bất thường, cọng rất non, to mập, những bó rau đó chỉ cần để từ sáng đến chiều là có thể bị nẫu, héo rũ.
                                     <h4>Dựa vào màu sắc để chọn hải sản tươi</h4>
                                        Hải sản tươi có màu sắc tự nhiên, không bị héo úa. Không có bất kì màu sắc bất thường nào. Bạn nên chú ý các loại củ quả màu xanh hoặc có màu sắc khá thất thường.<br>
                                        Với hải sản lá: không nên chọn những loại rau có màu xanh quá đậm, quá mướt, lá bóng mà nên chọn rau có màu xanh nhạt, cây rau nhìn bình thường.",
                'post_excerpt' => "Cách lựa chọn hải sản tươi ngon gồm các bước như : Chọn hải sản tươi dựa vào hình dáng bên ngoài,
                                   Dựa vào màu sắc để chọn hải sản tươi",
                'post_name' => "lua-chon-hai-san",
                'post_image' => 'http://it15.internship.rcvn.work/image/cua.jpg',
                'post_views' => 3,
                'catagory_id' => '7',
                'created_at' => '2021-9-14 21:15:04'
            ],


            [
                'post_auth' => 'Nguyễn Văn B',
                'post_title' => 'Nỗi khổ của người nông dân Đà Lạt mùa dịch',
                'post_content' => "<h4>Nông dân Đà Lạt gạt nước mắt, tái đầu tư</h4>
                                    Nông dân cắt hoa đổ bỏ vì dịch Covid-19 không bán được,<br>
                                    Nông dân sản xuất tự do đổ bỏ hàng chục tấn rau, hoa.<br>
                                    700 ha hoa nhài có nguy cơ đổ bỏ.<br>
                                    Bão kép đổ bộ Trung Quốc, mưa lũ nguy cơ vỡ đập.<br>
                                     <h4>Nhiều hộ cạn vốn</h4>
                                    Kể từ đầu tháng 5 đến nay, nhiều nhà vườn trồng rau, hoa tại xã Xuân Thọ (TP Đà Lạt, Lâm Đồng) phải gánh chịu sự thiệt hại chưa từng có do dịch bệnh Covid-19 bùng phát. Nhiều gia đình đã phải đổ bỏ nông sản và lâm cảnh kiệt quệ về kinh tế.",
                'post_excerpt' => "Nông dân Đà Lạt gạt nước mắt, tái đầu tư. Nhiều hộ cạn vốn.",
                'post_name' => "noi-kho-cua-nong-dan-da-lat",
                'post_image' => 'https://bizweb.dktcdn.net/100/433/634/articles/watermark-nong-dan-da-lat-tai-dau-tu-ky-vong-thi-truong-cuoi-nam-1411-20210818-337-170625.jpeg?v=1630033531583',
                'post_views' => 4,
                'catagory_id' => '3',
                'created_at' => '2021-9-14 21:15:05'
            ],
            [
                'post_auth' => 'Nguyễn Văn B',
                'post_title' => 'Sầu riêng và bơ vẫn ế hàng chuc ngàn tấn dù đã nỗ lực két nối',
                'post_content' => "Tiêu thụ sầu riêng, bơ ở Đắk Lắk vẫn gặp khó do ảnh hưởng của dịch bệnh Covid-19, các tỉnh thành kiểm soát chặt vận chuyển, lưu thông hàng hóa; thương lái hạn chế thu mua…<br>
                                    Ngày 8.9, UBND tỉnh Đắk Lắk cho biết đã thống kê, đánh giá tình hình tiêu thụ các loại trái cây chủ lực của tỉnh là bơ và sầu riêng niên vụ 2021 trong điều kiện dịch Covid-19.<br>
                                    Theo đó, đến đầu tháng 9, Đắk Lắk tiêu thụ được hơn 40.000 tấn sầu riêng, đạt khoảng 40% sản lượng cả vụ. Bơ tiêu thụ khoảng 58.500 tấn, đạt hơn 70% sản lượng. Cả hai loại trái cây đều chỉ tiêu thụ nội địa (100%). Giá sầu riêng và bơ trong vụ mùa năm nay đều giảm khoảng 20% - 30% so với mùa vụ năm 2020.<br>
                                    Từ đầu vụ thu hoạch, UBND tỉnh Đắk Lắk đã có văn bản đề nghị các bộ, ngành T.Ư; UBND các tỉnh, thành tạo điều kiện giới thiệu, hỗ trợ, kết nối tiêu thụ sầu riêng, bơ và các nông sản khác của tỉnh trong tình hình dịch Covid-19.<br>
                                    Hiện có một số doanh nghiệp, địa phương, hệ thống siêu thị tổ chức kết nối tiêu thụ, nhưng rất ít các đơn vị hợp đồng tiêu thụ khối lượng lớn. Đáng kể có Công ty CP Xuất nhập khẩu thương mại dịch vụ Ngọc Minh Châu (TP.HCM) đang ký hợp đồng với Hợp tác xã dịch vụ nông nghiệp hữu cơ Krông Pắk tiêu thụ 7.000 tấn sầu riêng...",
                'post_excerpt' => "Tiêu thụ sầu riêng, bơ ở Đắk Lắk vẫn gặp khó do ảnh hưởng của dịch bệnh Covid-19, các tỉnh thành kiểm soát chặt vận chuyển.",
                'post_name' => "sau-rieng-va-bo-e-hang",
                'post_image' => 'https://1.bp.blogspot.com/-pSN9XlJ992M/YTljbXTOsUI/AAAAAAAC_FA/O9ZsKoIG8h4ecIziEzYPbxlglngg7I-bgCLcBGAsYHQ/s1613/sau-rieng-1.jpg',
                'post_views' => 5,
                'catagory_id' => '3',
                'created_at' => '2021-9-14 21:15:06'
            ],
        ]);
    }
}
