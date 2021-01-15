<?php

class post_model extends DataBase {
    public static $table_name = "post";
    public static $class_name = "post_model";
    public static $primary_key = "post_id";
    public static $fill = ['writer','caption','is_public','image'];



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
        ORDER BY post.date DESC;
        ";
        return self::query_fetch_all($query,"post_model");
    }


    public static function edit($post_id,$data = []) {
      $query = "UPDATE post SET ".http_build_query($data,'',', ')." WHERE post.post_id = $post_id ";
      self::query($query);
    }


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
      ORDER BY post.date DESC;
      
      

        ";
        return self::query_fetch_all($query, 'post_model');
    }


    public static function share($email,$post_id){
      $query = "insert into share (post_id,email) VALUES ('$post_id','$email')";
      self::query($query);
    }
    public static function get_react($email,$post_id){
      $query = "SELECT * from react WHERE post_id = '$post_id' AND email =  '$email'";
      return  self::get_one($query);
    }
    public static function delete_react($email,$post_id){
      $query = "DELETE from react WHERE post_id = '$post_id' AND email =  '$email'";
      self::query($query);
    }
    public static function add_react($email,$post_id){
      $query = "insert into react (post_id,email) VALUES ('$post_id','$email')";
      self::query($query);
    }


}