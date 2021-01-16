<?php

class block_model extends DataBase {
    public static $table_name = "block";
    public static $class_name = "block_model";

    public static function is_blocked($blockerEmail, $blockedEmail) {
        $query = "SELECT * FROM block WHERE blocker = '$blockerEmail' AND blocked = '$blockedEmail'";
        $result = self::query_fetch_all($query, "block_model");
        if (count($result) > 0)
            return false;
        return true;
    }


}