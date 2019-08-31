<?php

class cert_printModel extends Basictable {

    static protected $table_name = "cert_print";
    public $primary_key = "id";
    public $fields = array('id', 'user', 'cert','code','date','duration','inst');
    public $id;
    public $user;
    public $cert;
    public $code;
    public $date;
    public $duration;
    public $inst; 

    
    
}
