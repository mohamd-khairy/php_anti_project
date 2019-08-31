<?php

class BookModel extends basictable {

    static protected $table_name = "book";
    public $primary_key = "book_id";
    public $fields = array('book_id', 'cus_address', 'cus_birth_date', 'cus_job', 'cus_id', 'cor_id', 'book_pay', 'book_last', 'active');
    public $cus_id;
    public $book_id;
    public $cus_address;
    public $cus_birth_date;
    public $cus_job;
    public $cor_id;
    public $book_pay;
    public $book_last;
    public $active;

    static public function check_user_book($cus_id, $cor_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name . " where cus_id={$cus_id} and cor_id={$cor_id}")->fetchAll(PDO::FETCH_ASSOC);
    }
    
    static public function get_user_book($cus_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from book,courses where cus_id={$cus_id} and book.cor_id=courses.cor_id")->fetchAll(PDO::FETCH_ASSOC);
    }
    
      public function delete_all_inst_by_catid($colom,$id) {
   
          return $this->dbh->query("delete from " . static::$table_name . " where {$colom}={$id}"); 
        }
}
