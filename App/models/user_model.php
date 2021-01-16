<?php

class user_model extends DataBase {
    public static $table_name = "User";
    public static $class_name = "user_model";
    public static $primary_key = "email";
    public static $fill = ['email','first_name','last_name','nick_name','password','gender','birth_date','picture','home_town','status','about_me'];


    public static function search_user($data, $email){
        $query = "SELECT * FROM User WHERE email LIKE '%$data%' OR User.first_name LIKE '%$data%' OR User.last_name LIKE '%$data%'";
        # TODO query not including the blocked people
        $users = self::query_fetch_all($query,"user_model");
        $searchResult = [];
        foreach ($users as $user):
            $isBlocked = block_model::is_blocked($_SESSION['email'], $user->email);
            if ($isBlocked)
                $searchResult[] = $user;
        endforeach;
        return $searchResult;
    }


}