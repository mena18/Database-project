<?php

class post_model extends DataBase {
    public static $table_name = "post";
    public static $class_name = "post_model";
    public static $primary_key = "post_id";
    public static $fill = ['writer','caption','is_public','image'];


    public static function remove($email, $id, $date) {
        $query = "SELECT share.date FROM share WHERE share.post_id = '$id' AND share.email = '$email'";
        $result = self::get_one($query);
        if (is_array($result) && count($result) > 0)
            $query = "DELETE FROM share WHERE share.post_id = '$id' AND share.email = '$email' AND share.date = '$date'";
        else
            $query = "DELETE FROM post WHERE post.post_id = '$id'";
        self::query($query);
    }

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
      $arr = [];
      foreach ($data as $key => $value) {
        $arr[] = " $key = '$value' ";  
      }
      $query = "UPDATE post SET ".implode(', ',$arr)." WHERE post.post_id = $post_id ";
      
      self::query($query);
    }


    public static function get_my_posts($email) {
        if ($email === $_SESSION['email'])
          
          # if > my profile 
            # my posts
            # posts i shared
          # else > other person profile
            # his posts (excluding the private posts)
            # his shared posts
            # his private posts if both of you are friends 

          $query = "
                SELECT
                    post.post_id, post.writer, post.caption, post.is_public, post.image, post.date AS date,
                    User.first_name AS user_first_name,
                    User.last_name AS user_last_name,
                    User.picture AS user_picture,
                    Count(comment.comment_id) AS n_comments,
                    Count(react.email) AS n_reacts
                    FROM
                    post JOIN User ON post.writer = User.email
                    LEFT outer join comment on comment.post_id = post.post_id 
                    LEFT outer join react on react.post_id = post.post_id 
                    WHERE post.writer = '$email'
                    GROUP BY (date)
                UNION
                SELECT
                    post.post_id, post.writer, post.caption, post.is_public, post.image, z.date AS date,
                    User.first_name AS user_first_name,
                    User.last_name AS user_last_name,
                    User.picture AS user_picture,
                    Count(comment.comment_id) AS n_comments,
                    Count(react.email) AS n_reacts
                    FROM
                    (SELECT * FROM share WHERE share.email = '$email') AS z
                    LEFT JOIN post ON z.post_id = post.post_id
                    JOIN User ON post.writer = User.email
                    LEFT outer join comment on comment.post_id = post.post_id 
                    LEFT outer join react on react.post_id = post.post_id 
                    GROUP BY (date)

                    ORDER BY date DESC
            ";
        
            else {
            $myEmail = $_SESSION['email'];
            $query = "
                SELECT
                    post.post_id, post.writer, post.caption, post.is_public, post.image, post.date AS date,
                    User.first_name AS user_first_name,
                    User.last_name AS user_last_name,
                    User.picture AS user_picture,
                    Count(comment.comment_id) AS n_comments,
                    Count(react.email) AS n_reacts
                    FROM
                    post JOIN User ON post.writer = User.email
                    LEFT outer join comment on comment.post_id = post.post_id 
                    LEFT outer join react on react.post_id = post.post_id 
                    WHERE post.writer = '$email' AND post.is_public = '1'
                    GROUP BY (date)
                    UNION
                    SELECT
                        post.post_id, post.writer, post.caption, post.is_public, post.image, z.date AS date,
                        User.first_name AS user_first_name,
                        User.last_name AS user_last_name,
                        User.picture AS user_picture,
                        Count(comment.comment_id) AS n_comments,
                        Count(react.email) AS n_reacts
                        FROM
                        (SELECT * FROM share WHERE share.email = '$email') AS z
                        LEFT JOIN post ON z.post_id = post.post_id
                        JOIN User ON post.writer = User.email
                        LEFT outer join comment on comment.post_id = post.post_id 
                        LEFT outer join react on react.post_id = post.post_id 
                        GROUP BY (date)
                      UNION
                        SELECT
                            post.post_id, post.writer, post.caption, post.is_public, post.image, post.date AS date,
                            User.first_name AS user_first_name,
                            User.last_name AS user_last_name,
                            User.picture AS user_picture,
                            Count(comment.comment_id) AS n_comments,
                            Count(react.email) AS n_reacts
                            FROM
                            post JOIN User ON post.writer = User.email
                            LEFT outer join comment on comment.post_id = post.post_id 
                            LEFT outer join react on react.post_id = post.post_id 
                            WHERE post.writer = '$email'
                            AND (SELECT COUNT(*) FROM friend WHERE (friend.user_1 = '$myEmail' AND friend.user_2 = '$email') OR (friend.user_2 = '$myEmail' AND friend.user_1 = '$email') HAVING COUNT(*) > 0)
                            GROUP BY (date)

                  ORDER BY date DESC
            ";
        }

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