<?php
require_once ROOT.'/core/Controller.php';

class BlogController extends Controller
{
    public function __construct()
    {
        parent::__construct('app');
    }
    public function index()
    {
        $title = "Blog Page From Controller Compact";
        $this->render('blog/index', compact('title'));
    }

}
