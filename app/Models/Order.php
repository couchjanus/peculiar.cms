<?php
namespace App\Models;

use Core\Model;

class Order extends Model 
{
    protected static string $table = "orders";
    protected static string $pk = "id";
}