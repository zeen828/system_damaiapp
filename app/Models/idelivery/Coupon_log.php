<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon_log extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'coupon_log';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'member_id', 'member_detail_id', 'sn', 'setting_id', 'order_id_type',
        'order_id', 'total_price', 'check_out_price', 'deduct_price', 'created_at',
        'updated_at'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 是否自動待時間撮
    //public $timestamps = true;
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

    public function coupon()
    {
        return $this->hasOne('App\Models\idelivery\Coupon', 'sn', 'sn');
    }


}