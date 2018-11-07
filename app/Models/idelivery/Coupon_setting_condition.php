<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponSettingCondition extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'coupon_setting_condition';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'coupon_setting_id', 'coupon_condition_id'
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
//    const CREATED_AT = 'created_at';
//    const UPDATED_AT = 'updated_at';

    public function condition()
    {
        return $this->hasOne('App\Models\idelivery\Coupon_condition');
    }

}