<?php

class post_model extends DataBase {
    public static $table_name = "post";
    public static $class_name = "post_model";
    public static $primary_key = "post_id";
    public static $fill = ['writer','caption','date','is_public','image'];



    public static function get_home_page($email){
        
        $query = "
      select 
        post.*, 
        User.first_name AS user_first_name, 
        User.last_name AS user_last_name, 
        User.picture AS user_picture, 
        Count(comment.comment_id) AS n_comments, 
        Count(react.email) AS n_reacts 
      from 
        post 
        inner join User on post.writer = User.email 
        LEFT outer join comment on comment.post_id = post.post_id 
        LEFT outer join react on react.post_id = post.post_id 
      where 
        post.writer in (
          select 
            friend.user_1 as email 
          from 
            friend 
          where 
            friend.user_2 = '$email' 
          UNION 
          select 
            friend.user_2 as email 
          from 
            friend 
          where 
            friend.user_1 = '$email'
        ) 
      GROUP BY 
        post_id
        ";
        return self::query_fetch_all($query,"post_model");
    }


    // public static function create($data = []) {
    //     $query = "INSERT INTO `" . self::$table_name .'` VALUES(';

    //     foreach ($data as $col => $val):
    //         if (is_string($val))
    //             $query .= "'" . $val . "',";
    //         else
    //             $query .= (($val === null)? 'NULL': $val) . ',';
    //     endforeach;

    //     $query[strlen($query) - 1] = ')';
    //     $query .= ';';
    //     self::query($query);
    // }

    // public static function remove($id) {
    //     $query = 'DELETE FROM `' . self::$table_name . '` WHERE post_id='.$id;
    //     self::query($query);
    // }

    // public static function edit($id, $data = []) {
    //     $query = 'UPDATE ' . self::$table_name . ' SET ';
    //     foreach ($data as $col => $val):
    //         if (is_string($val))
    //             $query .= $col . " = '" . $val . "',";
    //         else
    //             $query .= $col . " = " . (($val === null)? 'NULL': $val) . ',';
    //     endforeach;
    //     $query[strlen($query) - 1] = '';
    //     $query .= 'WHERE post_id=' . $id;
    //     self::query($query);
    // }

    public static function get_my_posts($email) {
        $query = "
      SELECT 
        post.*, 
        User.first_name AS user_first_name, 
        User.last_name AS user_last_name, 
        User.picture AS user_picture, 
        Count(comment.comment_id) AS n_comments, 
        Count(react.email) AS n_reacts 
      FROM 
        post 
        inner join User on post.writer = User.email 
        LEFT outer join comment on comment.post_id = post.post_id 
        LEFT outer join react on react.post_id = post.post_id 
      where 
        post.writer = '$email' 
      GROUP BY 
        (post.post_id)
      
      

        ";
        return self::query_fetch_all($query, 'post_model');
    }


}