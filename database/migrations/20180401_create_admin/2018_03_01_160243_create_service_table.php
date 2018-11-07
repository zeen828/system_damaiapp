<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path="database/migrations/20180401_create_admin/"
     * php artisan migrate:rollback --path="database/migrations/20180401_create_admin"
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('title', 50)->comment('標題');
            $table->text('description')->nullable()->comment('描述');
            $table->tinyInteger('status')->default(0)->comment('狀態(0:停用,1:啟用');
            $table->timestamps();

            $table->index(['id', 'status'], 'service_index');
        });
        DB::statement("ALTER TABLE `service` comment '服務項目'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service');
    }
}
