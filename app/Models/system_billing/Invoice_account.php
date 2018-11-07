<?php
/**
 * Created by PhpStorm.
 * User: cecyu
 * Date: 2018/9/4
 * Time: 上午 11:48
 */

namespace App\Models\system_billing;

use Illuminate\Database\Eloquent\Model;

class Invoice_account extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'system_billing';
    // 資料庫名稱
    protected $table = 'invoice_account';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'service_id', 'store_id', 'agent_id', 'kind', 'account',
        'password', 'created_at', 'updated_at'
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
     * 1:1
     */
    public function service()
    {
        return $this->hasOne('App\Models\system_damaiapp\Service', 'id', 'service_id');
    }

    /**
     * 1:1
     */
    public function store()
    {
        return $this->hasOne('App\Models\idelivery\Store', 'id', 'store_id');
    }
}