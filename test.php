<?php
const ROOT = __DIR__;
require_once __DIR__.'/config/app.php';
require_once __DIR__.'/core/Connection.php';
$db = Connection::connect();

$sql = <<<SQL
DROP TABLE IF EXISTS roles; 
CREATE TABLE roles (
   id int(11) NOT NULL AUTO_INCREMENT,
   name varchar(25) NOT NULL,
   PRIMARY KEY (id)
);
INSERT INTO `roles` (`id`, `name`) 
VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'customer');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `role_id` int(11) unsigned NOT NULL DEFAULT '3',
 `status` tinyint(1) NOT NULL DEFAULT '1',
 `first_name` varchar(20) DEFAULT NULL,
 `last_name` varchar(20) DEFAULT NULL,
 `phone_number` varchar(13) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;


$db->exec($sql);

echo "Success\n\n";
