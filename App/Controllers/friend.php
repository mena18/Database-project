<?php

class Friend extends Controller{


    public function send_request(){
        require_login();
    
        $sender = $_SESSION['email'];
        $reciever =  "menan381@gmail.com"; // $_POST['receiver'];
        
        $s = friend_model::can_request($sender,$reciever);
        if (!$s){
            friend_model::send_request($sender,$reciever);
            echo "friend request is sent successfully";
        }else{
            echo "you already sent the friend request";
        }
        
    }
        
    

    public function response(){
        require_login();
    
        $sender =  "menan381@gmail.com"; // $_POST['sender'];
        $response =  "accept"; // another option is reject // $_POST['response'];
        $reciever = $_SESSION['email'];

        friend_model::respond($sender,$reciever,$response);

        if($response == "accept"){
            friend_model::create_friendship($sender,$reciever);
            echo "you and '$sender' are now friends ";
        }else{
            echo "you rejected the friend request from '$sender' ";
        }

        
        
    }


    public function block(){
        require_login();
    
        $sender = $_SESSION['email'];
        $reciever =  "menan381@gmail.com"; // $_POST['receiver'];

        friend_model::remove_friendship($sender,$reciever);
        friend_model::block($sender,$reciever);

        echo "you successfully blocked '$sender' ";
        
        
        
    }

    public function un_block(){
        require_login();
    
        $sender = $_SESSION['email'];
        $reciever =  "menan381@gmail.com"; // $_POST['receiver'];

        friend_model::unblock($sender,$reciever);

        echo "you successfully unblocked '$sender' ";
        
        
        
    }


    public function delete(){
        // get the form data
        // log the user in or return the form page with errors  
        
        require_login();
    
        $sender = $_SESSION['email'];
        $reciever =  "menan381@gmail.com"; // $_POST['user'];

        friend_model::remove_friendship($sender,$reciever);

        echo "your friendship with '$sender' is deleted ";
        
        
    }

    public function all(){
        
        // display all friendships

        return $this->view("friends/all");
        
        
    }

    public function one(){
        // get the form data
        // log the user in or return the form page with errors  
        
        
        return $this->view("friends/one");
        
        
        
    }

    


    public function requests(){
        // view all friend requests
        // the one you sent and the one other people sent
        return $this->view("friends/requests");
    }

}