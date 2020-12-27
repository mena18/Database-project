<?php

class phone_model extends DataBase {
    public static $table_name = "phone";
    public static $class_name = "phone_model";
    public static $primary_key = "phone_num";
    public static $fill = ['phone_num','email'];



}