<?php

class ProductModel extends BasicTable {

    static protected $table_name = "product";
    public $primary_key = "product_id";
    public $fields = array('product_name', 'product_price', 'product_image', 'product_description', 'qnty', 'category_id');
    public $product_id;
    public $product_name;
    public $product_price;
    public $product_image;
    public $product_description;
    public $qnty;
    public $category_id;

    static public function getRandomData() {
        return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name.' order by rand() limit 16')->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function get_element($id){
        $m= DatabaseManager::getInstance()->dbh->query("select * from product where product_id={$id}")->fetchAll(PDO::FETCH_CLASS,get_called_class());
  
        return $m[0];
        }

        static public function get_price($id){
            $m=DatabaseManager::getInstance()->dbh->query("select product_price from  product where product_id={$id}")->fetchAll(PDO::FETCH_CLASS,  get_called_class());   
    
        return $m[0];
        }
}
