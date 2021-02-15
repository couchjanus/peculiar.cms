<?php

class BlogController
{
    public function index()
    {
        $title = "Blog Page From Controller Compact";
        render('blog/index', compact('title'));
    }

}
