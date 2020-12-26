<?php

class comment_model extends DataBase {
    public static $table_name = "comment";
    public static $class_name = "comment_model";
    public static $fill = ['comment_id','writer','post_id','date','text'];



}