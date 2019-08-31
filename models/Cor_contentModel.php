<?php

class Cor_contentModel extends basictable {

    static protected $table_name = "cor_content";
    public $primary_key = "id";
    public $fields = array('id', 'cor_id','title','details');
    public $cor_id;
    public $id;
    public $title;
    public $details;
    
      static public function getAllDatabyid($cor_id) {
    return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name ." where cor_id=$cor_id")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete_all_content_by_id($id) {
        return $this->dbh->query("delete from " . static::$table_name . " where cor_id ={$id}");
     }

  
}
