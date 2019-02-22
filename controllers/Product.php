<?php

class ProductController extends Controller{

    public function index(){
        $products = ProductModel::getAll();
        d($products);
    }

    public function detail(){
        if(isset($_GET['id_product'])){
            $product = new ProductModel($_GET['id_product']);
            $this->set(array('product'=>$product));
            $this->render('detail');
        }else
            header('Location: '.WEBROOT);
    }

    public function creermodifier(){
        if(!empty($_POST)){
            $id_product  = isset($_GET['id_product']) && $_GET['id_product']!=''?$_GET['id_product']:null;
            $product = new ProductModel($id_product);
            $product->description = $_POST['description'];
            $product->name = $_POST['name'];
            $product->price = $_POST['price'];
            $product->quantity = $_POST['quantity'];
            $product->reference = $_POST['reference'];
            $product->short_description = $_POST['short_description'];
            $product->id_category = $_POST['id_category'];
            $product->save();
            $_GET['id'] = $product->id;
        }

        $id_product  = isset($_GET['id_product']) && $_GET['id_product']!=''?$_GET['id_product']:null;
        $product = new ProductModel($id_product);

        $categories = CategoryModel::getAll();

        $this->set(array('product'=>$product, 'categories'=>$categories));
        $this->render('creermodifier');

    }

    public function supprimer(){
        if(isset($_GET['id_product'])){
            $product = new ProductModel($_GET['id_product']);
            $id_category=$product->id_category;
            $product->delete();
            header('Location: '.WEBROOT.'category/liste?id=' . $id_category);
        }else
            header('Location: '.WEBROOT);
    }
}