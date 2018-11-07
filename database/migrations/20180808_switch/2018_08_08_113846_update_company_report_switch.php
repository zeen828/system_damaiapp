<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCompanyReportSwitch extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path="database/migrations/20180808_switch/"
     * php artisan migrate:rollback --path="database/migrations/20180808_switch"
     * @return void
     */
    public function up()
    {
        //php artisan migrate --path="database/migrations/20180808_switch"
        // 更新table
        Schema::table('company', function (Blueprint $table)
        {
            //獎勵-獲得
            $table->tinyInteger('sw_report')->default(0)->comment('報表開關(0:關,1:開)')->after('sw_use');

            $table->index(['id', 'sw_reward', 'sw_use', 'sw_report', 'status', 'deleted_at'], 'company_sw_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //php artisan migrate:rollback --path="database/migrations/20180808_switch"
        //
        Schema::table('company', function (Blueprint $table)
        {
            $table->dropColumn('sw_report');// 刪除欄位

            $table->dropIndex('company_sw_index');
       });
    }
}
