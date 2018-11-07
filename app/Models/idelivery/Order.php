<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'order';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'sn', 'order_menu_id', 'company_id', 'company_name', 'store_id',
        'store_name', 'member_id', 'member_name', 'purchase_phone', 'payment',
        'payment_status', 'pay_callback', 'payment_time', 'product_delivery',
        'status', 'confirm_status', 'amount', 'total_qty', 'discount_amount',
        'src_amount', 'coupon_discount', 'coupon_amount', 'custom_discount',
        'custom_amount', 'delivery_post_code', 'delivery_address', 'delivery_lng',
        'delivery_lat', 'prefer_datetime', 'comment', 'billing_day', 'call_no',
        'marketing_type', 'marketing_sn', 'billing_at', 'create_time'
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
    //const CREATED_AT = 'create_time';
    //const UPDATED_AT = 'create_time';

    /**
     * 訂單詳細資料關聯(訂單每個品項會有一筆)
     * 1:N
     */
    public function member()
    {
        return $this->hasOne('App\Models\idelivery\Member', 'id', 'member_id');
    }

    /**
     * 訂單詳細資料關聯(訂單每個品項會有一筆)
     * 1:N
     */
    public function detail()
    {
        return $this->hasMany('App\Models\idelivery\Order_detail', 'order_id', 'id');
    }

    /**
     * 活動關聯(一筆活動)
     * 1:1
     */
    public function campaign_log()
    {
        return $this->hasOne('App\Models\idelivery\Campaign_log', 'order_id', 'id');
    }

    /**
     * 發票關聯(一張發票)
     * 1:1
     */
    public function invoice()
    {
        return $this->hasOne('App\Models\idelivery\Invoice', 'order_id', 'id');
    }
}
