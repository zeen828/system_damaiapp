<?php
/**
 * Created by PhpStorm.
 * User: cecyu
 * Date: 2018/8/31
 * Time: 下午 02:29
 */

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Billing_marketing extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'billing_marketing';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'billing_id', 'marketing_type', 'marketing_sn', 'setting_id', 'deduct_amount',
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