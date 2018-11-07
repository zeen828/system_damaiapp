<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
// use Spatie\EloquentSortable\Sortable;
// use Spatie\EloquentSortable\SortableTrait;

class Menu_item extends Model
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'menu_item';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'company_id', 'store_id', 'name', 'group_id', 'intro',
        'picture', 'spec_relation', 'hidden', 'status', 'sort_by',
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

    // 排序模組
    // use SortableTrait;
    // public $sortable = [
    //     'order_column_name' => 'sort_by',
    //     'sort_when_creating' => true,
    // ];

    public static function grid($callback)
    {
        return new Grid(new static, $callback);
    }

    public static function form($callback)
    {
        return new Form(new static, $callback);
    }

    public function size()
    {
        return $this->hasMany('App\Models\idelivery\Menu_size', 'item_id', 'id');
    }

    public function unit()
    {
        return $this->belongsToMany('App\Models\idelivery\Cuisine_unit', 'menu_item_unit', 'item_id', 'unit_id');
    }

    public function group()
    {
        return $this->hasOne('App\Models\idelivery\Cuisine_group', 'id', 'group_id');
    }

    public function store()
    {
        return $this->belongsToMany('App\Models\idelivery\Store', 'menu_store_item', 'item_id', 'store_id');
    }
}
