<?php
class CategoryController extends Controller{

    public function liste(){
        if(isset($_GET['id'])){
            $category = new CategoryModel($_GET['id']);
            $products = ProductModel::getAllByCategory($_GET['id']);
            //je peux envoyer plusieurs variables d'un coup à la vue :
            $this->set(array(
                'category'=> $category,
                'products'=> $products,
            ));

            $this->render('liste');
        }else{
            header('Location: '.WEBROOT);
        }
    }
    public function creermodifier(){
        if(!empty($_POST)){
            $id_category  = isset($_GET['id']) && $_GET['id']!=''?$_GET['id']:null;
            $category = new CategoryModel($id_category);
            $category->name = $_POST['name'];
            $category->description = $_POST['description'];
            $category->save();
            $_GET['id'] = $category->id;
        }
        $id_category  = isset($_GET['id']) && $_GET['id']!=''?$_GET['id']:null;
        $category = new CategoryModel($id_category);

        $this->set(array('category'=>$category));
        $this->render('creermodifier');
    }
}