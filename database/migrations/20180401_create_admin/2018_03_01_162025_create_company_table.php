<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path="database/migrations/20180401_create_admin/"
     * php artisan migrate:rollback --path="database/migrations/20180401_create_admin"
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand', 50)->comment('品牌');
            $table->text('description')->nullable()->comment('描述');
            $table->string('name', 50)->nullable()->comment('名稱');
            $table->string('image', 255)->nullable()->comment('示意圖');
            $table->string('policy', 255)->nullable()->comment('服務條款');
            $table->string('info', 255)->nullable()->comment('介紹');
            $table->string('about', 255)->nullable()->comment('關於我們');
            $table->tinyInteger('status')->default(0)->comment('狀態(0:停用,1:啟用');
            $table->timestamps();

            $table->index(['id', 'status'], 'company_index');
        });
        DB::statement("ALTER TABLE `company` comment '品牌'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
