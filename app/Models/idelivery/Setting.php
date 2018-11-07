<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'setting';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'company_id', 'store_id', 'type', 'sn', 'title',
        'content', 'status'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 軟刪除
    //use SoftDeletes;
    // 是否自動待時間撮
    //public $timestamps = true;
    // 時間撮保存格式
    //protected $dateFormat = 'U';
    // 自訂時間撮欄位
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';

    /**
     * 設定條件是取"關於我們"
     * 範例:$about = Setting::GetAbout($company_id)->first();
     * @param $query        系統需要
     * @param $company_id   品牌ID
     * @return mixed
     */
    public function scopeGetAbout($query, $company_id)
    {
        return $query->where('company_id', '=', $company_id)->where('type', '=', 1)->where('status', '=', 1);
    }

    /**
     * 設定條件是取"餐點介紹"
     * 範例:$product = Setting::GetProduct($company_id)->first();
     * @param $query        系統需要
     * @param $company_id   品牌ID
     * @return mixed
     */
    public function scopeGetProduct($query, $company_id)
    {
        return $query->where('company_id', '=', $company_id)->where('type', '=', 2)->where('status', '=', 1);
    }
}
