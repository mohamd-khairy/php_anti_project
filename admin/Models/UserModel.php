<?php

class UserModel extends BasicTable {

    static protected $table_name = "user";
    public $primary_key = "user_id";
    public $fields = array('user_name', 'role', 'user_phone', 'user_password', 'user_address', 'access_token', 'user_email');
    public $user_id;
    public $user_name;
    public $role;
    public $user_email;
    public $user_phone;
    public $access_token;
    public $user_address;
    public $user_password;

}
