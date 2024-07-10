<?php

class Dashboard extends BaseModel  {
    public $tableName = 'products';

    // public function allTable() {
    //     try {
    //         global $coreApp;
    //         $sql = "SELECT * FROM {$this->tableName} ORDER BY product_id DESC";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute();
    //         return $stmt->fetchAll();
    //     } catch (Exception $e) {
    //         $coreApp->debug($e);
          
    //     }
    // }
    // public function removeIdTable($id) {
    //     try {
    //         global $coreApp;
    //         $sql = "DELETE FROM {$this->tableName} WHERE (`product_id` = :id)";
    
    //         $stmt = $this->conn->prepare($sql);
        
    //         return $stmt->execute([
    //             ':id' => $id
    //         ]);
    //     } catch(Exception $e) {
    //         $coreApp->debug($e);
    //     }
    // }
    // public function findIdTable($id) {
    //     try {
    //         global $coreApp;
    //         $sql = "SELECT * FROM {$this->tableName} WHERE product_id = :id";
    
    //         $stmt = $this->conn->prepare($sql);
        
    //         $stmt->execute([':id' => $id]);

    //         return $stmt->fetch();
    //     } catch(Exception $e) {
    //         $coreApp->debug($e);
    //     }
    // }
    // public function updateIdTable($data, $id) {
    //     try {
    //         global $coreApp;
    //         $data = $this->convertToArray($data);
    //         // Lấy các tên cột từ mảng $data
    //         $columns = array_keys($data);
    //         // Tạo chuỗi các cặp 'column = :column'
    //         $setString = implode(', ', array_map(function($col) {
    //             return "$col = :$col";
    //         }, $columns));
            
    //         // Tạo câu lệnh SQL
    //         $sql = "UPDATE $this->tableName SET $setString WHERE product_id = :id";
            
    //         $stmt = $this->conn->prepare($sql);
            
    //         // Chuyển đổi mảng $data thành mảng có dạng ['column' => value]
    //         $parameters = [];
    //         foreach ($data as $key => $value) {
    //             $parameters[":$key"] = $value;
    //         }
    //         // Thêm id vào mảng parameters
    //         $parameters[':id'] = $id;

    //         return $stmt->execute($parameters);
    //     } catch(Exception $e) {
    //         $coreApp->debug($e);
    //     }
    // }
    // private function convertToArray($data) {
    //     if (is_object($data)) {
    //         return get_object_vars($data);
    //     } elseif (is_array($data)) {
    //         return $data;
    //     } else {
    //         return null;
    //     }
    // }

}
?>