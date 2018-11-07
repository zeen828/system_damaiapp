<?php

namespace App\Models\system_member;

use Illuminate\Database\Eloquent\Model;

class Push_app extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'system_member';
    // 資料庫名稱
    protected $table = 'push_app';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'service_id', 'app_id', 'company_id', 'store_id', 'member_id',
        'member_detail_id', 'special_member_id', 'device_id', 'app_token', 'unread_badge',
        'all_badge', 'app_version', 'login', 'del', 'push_enable',
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

    /**
     * 裝置關聯表
     * 1:1
     */
    public function device()
    {
        return $this->hasOne('App\Models\system_member\Push_device', 'id', 'device_id');
    }
}
