<?php
/**
 * Created by PhpStorm.
 * User: cecyu
 * Date: 2018/8/31
 * Time: 下午 02:21
 */

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'billing';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'pos_billing_id', 'order_id', 'service_id', 'company_id', 'company_name',
        'store_id', 'store_name', 'member_id', 'member_name', 'purchase_phone',
        'product_delivery', 'total_qty', 'amount_src', 'amount_campaign', 'amount_coupon',
        'amount_custom', 'amount', 'delivery_post_code', 'delivery_address', 'delivery_lng',
        'delivery_lat', 'prefer_datetime', 'comment', 'billing_day', 'menu_version',
        'status', 'cancel_reason', 'completed_at', 'created_time', 'created_at',
        'updated_at', 'deleted_at', 'member_info_log_id'
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
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';

    public function member_info_log()
    {
        return $this->hasOne('App\Models\system_member\Member_info_log', 'id', 'member_info_log_id');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\idelivery\Billing_detail', 'billing_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Models\system_billing\Invoice', 'billing_id', 'id');
    }

    public function marketing()
    {
        return $this->hasOne('App\Models\idelivery\Billing_marketing', 'billing_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\idelivery\Member', 'member_id', 'id');
    }
}
