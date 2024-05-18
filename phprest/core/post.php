<?php
class POST{
    //db stuff
    private $conn;
    private $table = 'cycle';

    //post properties
    public $id;
    public $name;
    public $type;
    public $price;
    public $comment;
    public $image;
   

    //constructor with db connection
    public function __construct($db){
        $this->conn = $db;
    }
    //getting posts from our db
    public function read(){
        //create querry
        $query = 'SELECT * 
            FROM 
            ' .$this->table . '';
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //execute querry
        $stmt->execute();

        return $stmt;
    }
    public function read_single(){
        $query = 'SELECT *
        FROM 
        ' .$this->table . ' 
            WHERE id = ? LIMIT 1';
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //binding parameter
        $stmt->bindParam(1, $this->id);
        //executing the querry
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);  

          $this->id = $row['id'];
          $this->name = $row['name'];
          $this->type = $row['type'];
          $this->price = $row['price'];
          $this->comment = $row['comment'];
          $this->image = $row['image'];

       
    }
    public function create(){
        //create query
        $query = 'INSERT INTO '.$this->table . ' SET id = :id, name = :name, type = :type, price = :price, comment = :comment, image = :image';
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->comment = htmlspecialchars(strip_tags($this->comment));
        $this->image = htmlspecialchars(strip_tags($this->image));

        //binding of parameters
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':type',$this->type);
        $stmt->bindParam(':price',$this->price);
        $stmt->bindParam(':comment',$this->comment);
        $stmt->bindParam(':image',$this->image);
        //execute the query
        if($stmt->execute()){
            return true;
        }
        //print error if smt goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }
    //update post function
    public function update(){
        //create query
        $query = 'UPDATE '.$this->table . ' 
        SET name = :name, type = :type, price = :price, comment = :comment, image = :image
        WHERE id = :id';
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->comment = htmlspecialchars(strip_tags($this->comment));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->id = htmlspecialchars(strip_tags($this->id));
        //binding of parameters
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':type',$this->type);
        $stmt->bindParam(':price',$this->price);
        $stmt->bindParam(':comment',$this->comment);
        $stmt->bindParam(':image',$this->image);
        $stmt->bindParam(':id',$this->id);
        //execute the query
        if($stmt->execute()){
            return true;
        }
        //print error if smt goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }
    //delete function
    public function delete(){
        //create querry
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id',$this->id);
        //execute querry
        if($stmt->execute()){
            return true;
        }
        //print error if smt goes wrong
        printf("Error %s. \n", $stmt->error);
        return false;
    }

}
