<?php

class AccueilController extends Controller{

	public function index(){

	    //liste des categorys :
        $categories = CategoryModel::getAll();
//        d($categories);
        //on envoie la liste des categorys à la vue
        $this->set(array('categories'=>$categories));

		$this->render('index');
	}

}