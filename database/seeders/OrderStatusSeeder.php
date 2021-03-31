<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'content'=>'Xác nhận đơn hàng'
        ]);
        DB::table('order_status')->insert([
            'content'=>'Chuẩn bị đơn hàng của bạn'
        ]);
        DB::table('order_status')->insert([
            'content'=>'Đơn hàng đã được giao đến kho giao hàng'

        ]);
        DB::table('order_status')->insert([
            'content'=>'Đơn hàng đang được giao đến bạn'

        ]);
        DB::table('order_status')->insert([
            'content'=>'Đơn hàng đã được giao đến bạn thành công'

        ]);
    }
}
