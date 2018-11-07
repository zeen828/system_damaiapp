<?php

return [
    'service' => [
        'title' => '服務項目',
        'config' => '服務項目設定',
        'admin' => '服務項目管理',
        'name' => '服務項目名稱',
        'tab' => [
        ],
        'field' => [
            'title' => '標題',
            'description' => '描述',
            'status' => '狀態',
        ],
    ],
    'company' => [
        'title' => '公司品牌',
        'config' => '公司品牌設定',
        'admin' => '公司品牌管理',
        'name' => '公司品牌名稱',
        'tab' => [
        ],
        'field' => [
            'brand' => '品牌',
            'description' => '描述',
            'name' => '名稱',
            'image' => '示意圖',
            'policy' => '服務條款',
            'info' => '介紹',
            'about' => '關於我們',
            'sw_reward' => '獎勵開關',
            'sw_use' => '使用開關',
            'sw_report' => '報表開關',
            'status' => '狀態',
        ],
    ],
    'app' => [
        'title' => 'APP產品',
        'config' => 'APP產品設定',
        'admin' => 'APP產品管理',
        'name' => 'APP產品名稱',
        'tab' => [
        ],
        'field' => [
            'service_id' => '服務項目',
            'company_id' => '公司品牌',
            'title' => '標題',
            'description' => '描述',
            'fcm_key' => 'FCM金鑰',
            'status' => '狀態',
        ],
    ],
];
