<?php

class oder extends BaseModel
{

    public $tableName = 'oders';

    public $oder_item = 'oder_item';
    public function insertTable_item($data)
    {
        try {
            global $coreApp;
            $data = $this->convertToArray($data);
            // Lấy các tên cột từ mảng $data
            $columns = array_keys($data);
            // Tạo chuỗi các tên cột
            $columnsString = implode(', ', $columns);
            // Tạo chuỗi các placeholder
            $placeholders = ':' . implode(', :', $columns);

            // Tạo câu lệnh SQL
            $sql = "INSERT INTO $this->oder_item ($columnsString) VALUES ($placeholders)";

            $stmt = $this->conn->prepare($sql);

            // Chuyển đổi mảng $data thành mảng có dạng ['column' => value]
            $parameters = [];
            foreach ($data as $key => $value) {
                $parameters[":$key"] = $value;
            }

            // return $stmt->execute($parameters);
            if ($stmt->execute($parameters)) {
                // Lấy ID của bản ghi vừa được chèn vào
                $lastInsertId = $this->conn->lastInsertId();
                return $lastInsertId;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
    public function insertTable($data)
    {
        try {
            global $coreApp;
            $data = $this->convertToArray($data);
            // Lấy các tên cột từ mảng $data
            $columns = array_keys($data);
            // Tạo chuỗi các tên cột
            $columnsString = implode(', ', $columns);
            // Tạo chuỗi các placeholder
            $placeholders = ':' . implode(', :', $columns);

            // Tạo câu lệnh SQL
            $sql = "INSERT INTO $this->tableName ($columnsString) VALUES ($placeholders)";

            $stmt = $this->conn->prepare($sql);

            // Chuyển đổi mảng $data thành mảng có dạng ['column' => value]
            $parameters = [];
            foreach ($data as $key => $value) {
                $parameters[":$key"] = $value;
            }

            // return $stmt->execute($parameters);
            if ($stmt->execute($parameters)) {
                // Lấy ID của bản ghi vừa được chèn vào
                $lastInsertId = $this->conn->lastInsertId();
                return $lastInsertId;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
    public function findIdUserOrder($id)
    {
        try {
            global $coreApp;
            $sql = "SELECT oder_item.*, oders.oder_code ,oders.status, images.path FROM oder_item INNER JOIN oders ON oders.id = oder_item.oder_id INNER JOIN images ON images.product_id = oder_item.product_id WHERE oders.user_id = :id AND images.role = 1;";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
    private function convertToArray($data)
    {
        if (is_object($data)) {
            return get_object_vars($data);
        } elseif (is_array($data)) {
            return $data;
        } else {
            return null;
        }
    }
}
