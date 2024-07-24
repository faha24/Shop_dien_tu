<?php

class Home extends BaseModel  {

    public $tableName = 'products';

    public $image = 'images';
    public $color = 'colors';
public $varient = 'product_details';
    public function allimages($id) {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->image} WHERE   `product_id` = $id  ORDER BY `role` DESC";
            // var_dump($sql);
            // die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
          
        }
    }
    public function allvariant($id) {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->varient} WHERE `product_id` = $id ";
            // var_dump($sql);
            // die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
          
        }
    }
    public function allcolor() {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->color}";
            // var_dump($sql);
            // die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
          
        }
    }


    public function findIdTable($id) {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->tableName} INNER JOIN categories ON products.category_id = categories.id  WHERE products.id = $id";
            // var_dump($sql);
            // die();
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetch();
        } catch(Exception $e) {
            $coreApp->debug($e);
        }
    }
    // public function findidImg($id) {
    //     try {
    //         global $coreApp;
    //         $sql = "SELECT * FROM {$this->image}  WHERE `role` = 1 AND `product_id` = $id";
    // //  var_dump($sql);
    // //         die();
    //         $stmt = $this->conn->prepare($sql);
        
    //         $stmt->execute();

    //         return $stmt->fetch();
    //     } catch(Exception $e) {
    //         $coreApp->debug($e);
    //     }
    // }




}
