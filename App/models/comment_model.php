<?php

class comment_model extends DataBase {
    public static $table_name = "comment";
    public static $class_name = "comment_model";
    public static $fill = ['comment_id','writer','post_id','date','text'];


    public static function list($post_id){
        $query = "select User.first_name,User.first_name,User.picture,comment.text from comment inner join User on comment.writer = User.email ";
        return  self::query_fetch_all($query,"comment_model");
    }


}