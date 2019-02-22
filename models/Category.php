<?php
class CategoryModel extends Model{

    public $id;
    public $name;
    public $description;

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
        $req = $this->bdd->prepare('SELECT * FROM category WHERE id = :id');
        $req->bindValue('id', $id);
        $req->execute();
        return $req->fetch();
    }

    protected function update(){
        $req = $this->bdd->prepare('UPDATE category set name=:name, description=:description WHERE id=:id');

        $req->bindValue('id', $this->id, PDO::PARAM_STR);
        $req->bindValue('name', $this->name, PDO::PARAM_STR);
        $req->bindValue('description', $this->description, PDO::PARAM_STR);

        $req->execute();
    }

    protected function insert(){
        $req = $this->bdd->prepare('
          INSERT INTO category 
          (id, name, description)'
            . ' VALUES(
            :id, :name, :description)');

        $req->bindValue('id', $this->id, PDO::PARAM_STR);
        $req->bindValue('name', $this->name, PDO::PARAM_STR);
        $req->bindValue('description', $this->description, PDO::PARAM_STR);

        $req->execute();
    }

    public function save(){
        if(is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

    public function delete(){
        $req = $this->bdd->prepare('DELETE FROM category WHERE id=:id');
        $req->bindValue('id', $this->id);
        $req->execute();
    }

    public static function getAll(){
        $model = self::getInstance();
        $req = $model->bdd->prepare('SELECT id FROM category');
        $req->execute();
        $categories = array();
        while($row = $req->fetch()){
            $category = new CategoryModel($row['id']);
            $categories[] = $category;
        }
        return $categories;
    }
}