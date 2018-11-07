<?php

namespace App\Models\system_member;

use Illuminate\Database\Eloquent\Model;

class Point_consume_log extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'system_member';
    // 資料庫名稱
    protected $table = 'point_consume_log';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'id', 'service_id', 'member_id', 'company_id', 'store_id',
        'member_detail_id', 'operating_role', 'description', 'point_type_id', 'exchange_type',
        'exchange_src_id', 'point_deducted_total', 'point_id', 'point_original', 'point_deducted',
        'point_later', 'created_at', 'updated_at'
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

    public function store()
    {
        return $this->hasOne('App\Models\idelivery\Store', 'id', 'store_id');
    }
}
