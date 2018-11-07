<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'invoice';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'order_id', 'store_id', 'invoice_no', 'invoice_date', 'invoice_time', 'seller_id',
        'seller_name', 'seller_address', 'seller_person_in_charge', 'seller_telephone_no',
        'seller_facsimile_no', 'seller_email', 'seller_customer_no', 'seller_role_remark',
        'buyer_id', 'buyer_name', 'buyer_address', 'buyer_person_in_charge', 'buyer_telephone_no',
        'buyer_facsimile_no', 'buyer_email', 'buyer_customer_no', 'buyer_role_remark',
        'check_no', 'buyer_remark', 'main_remark', 'customs_clearance_mark', 'category',
        'relate_no', 'invoice_type', 'group_mark', 'donate_mark', 'attachment',
        'sales_amount', 'tax_type', 'tax_rate', 'tax_amount', 'total_amount',
        'discount_amount', 'original_currency_amount', 'exchange_rate', 'currency',
        'created_at', 'updated_at'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 是否自動待時間撮
    public $timestamps = true;
    // 時間撮保存格式
    //protected $dateFormat = 'U';
    // 軟刪除
    //use SoftDeletes;
    // 自訂時間撮欄位
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function store()
    {
        return $this->hasOne('App\Models\idelivery\Store', 'id', 'store_id');
    }

}
