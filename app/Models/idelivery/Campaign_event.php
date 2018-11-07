<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Campaign_event extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'campaign_event';
}
