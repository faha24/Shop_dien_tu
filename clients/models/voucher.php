<?php class Vouchers extends BaseModel{
     public $tableName = 'vouchers';
     public function findCodeTable($code) {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->tableName} WHERE `voucher_code` = '$code'";
            // var_dump($sql);
            // die();
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetch();
        } catch(Exception $e) {
            $coreApp->debug($e);
        }
    }
  

    
}