<?php
/**
 * Created by PhpStorm.
 * User: cecyu
 * Date: 2018/8/31
 * Time: 下午 02:34
 */
namespace App\Models\system_billing;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'system_billing';
    // 資料庫名稱
    protected $table = 'invoice';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'service_id', 'store_id', 'billing_id', 'period_year', 'period_month',
        'invoice_period', 'invoice_no', 'random_no', 'invoice_date', 'invoice_time',
        'seller_id', 'seller_name', 'seller_address', 'seller_person_in_charge', 'seller_telephone_no',
        'seller_facsimile_no', 'seller_email', 'seller_customer_no', 'seller_role_remark',
        'buyer_id', 'buyer_name', 'buyer_address', 'buyer_person_in_charge',
        'buyer_telephone_no', 'buyer_facsimile_no', 'buyer_email', 'buyer_customer_no',
        'buyer_role_remark', 'check_no', 'buyer_remark', 'main_remark', 'customs_clearance_mark',
        'category', 'relate_no', 'invoice_type', 'group_mark', 'carrier_id',
        'donate_mark', 'print_mark', 'attachment', 'sales_amount', 'tmp_sales_amount',
        'free_tax_amount', 'zero_tax_amount', 'tax_type', 'tax_rate', 'tax_amount',
        'tmp_tax_amount', 'tmp_status', 'total_amount', 'order_info', 'discount_amount',
        'original_currency_amount', 'exchange_rate', 'currency', 'agent_id', 'agent_upload_status',
        'agent_upload_err_count', 'agent_callout_data', 'agent_callback_message',
        'agent_callout_datetime', 'agent_callback_datetime', 'upload_status', 'upload_err_count',
        'callout_data', 'callback_message', 'callout_datetime', 'callback_datetime', 'created_at',
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

    /**
     * 1:N
     */
    public function detail()
    {
        return $this->hasMany('App\Models\system_billing\Invoice_detail', 'invoice_id', 'id');
    }
}