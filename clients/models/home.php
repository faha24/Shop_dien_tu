<?php

class Home extends BaseModel
{

    public $tableName = 'products';

    public $image = 'images';
    public $color = 'colors';
    public $varient = 'product_details';
    public function allimages($id)
    {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->image} WHERE   `product_id` = $id  ORDER BY `role` DESC";
            // var_dump($sql);
            // die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
    public function findSeach($namePrd, $cate)
    {
        try {
            global $coreApp;
            $sql =   "SELECT 
    products.id AS product_id,
    products.View AS product_view,
    products.product_name AS product_name,
    categories.id AS category_id,
    categories.category_name AS category_name,
    images.id AS image_id,
    images.path AS image_url,
    COALESCE(
        (SELECT product_details.price 
         FROM product_details 
         WHERE product_details.product_id = products.id 
         ORDER BY product_details.id ASC 
         LIMIT 1),
        products.price
    ) AS PR_PRICE
FROM 
    products
INNER JOIN 
    categories ON products.category_id = categories.id
INNER JOIN 
    images ON products.id = images.product_id AND images.role = 1
WHERE 
    product_name LIKE '%$namePrd%' 
    AND (
        CASE
            WHEN '$cate' = ' ' THEN TRUE
            ELSE categories.category_name = '$cate'
        END
    )
ORDER BY 
    products.id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
   
    public function allproducts()
    {
        try {
            global $coreApp;
            $sql = "SELECT 
    products.id AS product_id,
    products.View AS product_view,
    products.product_name AS product_name,
    categories.id AS category_id,
    categories.category_name AS category_name,
    images.id AS image_id,
    images.path AS image_url,
    COALESCE(
        (SELECT product_details.price 
         FROM product_details 
         WHERE product_details.product_id = products.id 
         ORDER BY product_details.id ASC 
         LIMIT 1),
        products.price
    ) AS PR_PRICE
FROM 
    products
INNER JOIN 
    categories ON products.category_id = categories.id
INNER JOIN 
    images ON products.id = images.product_id AND images.role = 1
ORDER BY 
    products.id DESC;
";
            // var_dump($sql);
            // die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }

    public function allvariant($id)
    {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->varient} WHERE `product_id` = $id ";
            // var_dump($sql);
            // die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
    public function allcolor()
    {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->color}";
            // var_dump($sql);
            // die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }


    public function findIdTable($id)
    {
        try {
            global $coreApp;
            $sql = "SELECT * FROM {$this->tableName} INNER JOIN categories ON products.category_id = categories.id  WHERE products.id = $id";
            // var_dump($sql);
            // die();

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            $coreApp->debug($e);
        }
    }
    // public function findidImg($id) {
    //     try {
    //         global $coreApp;
    //         $sql = "SELECT * FROM {$this->image}  WHERE `role` = 1 AND `product_id` = $id";
    // //  var_dump($sql);
    // //         die();
    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute();

    //         return $stmt->fetch();
    //     } catch(Exception $e) {
    //         $coreApp->debug($e);
    //     }
    // }




}
