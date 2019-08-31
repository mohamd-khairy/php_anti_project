<?php

class OnlineModel extends basictable {

    static protected $table_name = "course_online";
    public $primary_key = "online_id";
    public $fields = array('online_id', 'online_name', 'online_image', 'online_cost', 'cat_id');
    public $online_id;
    public $online_name;
    public $online_image;
    public $online_cost;
    public $cat_id;

    static public function get_onlinecor_by_name($online_name) {
        return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name . " where online_name='$online_name'")->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function getAllDatabyid($online_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name . " where online_id=$online_id")->fetchAll(PDO::FETCH_ASSOC);
    }

     static public function getAllDataby_cat_id($cat_id) {
    return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name ." where cat_id=$cat_id")->fetchAll(PDO::FETCH_ASSOC);
    }
}
