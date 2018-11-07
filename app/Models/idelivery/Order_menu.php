<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Order_menu extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'order_menu';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'company_id', 'store_id', 'owner_member_id', 'share_status', 'name',
        'title', 'status', 'is_assign_order_deadline', 'meal_order_deadline_date', 'meal_order_deadline_time',
        'is_assign_delivery', 'meal_delivery_date', 'meal_delivery_time', 'share_key', 'comment',
        'create_time', 'update_time', 'share_create_time'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 軟刪除
    //use SoftDeletes;
    // 是否自動待時間撮
    public $timestamps = false;
    // 時間撮保存格式
    //protected $dateFormat = 'U';
    // 自訂時間撮欄位
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';

}
