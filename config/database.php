<?php
return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
			    'database_type' => 'mysql',
			    'database_name' => 'test',
			    'server' => 'localhost',
			    'username' => 'root',
			    'password' => '000',
			    'charset' => 'utf8',
			    'port' => 3306,
			    'prefix' => '',
			    // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
			    'option' => [
			        PDO::ATTR_CASE => PDO::CASE_NATURAL
			    ]
        ],
    ],
];