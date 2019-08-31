<?php

class InstractorModel extends basictable {

    static protected $table_name = "instructor";
    public $primary_key = "inst_id";
    public $fields = array('inst_id','inst_name', 'inst_job', 'inst_skill', 'inst_facebook', 'inst_google','inst_twitter', 'inst_details','inst_image','inst_gender','inst_mobile','inst_address');
    public $inst_id;
    public $inst_name;
    public $inst_job;
    public $inst_skill;
    public $inst_facebook;
    public $inst_google;
    public $inst_twitter;
    public $inst_details;
    public $inst_image;
    public $inst_gender;
    public $inst_mobile;
    public $inst_address;

 
      static public function get_inst_by_mobile($mobile){
        return DatabaseManager::getInstance()->dbh->query("select * from instructor where inst_mobile=".$mobile)->fetchAll(PDO::FETCH_ASSOC);
    }
      static public function get_inst_by_id($id){
        return DatabaseManager::getInstance()->dbh->query("select * from instructor where inst_id=".$id)->fetchAll(PDO::FETCH_ASSOC);
    }
}