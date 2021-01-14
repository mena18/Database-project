



<?php

class friend_model extends DataBase {

    public static function can_request($sender,$receiver){

        // you can;t send friend request if you already sent one 
        // you can't send friend request if you are friends
        $a = self::get_one("select * from request WHERE  sender = '$sender' AND receiver = '$receiver' AND response IS NULL ")  ;
        $b = self::get_one("select * from friend WHERE  (user_1 = '$sender' AND user_2 = '$receiver') OR (user_2 = '$sender' AND user_1 = '$receiver') ");

        return $a || $b;
    }
    
    public static function send_request($sender,$receiver){
        self::query("insert into request (sender,receiver) VALUES ('$sender','$receiver') ");
    }

    public static function respond($sender,$receiver,$response){
        self::query("UPDATE request SET response = '$response' WHERE  sender = '$sender' AND receiver = '$receiver' AND response IS NULL ");
    }

    public static function create_friendship($sender,$receiver,$response){
        self::query("insert into friend (user_1,user_2) VALUES ('$sender','$receiver')");
    }

    public static function remove_friendship($sender,$receiver){
        self::query("DELETE FROM  friend WHERE  (user_1 = '$sender' AND user_2 = '$receiver') OR (user_2 = '$sender' AND user_1 = '$receiver') ");
    }

    public static function block($blocker,$blocked){
        self::query("insert into block (blocker,blocked) VALUES ('$blocker','$blocked')");
    }

    public static function unblock($blocker,$blocked){
        self::query("DELETE from block WHERE blocker = '$blocker' AND blocked = $blocked ");
    }

    public static function friends($email){
        
        $query = "
        Select User.email,User.first_name,User.last_name,User.picture,friend_table.date from User inner join  
        (select friend.user_1 as email,friend.date from friend where friend.user_2 = '$email'  UNION 
        select friend.user_2 as email,friend.date from friend where friend.user_1 = '$email') AS friend_table  on friend_table.email=User.email
        ";
        return self::query_fetch_all($query,"user_model");
    }

    public static function check_friendship($user_1,$user_2){
        return  self::get_one("select * from friend WHERE  (user_1 = '$user_1' AND user_2 = '$user_2') OR (user_2 = '$user_1' AND user_1 = '$user_2') ");
    }

    public static function all_requests($email){
        $query = "
        select User.email,User.first_name,User.last_name,User.picture,request_table.date from User inner join 
        (select sender,date from request WHERE receiver = '$email' AND response is NULL) AS request_table 
        on request_table.sender = User.email
        ";
        return  self::query_fetch_all($query,"user_model");
    }


    



}