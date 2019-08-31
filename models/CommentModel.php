<?php

class CommentModel extends basictable {

    static protected $table_name = "comment";
    public $primary_key = "comment_id";
    public $fields = array('comment_details', 'comment_datetime', 'cus_id', 'cor_id', 'blog_id');
    public $comment_details;
    public $comment_datetime;
    public $cus_id;
    public $cor_id;
    public $blog_id;

   
    
    static public function get_comment_by_cor_id($cor_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from comment,customer where comment.cor_id={$cor_id} and comment.cus_id=customer.cus_id ORDER BY comment_id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function get_all_comment_by_blog_id($blog_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from comment,customer where comment.blog_id={$blog_id} and comment.cus_id=customer.cus_id ORDER BY comment_id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function get_all_comment_from_end() {
        return DatabaseManager::getInstance()->dbh->query("select * from comment,customer where  cor_id=0 and comment.cus_id=customer.cus_id ORDER BY comment_id DESC  ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_by_blog_id($blog_id) {
        return DatabaseManager::getInstance()->dbh->query("delete from " . static::$table_name . "where blog_id=" . $blog_id);
    }

    public function delete_by_cor_id($cor_id) {
        return DatabaseManager::getInstance()->dbh->query("delete from " . static::$table_name . "where cor_id=" . $cor_id);
    }

}
