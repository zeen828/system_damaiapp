<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Cuisine_unit extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'cuisine_unit';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'company_id', 'store_id', 'unit_name', 'is_multiple', 'is_required',
        'sort_by', 'created_at', 'updated_at'
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

    // 排序模組
    use SortableTrait;
    public $sortable = [
        'order_column_name' => 'sort_by',
        'sort_when_creating' => true,
    ];

    public static function grid($callback)
    {
        return new Grid(new static, $callback);
    }

    public static function form($callback)
    {
        return new Form(new static, $callback);
    }

    //名稱務必要小寫
    public function group()
    {
        return $this->belongsToMany('App\Models\idelivery\Cuisine_group', 'cuisine_unit_group', 'unit_id', 'group_id');
    }

    //名稱務必要小寫
    public function attrs()
    {
        return $this->hasMany('App\Models\idelivery\Cuisine_attr', 'unit_id', 'id');
    }


    //名稱務必要小寫
    public function item()
    {
        return $this->belongsToMany('App\Models\idelivery\Menu_item', 'menu_item_unit', 'unit_id', 'item_id');
    }
}
