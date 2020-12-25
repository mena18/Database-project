<?php

class Auth extends Controller{


    public function sign_up(){
        //if(!isset($_SESSION['user']) ){echo "You aren't admin";return ;}
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->view("auth/sign_up");
        }else{
            // TODO execute signup;
            // get the data
            // validate them
            // create new user
            echo "new user created";
        }
        
    }

    public function login(){
        // get the form data
        // log the user in or return the form page with errors  
        
        echo "you are logged in";
        
        
    }


    public function logout(){
        // get the form data
        // log the user in or return the form page with errors  
        
        echo "you are logged out";
        
        
    }

    public function my_posts(){
        // get the form data
        // log the user in or return the form page with errors  
        
        return $this->view("auth/posts");
        
        
    }

    public function my_profile(){
        // get the form data
        // log the user in or return the form page with errors  
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->view("auth/profile");
        }else{
            // TODO execute signup;
            // get the data
            // validate them
            // edit the user data
            echo "new user created";
        }
        
        
    }

}