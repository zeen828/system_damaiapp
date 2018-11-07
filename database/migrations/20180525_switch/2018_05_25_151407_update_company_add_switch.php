<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCompanyAddSwitch extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path="database/migrations/20180525_switch/"
     * php artisan migrate:rollback --path="database/migrations/20180525_switch"
     * @return void
     */
    public function up()
    {
        // 更新table
        Schema::table('company', function (Blueprint $table)
        {
            //獎勵-獲得
            $table->tinyInteger('sw_reward')->default(0)->comment('獎勵開關(0:關,1:開)')->after('about');
            //使用-消耗
            $table->tinyInteger('sw_use')->default(0)->comment('使用開關(0:關,1:開)')->after('sw_reward');
            //軟刪除
            $table->softDeletes()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('company', function (Blueprint $table)
        {
            $table->dropColumn('sw_reward');// 刪除欄位
            $table->dropColumn('sw_use');// 刪除欄位
            $table->dropColumn('deleted_at');// 刪除欄位
        });
    }
}
