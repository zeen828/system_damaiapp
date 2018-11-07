<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin_roles extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'admin_roles';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'id', 'company_id', 'store_id', 'admin_role_id', 'name',
        'title', 'slug',
        'deleted_at', 'created_at', 'updated_at'
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
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';

    /**
     * 取得父
     */
    public function father()
    {
        return $this->hasMany('App\Models\idelivery\Admin_roles', 'id', 'admin_role_id');
    }

    /**
     * 取得子
     */
    public function child()
    {
        return $this->hasMany('App\Models\idelivery\Admin_roles', 'admin_role_id', 'id');
    }

    /**
     * 多對多關聯使用者
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\idelivery\Admin_users', 'admin_role_users', 'role_id', 'user_id');
    }

    /**
     * 多對多關聯目錄
     */
    public function menu()
    {
        return $this->belongsToMany('App\Models\idelivery\Admin_menu', 'admin_role_menu', 'role_id', 'menu_id');
    }

    /**
     * 多對多關聯權限
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\idelivery\Admin_permissions', 'admin_role_permissions', 'role_id', 'permission_id');
    }
}
