<?php

require_once ROOT."/core/Model.php";

class User extends Model 
{
    protected static string $table = "users";
    protected static string $pk = "id";
}