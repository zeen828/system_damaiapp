<?php

namespace App\Admin\Controllers\Management;

use App\Models\system_damaiapp\Company;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CompanyController extends Controller
{
    use ModelForm;
    public $status_arr = array(
        'on'  => array('value' => 1, 'text' => '正常', 'color' => 'primary'),
        'off' => array('value' => 0, 'text' => '關閉', 'color' => 'default'),
    );

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('產品管理>>' . trans('backend.company.config'));
            $content->description(trans('admin.browse'));

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('產品管理>>' . trans('backend.company.config'));
            $content->description(trans('admin.edit'));

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('產品管理>>' . trans('backend.company.config'));
            $content->description(trans('admin.new'));

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Company::class, function (Grid $grid) {

            // 禁止功能
            //$grid->disableCreation();//創建
            //$grid->disablePagination();//分頁
            $grid->disableFilter();//查詢
            $grid->disableExport();//匯出
            $grid->disableRowSelector();//多選
            //$grid->disableActions();//操作

            $grid->id('ID')->sortable();

            $grid->column('brand', trans('backend.company.field.brand'));
            $grid->column('name', trans('backend.company.field.name'));

            $grid->column('sw_report', trans('backend.company.field.sw_report'))->switch($this->status_arr);
            $grid->column('status', trans('backend.company.field.status'))->switch($this->status_arr);

            $grid->created_at(trans('admin.created_at'));
            $grid->updated_at(trans('admin.updated_at'));
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Company::class, function (Form $form) {

            $form->hidden('id', 'ID');

            $form->text('brand', trans('backend.company.field.brand'))->placeholder('請輸入...')->rules('required');
            $form->textarea('description', trans('backend.company.field.description'))->rows(10);
            $form->text('name', trans('backend.company.field.name'));
            $form->image('image', trans('backend.company.field.image'))
                ->move(env('ADMIN_UPLOAD_PATH', '') . 'company/image/sign')->uniqueName();
            $form->image('policy', trans('backend.company.field.policy'))
                ->move(env('ADMIN_UPLOAD_PATH', '') . 'company/html/{id}')->name(function ($file) {
                    return 'policy.html';
                });
            $form->image('info', trans('backend.company.field.info'))
                ->move(env('ADMIN_UPLOAD_PATH', '') . 'company/html/{id}')->name(function ($file) {
                    return 'menu.html';
                });
            $form->image('about', trans('backend.company.field.about'))
                ->move(env('ADMIN_UPLOAD_PATH', '') . 'company/html/{id}')->name(function ($file) {
                    return 'store_intro.html';
                });

            $form->switch('sw_reward', '獎勵開關')->states($this->status_arr)->default('0');
            $form->switch('sw_use', '使用開關')->states($this->status_arr)->default('0');
            $form->switch('sw_report', '報表開關')->states($this->status_arr)->default('0');

            $form->switch('status', trans('backend.company.field.status'))->states($this->status_arr)->default('1');

            $form->hidden('created_at', 'Created At');
            $form->hidden('updated_at', 'Updated At');
            //$form->saving(function (Form $form) {
                //var_dump($form);
               //exit();
            //});
        });
    }
}
