<?php 

class test extends Controller{
    
    // localhost/social/test/index  or localhost/social
    public function index(){
        $tests = test_model::get_all();
        $this->view("test/index",['tests'=>$tests]);
    }


    // localhost/social/test/create_new/name
    public function create_new($name){
        $sql = "insert into test VALUES ('$name')";
        Database::query($sql);
        # Database::get_array($sql)  // return  data 

        echo "created successfully";
    }
}

