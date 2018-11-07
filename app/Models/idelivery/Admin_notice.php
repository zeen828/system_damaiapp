<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Spatie\EloquentSortable\Sortable;
//use Spatie\EloquentSortable\SortableTrait;

class Admin_notice extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'admin_notice';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'model', 'company_id', 'store_id', 'title', 'url',
        'desc', 'start_at', 'end_at',
        'created_at', 'updated_at'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [];
    // 軟刪除, 排序
    use SoftDeletes;//, SortableTrait;
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
    public function company()
    {
        return $this->hasOne('App\Models\system_damaiapp\Company', 'id', 'company_id');
    }

    /**
     * 1:1
     */
    public function store()
    {
        return $this->hasOne('App\Models\idelivery\Store', 'id', 'store_id');
    }
}
