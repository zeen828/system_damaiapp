<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path="database/migrations/20180401_create_admin/"
     * php artisan migrate:rollback --path="database/migrations/20180401_create_admin"
     * @return void
     */
    public function up()
    {
        Schema::create('app', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('service_id')->default(0)->comment('服務項目ID');
            $table->integer('company_id')->default(0)->comment('品牌ID');
            $table->string('title', 50)->comment('標題');
            $table->text('description')->nullable()->comment('描述');
            $table->text('fcm_key')->nullable()->comment('推撥用key');
            $table->tinyInteger('status')->default(0)->comment('狀態(0:停用,1:啟用');
            $table->timestamps();

            $table->index(['id', 'service_id', 'company_id', 'status'], 'app_index');
        });
        DB::statement("ALTER TABLE `app` comment 'APP項目'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app');
    }
}
