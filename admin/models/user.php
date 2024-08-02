<?php 
 class Users extends BaseModel{
   public $tableName = 'user' ;
   public function allTable() {
    try {
        global $coreApp;
        $sql = "SELECT * FROM {$this->tableName} WHERE `role` != 0 ORDER BY id DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        $coreApp->debug($e);
      
    }
}
 }
 
?>