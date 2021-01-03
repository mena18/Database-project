<?php

class post_model extends DataBase {
    public static $table_name = "post";
    public static $class_name = "post_model";
    public static $primary_key = "post_id";
    public static $fill = ['writer','caption','date','is_public','image'];

    public static function create($data = []) {
        $query = "INSERT INTO `" . self::$table_name .'` VALUES(';

        foreach ($data as $col => $val):
            if (is_string($val))
                $query .= "'" . $val . "',";
            else
                $query .= (($val === null)? 'NULL': $val) . ',';
        endforeach;

        $query[strlen($query) - 1] = ')';
        $query .= ';';
        self::query($query);
    }

    public static function remove($id) {
        $query = 'DELETE FROM `' . self::$table_name . '` WHERE post_id='.$id;
        self::query($query);
    }

    public static function edit($id, $data = []) {
        $query = 'UPDATE ' . self::$table_name . ' SET ';
        foreach ($data as $col => $val):
            if (is_string($val))
                $query .= $col . " = '" . $val . "',";
            else
                $query .= $col . " = " . (($val === null)? 'NULL': $val) . ',';
        endforeach;
        $query[strlen($query) - 1] = '';
        $query .= 'WHERE post_id=' . $id;
        self::query($query);
    }




}