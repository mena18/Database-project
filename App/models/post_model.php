<?php

class post_model extends DataBase {
    public static $table_name = "post";
    public static $class_name = "post_model";
    public static $fill = ['post_id','writer','caption','name','date','is_public','image'];



}