<?php

namespace App\Models\system_member;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'system_member';
    // 資料庫名稱
    protected $table = 'member';
    // 主鍵欄位
    //protected $primaryKey = 'id';
    // 主鍵型態
    //protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'country', 'account', 'created_at', 'updated_at'
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
     * 會員詳細資料關聯(帳號下會因為產品品牌有個別的註冊會員)
     * 1:N
     */
    public function detail()
    {
        return $this->hasMany('App\Models\system_member\Member_detail', 'member_id', 'id');
    }

    /**
     * 檢查會員有無重複(暫定會員)
     * @param $query    查詢語法
     * @param $country  國碼
     * @param $account  帳號
     * @return mixed
     */
    public function scopeConfirmRepeat($query, $country, $account)
    {
        return $query
            ->where('country', '=', $country)
            ->where('account', '=', $account);
    }
}
