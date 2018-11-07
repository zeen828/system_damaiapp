<?php
/**
 * Created by PhpStorm.
 * User: cecyu
 * Date: 2018/8/31
 * Time: 下午 02:36
 */
namespace App\Models\system_billing;

use Illuminate\Database\Eloquent\Model;

class Invoice_cancel extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'system_billing';
    // 資料庫名稱
    protected $table = 'invoice_cancel';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'service_id', 'store_id', 'billing_id', 'invoice_no', 'invoice_date',
        'buyer_id', 'seller_id', 'cancel_date', 'cancel_time', 'cancel_reason',
        'return_tax_document_no', 'remark', 'third_upload_status', 'agent_callout_data',
        'agent_callback_message', 'agent_callout_datetime', 'agent_callback_datetime',
        'upload_status', 'callout_data', 'callback_message', 'callout_datetime', 'callback_datetime',
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

}