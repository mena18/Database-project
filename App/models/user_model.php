<?php

class user_model extends DataBase {
    public static $table_name = "User";
    public static $class_name = "user_model";
    public static $primary_key = "email";
    public static $fill = ['email','first_name','last_name','nick_name','password','gender','birth_date','picture','home_town','status','about_me'];



}