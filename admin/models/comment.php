<?php class comment extends BaseModel{
     public $tableName = 'comments';
     public function allTable() {
        try {
            global $coreApp;
            $sql = "SELECT comments.*, user.username
            FROM {$this->tableName}
            INNER JOIN user ON comments.user_id = user.id;";
            // $sql = "SELECT * FROM  INNER ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
          
        }
    }
} 