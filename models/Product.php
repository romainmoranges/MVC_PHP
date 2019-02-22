<?php
class ProductModel extends Model{

    public $id;
    public $description;
    public $name;
    public $price;
    public $quantity;
    public $reference;
    public $short_description;
    public $id_category;

    public function __construct($id = null)
    {
        parent::__construct();
        if(!is_null($id)){
            $data = $this->select($id);
            foreach($data as $key=>$value){
                if(property_exists($this, $key))
                    $this->$key = $value;
            }
        }
    }

    //CRUD
    public function select($id){
        $req = $this->bdd->prepare('SELECT * FROM product WHERE id =:id');
        $req->bindValue('id', $id);
        $req->execute();
        return $req->fetch();
    }

    protected function update(){
        $req = $this->bdd->prepare('
          UPDATE product set description=:description, name=:name, price=:price, quantity=:quantity, reference=:reference,short_description=:short_description, id_category=:id_category
          WHERE id=:id');

        $req->bindValue('id', $this->id, PDO::PARAM_STR);
        $req->bindValue('description', $this->description, PDO::PARAM_STR);
        $req->bindValue('name', $this->name, PDO::PARAM_STR);
        $req->bindValue('price', $this->price, PDO::PARAM_INT);
        $req->bindValue('quantity', $this->quantity, PDO::PARAM_STR);
        $req->bindValue('reference', $this->reference, PDO::PARAM_STR);
        $req->bindValue('short_description', $this->short_description, PDO::PARAM_STR);
        $req->bindValue('id_category', $this->id_category, PDO::PARAM_INT);

        $req->execute();
    }

    protected function insert(){
        $req = $this->bdd->prepare('INSERT INTO product (description, name, price, quantity, reference, short_description, id_category)'. ' VALUES(:description, :name, :price, :quantity, :reference, :short_description, :id_category)');

        $req->bindValue('description', $this->description, PDO::PARAM_STR);
        $req->bindValue('name', $this->name, PDO::PARAM_STR);
        $req->bindValue('price', $this->price, PDO::PARAM_INT);
        $req->bindValue('quantity', $this->quantity, PDO::PARAM_STR);
        $req->bindValue('reference', $this->reference, PDO::PARAM_STR);
        $req->bindValue('short_description', $this->short_description, PDO::PARAM_STR);
        $req->bindValue('id_category', $this->id_category, PDO::PARAM_INT);

        $req->execute();
        $this->id = $this->bdd->lastInsertId();
    }

    public function save(){
        if(is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

    public function delete(){
        $req = $this->bdd->prepare('DELETE FROM product WHERE id=:id');
        $req->bindValue('id', $this->id);
        $req->execute();
    }

    public static function getAll(){
        $model = self::getInstance();
        $req = $model->bdd->prepare('SELECT id FROM product');
        $req->execute();
        $products = array();
        while($row = $req->fetch()){
            $product = new ProductModel($row['id']);
            $products[] = $product;
        }
        return $products;
    }

    public static function getAllByCategory($id_category){
        $model = self::getInstance();
        $req = $model->bdd->prepare('SELECT id FROM product WHERE id_category=:id_category');
        $req->bindValue('id_category', $id_category, PDO::PARAM_INT);
        $req->execute();
        $products = array();
        while($row = $req->fetch()){
            $product = new ProductModel($row['id']);
            $products[] = $product;
        }
        return $products;
    }
}