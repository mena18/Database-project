<?php

class Friend extends Controller{


    public function send_request(){
        //if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
        
            // the sender and reciever are send inside the post request
            // make sure the user exists and you didn't already sent any previous friend requests
            
            echo "send friend request";
    }
        
    

    public function response(){
        // get the form data
        // update the request data
        // create new entry in friends

        // the sender and reciever are send inside the post request
        echo "response to friend request";
        
        
    }


    public function block(){
        // get the form data
        // log the user in or return the form page with errors  
        
        echo "block a friend";
        
        
    }

    public function all(){
        // get the form data
        // log the user in or return the form page with errors  
        
        return $this->view("friends/all");
        
        
    }

    public function one(){
        // get the form data
        // log the user in or return the form page with errors  
        
        
        return $this->view("friends/one");
        
        
        
    }

    
    public function delete(){
        // get the form data
        // log the user in or return the form page with errors  
        
        echo "delete friendship";
        
        
    }

    public function requests(){
        return $this->view("friends/requests");
    }

}