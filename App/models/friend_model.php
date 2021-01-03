



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



}