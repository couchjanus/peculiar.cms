<?php
namespace App\Controllers\Admin;

// use Core\Controller;

class DashboardController extends AdminController 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->render('admin/index', ['title'=>'Admin Dashboard']);
    }
}
