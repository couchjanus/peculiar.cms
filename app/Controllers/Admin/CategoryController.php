<?php
namespace App\Controllers\Admin;

// use Core\Controller;
use App\Models\Category;

class CategoryController extends AdminController 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $categories = (new Category())->all();
        // var_dump($categories);
        $this->render('admin/categories/index', ['categories'=>$categories]);
    }

    public function create(){
        $this->render('admin/categories/create');
    }

    public function store(){

        // $status = $this->request->input['status'] ? 1:0;
        // var_dump($this->request->input['status']);
        // exit();
        if(isset($this->request->input['status'])){
            $status = 1;
        }else{
            $status = 0;
        }


        (new Category())->save([
            'name' => $this->request->input['name'],
            'status' => $status
        ]);
          
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
        header("Location: $redirect");
    }

    public function edit($params){
        // print_r($params);
       extract($params);
    //    print_r($id);
       $category = (new Category())->getByPK($id);
       $this->render('admin/categories/edit', ['category'=>$category]);
    }

    public function update(){
        $status = $this->request->input['status'] ? 1:0;

        (new Category())->update($this->request->input['id'], [
            'name' => $this->request->input['name'],
            'status' => $status ?? 0
        ]);
          
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
        header("Location: $redirect");

       
     }

    public function delete($params){
        extract($params);
        if(isset($this->request->input['submit'])){
            (new Category())->destroy($id);
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
            header("Location: $redirect");
            exit();
        } elseif(isset($this->request->input['reset'])){
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
            header("Location: $redirect");
            exit();
        }
       $category = (new Category())->getByPK($id);
       $this->render('admin/categories/delete', ['category'=>$category]);
     
    }
}