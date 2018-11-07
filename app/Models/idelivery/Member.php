<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'member';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'uuid', 'status', 'is_lock', 'company_id', 'is_valid',
        'captcha', 'login_token', 'country', 'account', 'name',
        'email', 'post_code', 'address', 'contact_phone', 'facebook_id',
        'line_id', 'personal_img', 'login_error_num', 'os', 'app_version',
        'token', 'last_login_time', 'create_time'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [
        'password'
    ];
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
     * 與新會員系統關聯
     */
    public function member()
    {
        return $this->hasOne('App\Models\system_member\Member', 'account', 'account');
    }
}
