<?php

class phone_model extends DataBase {
    public static $table_name = "phone";
    public static $class_name = "phone_model";
    public static $primary_key = "phone_num";
    public static $fill = ['phone_num','email'];


    public static function delete_all($email,$phones){
        $phones = implode(",", $phones);
        $query = "DELETE FROM phone WHERE email = '$email' AND phone_num NOT in ($phones) ;";
        self::query($query);
    }

    public function save(){
        $email = $this->email;
        $phone_num = $this->phone_num;

        $query ="
        
        INSERT IGNORE INTO phone SET  phone_num = '$phone_num' ,email =  '$email' 
        
        ";
        self::query($query);
    }

    public static function save_many($email,$phone_arrays){
        $val = "";
        $counter=count($phone_arrays);
        foreach ($phone_arrays as $phone) {
            $val.= "('$email','$phone')";
            $counter--;
            if($counter>0){
                $val.=",";
            }
        }
        $query = " INSERT IGNORE INTO phone (email,phone_num)  VALUES $val ";
        self::query($query);
    }


}