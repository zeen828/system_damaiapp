<?php

namespace App\Models\idelivery;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Form;
use Encore\Admin\Grid;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Support\Facades\Session;

class Cuisine_group extends Model implements Sortable
{
    // 指定資料庫連線名稱
    protected $connection = 'idelivery';
    // 資料庫名稱
    protected $table = 'cuisine_group';
    // 主鍵欄位
    protected $primaryKey = 'id';
    // 主鍵型態
    protected $keyType = 'int';
    // 欄位名稱
    protected $fillable = [
        'company_id', 'store_id', 'group_name', 'hidden', 'status',
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
    public function category()
    {
        return $this->belongsToMany('App\Models\idelivery\Cuisine_category', 'cuisine_group_category', 'group_id', 'category_id');
    }

    public function type()
    {
        return $this->belongsToMany('App\Models\idelivery\Cuisine_type', 'cuisine_group_type', 'group_id', 'type_id');
    }

    public function unit()
    {
        return $this->belongsToMany('App\Models\idelivery\Cuisine_unit', 'cuisine_unit_group', 'group_id', 'unit_id');
    }

    public function menuitem()
    {
        return $this->hasMany('App\Models\idelivery\Menu_item', 'group_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($cuisine_group) {
            $action_roles = Session::get('action_roles');
            switch ($action_roles){
                case 'company':
                    if ($cuisine_group->store_id == 0){
                        $cuisine_group->category()->detach();
                        $cuisine_group->type()->detach();
                        $cuisine_group->unit()->detach();
                        $cuisine_group->menuitem()->delete();
                    }else{
                        admin_toastr('無刪除權限!','warning');
                        exit();
                    }
                    break;
                case 'store':
                    $store_id = Session::get('store_id');
                    if ($cuisine_group->store_id == $store_id){
                        $cuisine_group->category()->detach();
                        $cuisine_group->type()->detach();
                        $cuisine_group->unit()->detach();
                        $cuisine_group->menuitem()->delete();
                    }else{
                        admin_toastr('無刪除權限!','warning');
                        exit();
                    }
                    break;
                default:
                    admin_toastr('無刪除權限!','warning');
                    exit();
                    break;
            }
        });
    }

}
