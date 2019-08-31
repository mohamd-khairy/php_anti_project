<?php

class CourseModel extends basictable {

    static protected $table_name = "courses";
    public $primary_key = "cor_id";
    public $fields = array('cor_id', 'cor_name', 'cor_cost', 'cor_start_date', 'cor_time', 'cor_days', 'cor_image', 'cat_id', 'cor_num_title');
    public $cor_cost;
    public $cor_start_date;
    public $cor_time;
    public $cor_days;
    public $cor_image;
    public $cat_id;
    public $cor_name;
    public $cor_id;
    public $cor_num_title;

    static public function getAllDatabyid($cor_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name . " where cor_id=$cor_id")->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function getAllDataby_cat_id($cat_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name . " where cat_id=$cat_id")->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function get_last_courses() {
        return DatabaseManager::getInstance()->dbh->query("select * from courses ORDER BY cor_id DESC ")->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function get_last_id($name) {
        return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name . " where cor_name='{$name}' ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_allcor_by_catid($colom, $id) {

        return $this->dbh->query("delete from " . static::$table_name . " where {$colom}={$id}");
    }

    static public function get_all_data_for_exel_sheet($cus_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from book,courses,customer where book.cus_id={$cus_id} and book.cus_id=customer.cus_id and book.cor_id=courses.cor_id")->fetchAll(PDO::FETCH_ASSOC);
    }

}
