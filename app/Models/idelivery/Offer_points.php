<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Offer_points extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'offer_points';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'setting_id', 'point_type_id', 'value', 'expired_at', 'max_value',
        'created_at', 'updated_at'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 軟刪除
    //use SoftDeletes;
    // 是否自動待時間撮
    public $timestamps = true;
    // 時間撮保存格式
    //protected $dateFormat = 'U';
    // 自訂時間撮欄位
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function campaign_setting()
    {
        return $this->belongsTo('App\Models\idelivery\Campaign_setting', 'id', 'setting_id');
    }


    public function setExpiredAtAttribute($value)
    {
        if (!empty($value))
        {
            $period = null;
            switch ($value)
            {
                case 1:
                    $period = " +6 months";
                    break;
                case 2:
                    $period = " +1 year";
                    break;
                case 3:
                    $period = " +18 months";
                    break;
                case 4:
                    $period = " +2 years";
                    break;
                case 5:
                    $period = " +30 months";
                    break;
                case 6:
                    $period = " +3 years";
                    break;
            }

            $this->attributes['expired_at'] = date("Y-m-d H:i:s", strtotime(date("y-m-d H:i:s").$period));
        }
        else
        {
            $this->attributes['expired_at'] = null;
        }

    }

}
