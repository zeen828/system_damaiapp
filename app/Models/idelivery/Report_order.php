<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Report_order extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'report_order';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'company_id', 'store_id', 'years', 'months', 'days',
        'hours', 'start_hour', 'end_hour', 'product_delivery', 'payment',
        'member_class', 'weather', 'order_count', 'src_amount', 'total_qty',
        'discount_amount', 'coupon_discount', 'custom_discount', 'amount', 'cancel_amount',
        'cancel_count', 'created_at', 'updated_at'
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
