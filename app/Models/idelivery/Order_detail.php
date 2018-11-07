<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'order_detail';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'order_id', 'purchaser_uuid', 'purchaser_name', 'operator_admin_id', 'item_id',
        'item_name', 'item_optional', 'item_price', 'qty', 'sub_price',
        'create_time'
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

    /**
     * 訂單關聯
     * 1:1
     */
    public function order()
    {
        return $this->belongsTo('App\Models\idelivery\Order', 'id', 'order_id');
    }

    public function menu_item()
    {
        return $this->belongsTo('App\Models\idelivery\Menu_item', 'id', 'item_id');
    }

}
