<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//軟刪除

class Store extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'store';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'company_id', 'head_store_id', 'area_id', 'business_registration', 'uniform_numbers',
        'name', 'district_id', 'city_id', 'post_code', 'district_name',
        'address', 'latitude', 'longitude', 'order_phone', 'order_fax',
        'order_mobile_phone', 'image', 'status', 'description', 'intro_url',
        'supervisor_name', 'supervisor_phone', 'supervisor_email', 'is_cooperation', 'off_date',
        'business_hours', 'order_hours', 'carry_out_conditions', 'allow_order_delivery', 'take_out',
        'delivery_order', 'delivery_conditions', 'delivery_interval_quota', 'order_flow', 'promotion_amount',
        'promotion_discount', 'sw_app', 'sw_pos', 'sw_reward', 'sw_r_point',
        'sw_r_campaign', 'sw_use', 'sw_u_exchange', 'sw_u_campaign', 'sw_u_coupon',
        'billing_day', 'invoice_third_id', 'invoice_third_account', 'invoice_third_password',
        'deleted_at', 'create_time', 'updated_at'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 軟刪除
    use SoftDeletes;
    // 是否自動待時間撮
    public $timestamps = true;
    // 時間撮保存格式
    //protected $dateFormat = 'U';
    // 自訂時間撮欄位
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'updated_at';

    public function campaign_setting_form()
    {
        return $this->hasMany('App\Models\idelivery\Campaign_setting_form', 'store_id', 'id');
    }
}
