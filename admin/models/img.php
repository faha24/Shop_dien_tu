
<?php
class img extends BaseModel  {
    public $tableName = 'images';
    public function findroleTable($id,$role) {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->tableName} WHERE product_id = :id AND role = :role";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute([':id' => $id ,':role' => $role]);

            return $stmt->fetch();
        } catch(Exception $e) {
            $coreApp->debug($e);
        }
    }
}
?>