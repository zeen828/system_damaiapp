<?php

use Illuminate\Database\Seeder;

class day_02_13_admin_permissions_data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 指令::php artisan db:seed --class=day_02_13_admin_permissions_data
        // 第一次執行,執行前全部資料庫清空
        $now_date = date('Y-m-d h:i:s');
        // 權限
        DB::table('admin_permissions')->truncate();
        DB::table('admin_permissions')->insert([
            //system
            ['id' => '1', 'name' => 'All permission', 'slug' => '*', 'http_method' => '', 'http_path' => "*", 'created_at' => $now_date, 'updated_at' => $now_date],
            ['id' => '2', 'name' => '儀表板', 'slug' => 'dashboard', 'http_method' => 'GET', 'http_path' => "/", 'created_at' => $now_date, 'updated_at' => $now_date],
            ['id' => '3', 'name' => '登入登出', 'slug' => 'auth.login', 'http_method' => '', 'http_path' => "/auth/login\r\n/auth/logout", 'created_at' => $now_date, 'updated_at' => $now_date],
            ['id' => '4', 'name' => '會員設定', 'slug' => 'auth.setting', 'http_method' => 'GET,PUT', 'http_path' => "/auth/setting", 'created_at' => $now_date, 'updated_at' => $now_date],
            ['id' => '5', 'name' => 'Auth management', 'slug' => 'auth.management', 'http_method' => '', 'http_path' => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs", 'created_at' => $now_date, 'updated_at' => $now_date],
            //產品管理
            ['id' => '6', 'name' => '[產品管理]服務項目設定', 'slug' => 'auth.setting', 'http_method' => 'GET,PUT', 'http_path' => "/management/config/service\r\n/management/config/service/*\r\n", 'created_at' => $now_date, 'updated_at' => $now_date],
            ['id' => '7', 'name' => '[產品管理]公司品牌設定', 'slug' => 'auth.setting', 'http_method' => 'GET,PUT', 'http_path' => "/management/config/company\r\n/management/config/company/*\r\n", 'created_at' => $now_date, 'updated_at' => $now_date],
            ['id' => '8', 'name' => '[產品管理]APP產品設定', 'slug' => 'auth.setting', 'http_method' => 'GET,PUT', 'http_path' => "/management/config/app\r\n/management/config/app/*\r\n", 'created_at' => $now_date, 'updated_at' => $now_date],
            //愛劇團itheatre
            //愛外送idelivery
            ['id' => '9', 'name' => '[愛外送]發票管理-帳號設定', 'slug' => 'auth.setting', 'http_method' => 'GET,PUT', 'http_path' => "/idelivery/admin/invoice/config/account\r\n/idelivery/admin/invoice/config/account/*\r\n", 'created_at' => $now_date, 'updated_at' => $now_date],
        ]);
        // 角色&權限關係
        // DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert([
            //admin
            ['role_id' => '1', 'permission_id' => '1', 'created_at' => $now_date, 'updated_at' => $now_date],
        ]);
    }
}
