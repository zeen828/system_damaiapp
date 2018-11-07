<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTables extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path="database/migrations/20180401_create_admin/"
     * php artisan migrate:rollback --path="database/migrations/20180401_create_admin"
     * @return void
     */
    public function up()
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        Schema::connection($connection)->create(config('admin.database.users_table'), function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('username', 190)->unique()->comment('帳號');
            $table->string('password', 60)->comment('密碼');
            $table->string('name')->comment('名稱');
            $table->string('avatar')->nullable()->comment('大頭照片');
            $table->string('remember_token', 100)->nullable()->comment('TOKEN');
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.roles_table'), function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 50)->unique()->comment('角色名稱');
            $table->string('slug', 50)->comment('唯一字串');
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.permissions_table'), function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 50)->unique()->comment('權限名稱');
            $table->string('slug', 50)->comment('唯一字串');
            $table->string('http_method')->nullable()->comment('訪問方式');
            $table->text('http_path')->nullable()->comment('訪問路徑');
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.menu_table'), function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('parent_id')->default(0)->comment('上層目錄');
            $table->integer('order')->default(0)->comment('排序');
            $table->string('title', 50)->comment('目錄標題');
            $table->string('icon', 50)->comment('小圖像');
            $table->string('uri', 50)->nullable()->comment('訪問網址');
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.role_users_table'), function (Blueprint $table) {
            $table->integer('role_id')->comment('角色ID');
            $table->integer('user_id')->comment('使用者ID');
            $table->index(['role_id', 'user_id']);
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.role_permissions_table'), function (Blueprint $table) {
            $table->integer('role_id')->comment('角色ID');
            $table->integer('permission_id')->comment('權限ID');
            $table->index(['role_id', 'permission_id']);
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.user_permissions_table'), function (Blueprint $table) {
            $table->integer('user_id')->comment('使用者ID');
            $table->integer('permission_id')->comment('權限ID');
            $table->index(['user_id', 'permission_id']);
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.role_menu_table'), function (Blueprint $table) {
            $table->integer('role_id')->comment('角色ID');
            $table->integer('menu_id')->comment('目錄ID');
            $table->index(['role_id', 'menu_id']);
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.operation_log_table'), function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('user_id')->comment('角色ID');
            $table->string('path')->comment('訪問路徑');
            $table->string('method', 10)->comment('訪問方式');
            $table->string('ip', 15)->comment('IP');
            $table->text('input')->comment('輸入');
            $table->index('user_id')->comment('角色ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        Schema::connection($connection)->dropIfExists(config('admin.database.users_table'));
        Schema::connection($connection)->dropIfExists(config('admin.database.roles_table'));
        Schema::connection($connection)->dropIfExists(config('admin.database.permissions_table'));
        Schema::connection($connection)->dropIfExists(config('admin.database.menu_table'));
        Schema::connection($connection)->dropIfExists(config('admin.database.user_permissions_table'));
        Schema::connection($connection)->dropIfExists(config('admin.database.role_users_table'));
        Schema::connection($connection)->dropIfExists(config('admin.database.role_permissions_table'));
        Schema::connection($connection)->dropIfExists(config('admin.database.role_menu_table'));
        Schema::connection($connection)->dropIfExists(config('admin.database.operation_log_table'));
    }
}
