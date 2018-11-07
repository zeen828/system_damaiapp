<?php

use Illuminate\Database\Seeder;

class day_02_13_admin_default_data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 指令::php artisan db:seed --class=day_02_13_admin_default_data
        // 第一次執行,執行前全部資料庫清空
        $now_date = date('Y-m-d h:i:s');
        //DB::table('admin_users')->truncate();
        DB::table('admin_users')->insert([
            ['id' => '1', 'username' => 'admin', 'password' => '$2y$10$hR.BLlFF.GLIp70.VMAY1ucH63a9J4KPSM3dlwodAY2YVpuHIhPpC', 'name' => '網站管理員', 'created_at' => $now_date, 'updated_at' => $now_date],
            ['id' => '2', 'username' => 'webadmin', 'password' => '$2y$10$NHdn7yiXOcp04Cyit82loOU8qICFYrOTx8qhyuVw5hlq3/lNkb7Qe', 'name' => '網站管理員', 'created_at' => $now_date, 'updated_at' => $now_date],
        ]);
        // 角色
        //DB::table('admin_roles')->truncate();
        DB::table('admin_roles')->insert([
            ['id' => '1', 'name' => '系統管理員', 'slug' => 'administrator', 'created_at' => $now_date, 'updated_at' => $now_date],
            ['id' => '2', 'name' => '網站管理員', 'slug' => 'webadmin', 'created_at' => $now_date, 'updated_at' => $now_date],
        ]);
        // 角色&會員關係
        //DB::table('admin_role_users')->truncate();
        DB::table('admin_role_users')->insert([
            ['role_id' => '1', 'user_id' => '1', 'created_at' => $now_date, 'updated_at' => $now_date],
            ['role_id' => '2', 'user_id' => '2', 'created_at' => $now_date, 'updated_at' => $now_date],
        ]);
    }
}
