<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Report_order_detail extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'report_order_detail';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'company_id', 'store_id', 'years', 'months', 'days',
        'hours', 'start_hour', 'end_hour', 'group_id', 'group_name',
        'item_id', 'item_name', 'item_price', 'qty', 'discount_amount',
        'sub_price', 'created_at', 'updated_at'
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
}
