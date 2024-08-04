<?php
    class address extends BaseModel{
        public  $tableName = "address";
        public function alladdress($id) {
            try {
                global $coreApp;
                $sql = "SELECT * FROM {$this->tableName} WHERE `user_id` = $id; ORDER BY id DESC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            } catch (Exception $e) {
                $coreApp->debug($e);
              
            }
        }
    }
