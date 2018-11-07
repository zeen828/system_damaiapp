<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    //產品管理
    $router->resources([
        'management/config/service'                                => Management\ServiceController::class,//產品管理>>服務項目設定
        'management/config/company'                                => Management\CompanyController::class,//產品管理>>公司品牌設定
        'management/config/app'                                    => Management\AppController::class,//產品管理>>APP產品設定
    ]);
    //愛劇團
    //愛外送
    $router->resources([
        'idelivery/admin/invoice/config/account'                    => Idelivery\Invoice\AccountController::class,//愛外送>>發票管理>>帳號設定
    ]);
});
