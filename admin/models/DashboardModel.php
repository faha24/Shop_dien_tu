<?php

class Dashboard extends BaseModel  {
    public $tableName = 'products';

    public function allTable() {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->tableName} ORDER BY product_id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
          
        }
    }
    public function removeIdTable($id) {
        try {
            global $coreApp;
            $sql = "DELETE FROM {$this->tableName} WHERE (`product_id` = :id)";
    
            $stmt = $this->conn->prepare($sql);
        
            return $stmt->execute([
                ':id' => $id
            ]);
        } catch(Exception $e) {
            $coreApp->debug($e);
        }
    }
    public function findIdTable($id) {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->tableName} WHERE product_id = :id";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch(Exception $e) {
            $coreApp->debug($e);
        }
    }
}
?>