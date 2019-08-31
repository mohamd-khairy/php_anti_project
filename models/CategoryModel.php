<?php

class CategoryModel extends basictable {

    static protected $table_name = "category";
    public $primary_key = "cat_id";
    public $fields = array('cat_id', 'cat_type','cat_name');
    public $cat_id;
    public $cat_name;
    public $cat_type;
    
    static public function getAllDatabyid($cat_id) {
    return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name ." where cat_id=$cat_id")->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function get_cat_by_name($cat_name) {
    return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name ." where cat_name='$cat_name'")->fetchAll(PDO::FETCH_ASSOC);
    }
    

}


