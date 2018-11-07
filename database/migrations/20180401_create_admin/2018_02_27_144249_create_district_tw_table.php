<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTwTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path="database/migrations/20180401_create_admin/"
     * php artisan migrate:rollback --path="database/migrations/20180401_create_admin"
     * @return void
     */
    public function up()
    {
        Schema::create('district_tw', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('city_id')->comment('城市ID');
            $table->string('city', 10)->comment('城市');
            $table->string('area', 10)->comment('區域');
            $table->char('post_code', 3)->comment('3碼郵遞區號');
            $table->string('name', 20)->comment('名稱');
            //
            $table->index(['city_id', 'post_code'], 'district_tw_index');
        });
        DB::statement("ALTER TABLE `district_tw` comment '區域(台灣)'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district_tw');
    }
}
