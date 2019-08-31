<?php

class GradeModel extends basictable {

    static protected $table_name = "graduate";
    public $primary_key = "grad_id";
    public $fields = array('grad_id', 'grad_name', 'grad_image', 'grad_job','grad_job_place');
    public $grad_id;
    public $grad_name;
    public $grad_image;
    public $grad_job;
    public $grad_job_place;
}
