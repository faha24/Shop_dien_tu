
<?php
class Category extends BaseModel  {
    public $tableName = 'categories';

    public function allTable() {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->tableName} ORDER BY category_id  DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
          
        }
    }
}
?>