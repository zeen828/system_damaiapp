<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign_setting extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'campaign_setting';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'types', 'company_id', 'store_id', 'title', 'description',
        'kind', 'kind_value', 'max_qty', 'sn_gen', 'sn_length',
        'sn_gen_status', 'used_count', 'user_use_count', 'condition_table', 'offer_table',
        'offer_max_value', 'product_delivery', 'repeat', 'plural', 'locks',
        'online', 'remark', 'hidden', 'sort_by', 'status', 'is_default',
        'start_at', 'end_at', 'created_at', 'updated_at', 'deleted_at'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 是否自動待時間撮
    public $timestamps = true;
    // 時間撮保存格式
    //protected $dateFormat = 'U';
    // 軟刪除
    // use SoftDeletes;
    // 自訂時間撮欄位
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function coupons()
    {
        return $this->hasMany('App\Models\idelivery\Coupon', 'setting_id', 'id');
    }

    public function condition_qty()
    {
        return $this->hasOne('App\Models\idelivery\Condition_qty','setting_id', 'id');
    }

    public function condition_amount()
    {
        return $this->hasOne('App\Models\idelivery\Condition_amount','setting_id', 'id');
    }

    public function condition_amount_menu_group()
    {
        return $this->hasOne('App\Models\idelivery\Condition_amount_menu_group','setting_id', 'id');
    }

    public function condition_amount_menu_item()
    {
        return $this->hasOne('App\Models\idelivery\Condition_amount_menu_item','setting_id', 'id');
    }

    public function condition_qty_menu_group()
    {
        return $this->hasOne('App\Models\idelivery\Condition_qty_menu_group','setting_id', 'id');
    }

    public function condition_qty_menu_item()
    {
        return $this->hasOne('App\Models\idelivery\Condition_qty_menu_item','setting_id', 'id');
    }

    public function offer_amount()
    {
        return $this->hasOne('App\Models\idelivery\Offer_amount','setting_id', 'id');
    }

    public function offer_discount()
    {
        return $this->hasOne('App\Models\idelivery\Offer_discount','setting_id', 'id');
    }

    public function offer_qty()
    {
        return $this->hasOne('App\Models\idelivery\Offer_qty','setting_id', 'id');
    }

    public function offer_coupon()
    {
        return $this->hasOne('App\Models\idelivery\Offer_coupon', 'setting_id', 'id');
    }

    public function offer_amount_menu_group()
    {
        return $this->hasOne('App\Models\idelivery\Offer_amount_menu_group', 'setting_id', 'id');
    }

    public function offer_amount_menu_group_n()
    {
        return $this->hasOne('App\Models\idelivery\Offer_amount_menu_group_n', 'setting_id', 'id');
    }

    public function offer_amount_menu_item()
    {
        return $this->hasOne('App\Models\idelivery\Offer_amount_menu_item', 'setting_id', 'id');
    }

    public function offer_amount_menu_item_n()
    {
        return $this->hasOne('App\Models\idelivery\Offer_amount_menu_item_n', 'setting_id', 'id');
    }

    public function offer_discount_menu_group()
    {
        return $this->hasOne('App\Models\idelivery\Offer_discount_menu_group', 'setting_id', 'id');
    }

    public function offer_discount_menu_group_n()
    {
        return $this->hasOne('App\Models\idelivery\Offer_discount_menu_group_n', 'setting_id', 'id');
    }

    public function offer_discount_menu_item()
    {
        return $this->hasOne('App\Models\idelivery\Offer_discount_menu_item', 'setting_id', 'id');
    }

    public function offer_discount_menu_item_n()
    {
        return $this->hasOne('App\Models\idelivery\Offer_discount_menu_item_n', 'setting_id', 'id');
    }

    public function offer_qty_menu_group()
    {
        return $this->hasOne('App\Models\idelivery\Offer_qty_menu_group', 'setting_id', 'id');
    }

    public function offer_qty_menu_group_n()
    {
        return $this->hasOne('App\Models\idelivery\Offer_qty_menu_group_n', 'setting_id', 'id');
    }

    public function offer_qty_menu_item()
    {
        return $this->hasOne('App\Models\idelivery\Offer_qty_menu_item', 'setting_id', 'id');
    }

    public function offer_qty_menu_item_n()
    {
        return $this->hasOne('App\Models\idelivery\Offer_qty_menu_item_n', 'setting_id', 'id');
    }

    public function offer_points()
    {
        return $this->hasOne('App\Models\idelivery\Offer_points', 'setting_id', 'id');
    }

    public function store()
    {
        return $this->hasOne('App\Models\idelivery\Store', 'id', 'store_id');
    }

    // public function setWeekDaysAttribute($value)
    // {
    //     if (!empty($value) && is_array($value))
    //     {
    //         $this->attributes['week_days'] = implode(",", $value);
    //     } else {
    //         $this->attributes['week_days'] = null;
    //     }

    // }
}