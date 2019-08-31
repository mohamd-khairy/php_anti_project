<?php

class CustomerModel extends basictable {

    static protected $table_name = "customer";
    public $primary_key = "cus_id";
    public $fields = array('cus_name', 'cus_email', 'cus_password', 'cus_image', 'cus_mobile', 'cus_gender', 'cus_id');
    public $cus_id;
    public $cus_name;
    public $cus_email;
    public $cus_password;
    public $cus_image;
    public $cus_mobile;
    public $cus_gender;

    static public function get_cus_by_name($name) {
        return DatabaseManager::getInstance()->dbh->query("select * from customer where cus_name='$name'")->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function get_customer_by_id($cus_id) {
        return DatabaseManager::getInstance()->dbh->query("select * from customer where cus_id=" . $cus_id)->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function get_customer_by_email($email) {
        return DatabaseManager::getInstance()->dbh->query("select * from customer where cus_email='{$email}'")->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function get_customer_by_mobile($mobile) {
        return DatabaseManager::getInstance()->dbh->query("select * from customer where cus_mobile=" . $mobile)->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function get_customer_by_email_and_pass($email, $pass) {
        return DatabaseManager::getInstance()->dbh->query("select * from customer where cus_email='{$email}' and cus_password='{$pass}'")->fetchAll(PDO::FETCH_ASSOC);
    }

}
