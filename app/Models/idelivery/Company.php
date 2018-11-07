<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'company';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'id', 'brand', 'name', 'uniform_numbers', 'supervisor_name',
        'supervisor_phone', 'supervisor_email', 'district_id', 'city_id', 'post_code',
        'district_name', 'address', 'image', 'profit', 'bank',
        'bank_branch', 'bank_account', 'passbook_picture', 'remarks', 'status',
        'deleted_at', 'create_time', 'updated_at'
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
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'updated_at';

    public function campaign_setting_form()
    {
        return $this->hasMany('App\Models\idelivery\Campaign_setting_form', 'company_id', 'id');
    }
}
