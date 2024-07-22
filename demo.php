<?php

require "src/functions_include.php";
require "vendor/autoload.php";

$config = require "src/config/database.php";

try{
    $db = new \think\DbManager();
    $db->setConfig($config);
    $db = new \Wwws3\Kingbase\model\Test();

    $data['name'] = '新增';
    $data['sort'] = 1;
    $data['status'] = 0;
    $data['admin_id'] = 111;
    echo $db->getLastSql()."\r\n";
    $res = \Wwws3\Kingbase\model\Test::create($data);
    echo 'id:'.$res->getAttr('id');

    $list = \Wwws3\Kingbase\model\Test::where('status',2)->select()->toArray();
    var_dump($list);
}catch (Exception $e){
    $msg = $e->getMessage();
    echo $msg;
}
