<?php

class Online_corModel extends basictable {

    static protected $table_name = "online_cor";
    public $primary_key = "on_id";
    public $fields = array('on_id', 'on_link', 'on_details', 'online_id');
    public $on_link;
    public $on_id;
    public $on_details;
    public $online_id;

    public function delete_all_on_co_by_catid($colom, $id) {
        return $this->dbh->query("delete from " . static::$table_name . " where {$colom}={$id}");
    }

     static public function getAllDatabyid($online_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name . " where online_id=$online_id")->fetchAll(PDO::FETCH_ASSOC);
    }
}
