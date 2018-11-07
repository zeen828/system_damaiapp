<?php

namespace App\Models\system_member;

use Illuminate\Database\Eloquent\Model;

use Webpatser\Uuid\Uuid;

class Member_detail extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'system_member';
    // 資料庫名稱
    protected $table = 'member_detail';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'service_id', 'member_id', 'company_id', 'uuid', 'facebook',
        'line', 'image', 'name', 'email', 'phone',
        'captcha', 'valid', 'login_error_num', 'lock', 'status',
        'login_token', 'login_at', 'created_at', 'updated_at'
    ];
    // 隱藏不顯示欄位
    protected $hidden = [
        'password'
    ];
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
     * 觸發事件用
     */
    public static function boot()
    {
        parent::boot();
        //存檔前處理
        self::creating(function ($model) {
            $model->uuid = (string)Uuid::generate();//Uuid是額外套件用MAC去鏟一個長字串
            //$model->uuid = md5($model->id);//未存檔無法抓到ID都是空白MD5重複(不能用)
            //$model->uuid = $model->id;//未存檔無法抓到ID都是空白重複(不能用)
        });
    }

    /**
     * 會員資料關聯
     * 1:1
     */
    public function member()
    {
        return $this->hasOne('App\Models\system_member\Member', 'id', 'member_id');
    }

    /**
     * 檢查會員明細有無重複(正式註冊會員)
     * @param $query        查詢語法
     * @param $service_id   服務ID
     * @param $company_id   品牌ID
     * @param $member_id    會員ID
     * @return mixed
     */
    public function scopeConfirmRepeat($query, $service_id, $company_id, $member_id)
    {
        return $query
            ->where('service_id', '=', $service_id)
            ->where('company_id', '=', $company_id)
            ->where('member_id', '=', $member_id);
    }


}
