<?php

class BlogModel extends basictable {

    static protected $table_name = "blog";
    public $primary_key = "blog_id";
    public $fields = array('blog_id', 'blog_title', 'blog_content', 'blog_image', 'blog_datetime');
    public $blog_id;
    public $blog_title;
    public $blog_content;
    public $blog_image;
    public $blog_datetime;

      
    static public function getAllDatabyid($blog_id) {
    return DatabaseManager::getInstance()->dbh->query("select * from " . static::$table_name ." where blog_id=$blog_id")->fetchAll(PDO::FETCH_ASSOC);
    }

}
