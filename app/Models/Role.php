<?php

require_once ROOT."/core/Model.php";

class Role extends Model 
{
    protected static string $table = "roles";
    protected static string $pk = "id";
}