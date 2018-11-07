<?php

namespace App\Admin\Controllers\Management;

use App\Models\system_damaiapp\App;
use App\Models\system_damaiapp\Service;
use App\Models\system_damaiapp\Company;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AppController extends Controller
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

            $content->header('產品管理>>' . trans('backend.app.config'));
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

            $content->header('產品管理>>' . trans('backend.app.config'));
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

            $content->header('產品管理>>' . trans('backend.app.config'));
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
        return Admin::grid(App::class, function (Grid $grid) {

            // 禁止功能
            //$grid->disableCreation();//創建
            //$grid->disablePagination();//分頁
            $grid->disableFilter();//查詢
            $grid->disableExport();//匯出
            $grid->disableRowSelector();//多選
            //$grid->disableActions();//操作

            $grid->id('ID')->sortable();

            $grid->column('service.title', trans('backend.service.title'));
            $grid->column('company.id', trans('backend.company.title'));
            $grid->column('company.brand', trans('backend.company.title'));
            $grid->column('title', trans('backend.app.field.title'));
            $grid->column('status', trans('backend.app.field.status'))->switch($this->status_arr);

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
        return Admin::form(App::class, function (Form $form) {

            $form->hidden('id', 'ID');

            $form->select('service_id', trans('backend.app.field.service_id'))->options(Service::pluck('title', 'id'))->rules('required');
            $form->select('company_id', trans('backend.app.field.company_id'))->options(Company::pluck('brand', 'id'))->rules('required');
            $form->text('title', trans('backend.app.field.title'))->placeholder('請輸入...')->rules('required');
            $form->textarea('description', trans('backend.app.field.description'))->rows(10);
            $form->text('fcm_key', trans('backend.app.field.fcm_key'));
            $form->switch('status', trans('backend.app.field.status'))->states($this->status_arr)->default('1');

            $form->hidden('created_at', 'Created At');
            $form->hidden('updated_at', 'Updated At');
        });
    }
}
