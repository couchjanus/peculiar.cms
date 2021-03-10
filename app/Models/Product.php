<?php
namespace App\Models;

use Core\Model;


class Product extends Model 
{
    protected static string $table = "products";
    protected static string $pk = "id";
}