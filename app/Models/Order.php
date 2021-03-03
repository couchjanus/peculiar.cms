<?php

require_once ROOT."/core/Model.php";

class Order extends Model 
{
    protected static string $table = "orders";
    protected static string $pk = "id";
}