<?php

class Post extends Controller{


    public function create(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->view("post/form");
        }else{
            // get the data
            // validate them
            echo "create new post";
        }
        
    }

    public function edit($post_id){
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->view("post/form");
        }else{
            // get the data
            // validate them
            echo "edit  post";
        }
        
    }

    public function delete($post_id){
        echo "delete the post";
        
        
    }


    public function share($post_id){
        echo "sharing post";
        
    }

    public function react($post_id){
        
        echo "reacting on a post";
        
        
    }

    

}