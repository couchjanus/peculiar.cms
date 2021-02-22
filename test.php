<?php
const ROOT = __DIR__;
require_once __DIR__.'/config/app.php';
require_once __DIR__.'/core/Connection.php';
$db = new Connection();

$sql = "SELECT * FROM categories";

$stmt = $db->pdo->prepare($sql);
$stmt->execute($data);
$result = $stmt->fetchAll();
echo "Success\n\n";
var_dump($result);