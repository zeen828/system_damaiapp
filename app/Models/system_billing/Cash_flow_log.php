<?php
/**
 * Created by PhpStorm.
 * User: cecyu
 * Date: 2018/8/31
 * Time: 下午 02:33
 */
namespace App\Models\system_billing;

use Illuminate\Database\Eloquent\Model;

class Cash_flow_log extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'system_billing';
    // 資料庫名稱
    protected $table = 'cash_flow_log';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'service_id', 'store_id', 'billing_id', 'payment_type_id', 'payment_status',
        'payment_callout', 'payment_callback', 'callout_datetime', 'callback_datetime', 'payment_time',
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