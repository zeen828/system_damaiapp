<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Admin_account_store extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'admin_account_store';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'name', 'store_id', 'store_name', 'admin_id', 'rules',
        'allow_process', 'create_time'
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
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';

    /**
     * 店家端帳號關聯
     * 1:n
     */
    public function account()
    {
        return $this->hasMany('App\Models\idelivery\Admin_account', 'admin_account_store_id', 'id');
    }
}
