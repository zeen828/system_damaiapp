<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'coupon';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'member_detail_id', 'company_id', 'store_id', 'setting_id', 'sn',
        'counts', 'used_count', 'lock', 'status', 'kind',
        'kind_value', 'start_at', 'end_at', 'created_at', 'updated_at'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 是否自動待時間撮
    public $timestamps = true;
    // 時間撮保存格式
    //protected $dateFormat = 'U';
    // 軟刪除
    //use SoftDeletes;
    // 自訂時間撮欄位
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function campaign_setting()
    {
        return $this->hasOne('App\Models\idelivery\Campaign_setting', 'id', 'setting_id');
    }

    public function member_detail()
    {
        return $this->hasOne('App\Models\system_member\Member_detail', 'id', 'member_detail_id');
    }

    public function store()
    {
        return $this->hasOne('App\Models\idelivery\Store', 'id', 'store_id');
    }


}