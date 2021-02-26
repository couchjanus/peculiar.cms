<?php
const ROOT = __DIR__;
require_once __DIR__.'/config/app.php';
require_once __DIR__.'/core/Connection.php';
$db = Connection::connect();

$sql = <<<SQL
DROP TABLE IF EXISTS products; 
CREATE TABLE products(
    id int(11) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    status tinyint(1) DEFAULT 1,
    category_id int(11) unsigned NOT NULL,
    brand_id int(11) unsigned NOT NULL, 
    description text,
    price float unsigned NOT NULL,
    is_new tinyint(1) DEFAULT 1,
    id_recommende tinyint(1) DEFAULT 1,
    image varchar(255) NOT NULL,
    PRIMARY KEY(id)
)
SQL;


$db->exec($sql);

echo "Success\n\n";
