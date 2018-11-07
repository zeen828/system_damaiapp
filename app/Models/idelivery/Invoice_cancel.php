<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Invoice_cancel extends Model
{
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'invoice_cancel';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'invoice_no', 'store_id', 'invoice_date', 'buyer_id', 'seller_id', 'cancel_date',
        'cancel_time', 'cancel_reason', 'return_tax_document_no', 'remark', 'created_at',
        'updated_at'
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
}
