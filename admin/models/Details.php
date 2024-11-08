<?php

class details extends BaseModel
{

    public $tableName = 'product_details';
    public $color = 'colors';
    public $size = 'size';

    public function getColor()
    {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->color} ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
    public function getSize()
    {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->size} ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
    public function FindAllTable($id)
    {
        try {
            global $coreApp;
            $sql = "SELECT   product_details.*, 
            colors.id AS color_id, 
            colors.color_name    FROM {$this->tableName}  INNER JOIN `colors` ON `product_details`.`color_id` = `colors`.`id`   WHERE product_id = $id ORDER BY {$this->tableName}.id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
}
