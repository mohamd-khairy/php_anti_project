<?php

class SuggestModel extends basictable {

    static protected $table_name = "ask";
    public $primary_key = "ask_id";
    public $fields = array('ask_id', 'ask_answer');
    public $ask_id;
    public $ask_answer;

}


