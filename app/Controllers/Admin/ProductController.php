<?php
require_once APP.'/Models/Brand.php';
require_once APP.'/Models/Product.php';
require_once APP.'/Models/Category.php';
require_once ROOT.'/core/Controller.php';

class ProductController extends Controller 
{
    public function __construct()
    {
        parent::__construct('admin');
    }
    public function index(){
        $products = (new Product())->all();
        $this->render('admin/products/index', ['products'=>$products]);
    }

    public function create(){
        $brands = (new Brand())->all();
        $categories = (new Category())->all();
        $this->render('admin/products/create', compact('brands', 'categories'));
    }

    public function store(){
        // var_dump($this->request);
        // exit();
        $status = $this->request->input['status'] ? 1:0;
        $is_new = $this->request->input['is_new'] ? 1:0;
        $productImage = $this->uploadImage();

        (new Product())->save([
            'name' => $this->request->input['name'],
            'status' => $status,
            'is_new' => $is_new,
            'description' => $this->request->input['description'],
            'price' => $this->request->input['price'],
            'brand_id' => $this->request->input['brand_id'],
            'category_id' => $this->request->input['category_id'],
            'image' => $productImage
        ]);
          
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
        header("Location: $redirect");
    }

    private function uploadImage(){
        if(!empty($this->request->input['image'])){
            $fileName = $this->fileName($this->request->input['image']['name']);

            move_uploaded_file($this->request->input['image']['tmp_name'], STORAGE.'/products/'.$fileName);
            return "http://".$_SERVER['HTTP_HOST']."/storage/uploads/products/".$fileName;
        }      
    }
    private function fileName($fileName){
        return sha1(mt_rand(1, 9999).$fileName.uniqid()).time();
    }

    public function edit($params){
        // print_r($params);
       extract($params);
    //    print_r($id);
       $product = (new Product())->getByPK($id);
       $this->render('admin/products/edit', compact('product'));
    }

    public function update(){
        $status = $this->request->input['status'] ? 1:0;

        (new Product())->update($this->request->input['id'], [
            'name' => $this->request->input['name'],
            'status' => $status ?? 0
        ]);
          
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
        header("Location: $redirect");

       
     }

    public function delete($params){
        extract($params);
        if(isset($this->request->input['submit'])){
            (new Product())->destroy($id);
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
            header("Location: $redirect");
            exit();
        } elseif(isset($this->request->input['reset'])){
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
            header("Location: $redirect");
            exit();
        }
       $product = (new Product())->getByPK($id);
       $this->render('admin/products/delete', compact('product'));
     
    }
}