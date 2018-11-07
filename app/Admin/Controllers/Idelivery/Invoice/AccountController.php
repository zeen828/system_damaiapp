<?php

namespace App\Admin\Controllers\Idelivery\Invoice;

use App\Models\system_billing\Invoice_account;
use App\Models\system_damaiapp\Service;
use App\Models\idelivery\Store;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AccountController extends Controller
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

            $content->header('愛外送>>發票管理>>帳號設定');
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

            $content->header('愛外送>>發票管理>>帳號設定');
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

            $content->header('愛外送>>發票管理>>帳號設定');
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
        return Admin::grid(Invoice_account::class, function (Grid $grid) {

            $grid->model()->where('service_id', '=', 2);

            $grid->id('ID')->sortable();

            $grid->column('service.title', trans('backend.service.title'));
            $grid->column('store.name', '店家');
            $grid->column('agent_id', '發票廠商');
            $grid->column('status', trans('backend.app.field.status'))->switch($this->status_arr);

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Invoice_account::class, function (Form $form) {

            $form->hidden('id', 'ID');

            $form->hidden('service_id')->default(2);
            $form->select('store_id', '店家')->options(Store::pluck('name', 'id'))->rules('required');
            $form->select('agent_id', '發票廠商')->options(array('1'=>'新電科技'))->rules('required');;
            $form->select('kind', '使用類型')->options(array('1'=>'api','2'=>'後台'))->rules('required');;
            $form->text('account', '帳號')->placeholder('請輸入')->rules('required');
            $form->text('password', '密碼')->placeholder('請輸入')->rules('required');
            $form->switch('status', trans('backend.app.field.status'))->states($this->status_arr)->default('1');

            $form->hidden('created_at', 'Created At');
            $form->hidden('updated_at', 'Updated At');
        });
    }
}
