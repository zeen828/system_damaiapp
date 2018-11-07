<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Exchanges extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'exchanges';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'service_id', 'company_id', 'store_id', 'start_date', 'end_date',
        'name', 'description', 'image', 'point_type_id', 'point',
        'stock', 'status'
    ];
    // 隱藏不顯示欄位
    //protected $hidden = [];
    // 軟刪除
    //use SoftDeletes;
    //protected $dates = ['deleted_at'];
    // 是否自動待時間撮
    public $timestamps = true;
    // 時間撮保存格式
    //protected $dateFormat = 'U';
    // 自訂時間撮欄位
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function campaign_setting()
    {
        return $this->belongsTo('\App\Models\idelivery\Campaign_setting', 'campaign_setting_id', 'id');
    }
}
