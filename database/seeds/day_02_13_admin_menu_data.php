<?php

use Illuminate\Database\Seeder;

class day_02_13_admin_menu_data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 指令::php artisan db:seed --class=day_02_13_admin_menu_data
        // 第一次執行,執行前全部資料庫清空
        $now_date = date('Y-m-d h:i:s');
        // 目錄
        // 管理用admin
        // 設定用config
        // 範例:愛外送 (管理 發票) (設定 帳號) >> idelivery/admin/invoice/config/account
        DB::table('admin_menu')->truncate();
        DB::table('admin_menu')->insert([
            //system(1~10)
            ['id' => '1', 'parent_id' => '0', 'order' => '1', 'title' => 'Index', 'icon' => 'fa-bar-chart', 'uri' => '/', 'created_at' => $now_date, 'updated_at' => $now_date],
            //系統管理(11~20)
            ['id' => '11', 'parent_id' => '0', 'order' => '999999', 'title' => '系統管理', 'icon' => 'fa-tasks', 'uri' => NULL, 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '12', 'parent_id' => '11', 'order' => '12', 'title' => '用戶管理', 'icon' => 'fa-users', 'uri' => 'auth/users', 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '13', 'parent_id' => '11', 'order' => '13', 'title' => '角色管理', 'icon' => 'fa-user', 'uri' => 'auth/roles', 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '14', 'parent_id' => '11', 'order' => '14', 'title' => '權限管理', 'icon' => 'fa-ban', 'uri' => 'auth/permissions', 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '15', 'parent_id' => '11', 'order' => '15', 'title' => '選單管理', 'icon' => 'fa-bars', 'uri' => 'auth/menu', 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '16', 'parent_id' => '11', 'order' => '16', 'title' => 'Operation log', 'icon' => 'fa-history', 'uri' => 'auth/logs', 'created_at' => $now_date, 'updated_at' => $now_date],
            //產品管理(21~70)
            ['id' => '21', 'parent_id' => '0', 'order' => '20', 'title' => '產品管理', 'icon' => 'fa-history', 'uri' => NULL, 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '22', 'parent_id' => '21', 'order' => '22', 'title' => trans('backend.service.config'), 'icon' => 'fa-history', 'uri' => 'management/config/service', 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '23', 'parent_id' => '21', 'order' => '23', 'title' => trans('backend.company.config'), 'icon' => 'fa-history', 'uri' => 'management/config/company', 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '24', 'parent_id' => '21', 'order' => '24', 'title' => trans('backend.app.config'), 'icon' => 'fa-history', 'uri' => 'management/config/app', 'created_at' => $now_date, 'updated_at' => $now_date],
            //愛劇團itheatre(71~170)
            //愛外送idelivery(171~270)
            ['id' => '171', 'parent_id' => '0', 'order' => '171', 'title' => '愛外送', 'icon' => 'fa-cutlery', 'uri' => NULL, 'created_at' => $now_date, 'updated_at' => $now_date],
                ['id' => '172', 'parent_id' => '171', 'order' => '172', 'title' => '發票管理', 'icon' => 'fa-tag', 'uri' => NULL, 'created_at' => $now_date, 'updated_at' => $now_date],
                    ['id' => '173', 'parent_id' => '172', 'order' => '173', 'title' => '帳號設定', 'icon' => 'fa-user', 'uri' => 'idelivery/admin/invoice/config/account', 'created_at' => $now_date, 'updated_at' => $now_date],
        ]);
        // 角色&目錄關係
        // DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert([
            //admin
            ['role_id' => '1', 'menu_id' => '2', 'created_at' => $now_date, 'updated_at' => $now_date],
        ]);
    }
}
