<?php

class Order extends BaseModel  {
    public $tableName = 'oders';
    public function getitem() {
        try {
            global $coreApp;
            $sql = "SELECT * FROM `oder_item` ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
          
        }
    }
    
 
  
}
?>