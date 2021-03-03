<?php
const ROOT = __DIR__;
require_once __DIR__.'/config/app.php';
require_once __DIR__.'/core/Connection.php';
$db = Connection::connect();

$sql = <<<SQL
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) unsigned NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '1',
 `products` text NOT NULL,
 `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;


$db->exec($sql);

echo "Success\n\n";
