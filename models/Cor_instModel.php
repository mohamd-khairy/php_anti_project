<?php

class Cor_instModel extends basictable {

    static protected $table_name = "cor_inst";
    public $primary_key = "id";
    public $fields = array('id', 'cor_id','inst_id');
    public $cor_id;
    public $inst_id;

    static public function get_inst_by_cor_id($cor_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from cor_inst,courses,instructor  where cor_inst.cor_id = {$cor_id} and cor_inst.cor_id = courses.cor_id and cor_inst.inst_id=instructor.inst_id  ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_all_inst_by_cor_id($cor_id) {
        return $this->dbh->query("delete from " . static::$table_name . " where cor_id ={$cor_id}");
     }

      public function delete_all_inst_by_catid($colom,$id) {
   
          return $this->dbh->query("delete from " . static::$table_name . " where {$colom}={$id}"); 
        }
}
