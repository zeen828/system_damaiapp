<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Product_exchange extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'product_exchange';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'service_id', 'member_id', 'company_id', 'store_id', 'member_detail_id',
        'date', 'exchanges_id', 'qty', 'point_type_id', 'point_before',
        'point_after', 'orders_id_type', 'orders_id', 'status', 'created_at',
        'updated_at'
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
