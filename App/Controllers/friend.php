<?php

class Friend extends Controller{


    public function send_request(){
        require_login();
    
        $sender = $_SESSION['email'];
        $receiver =  $_POST['receiver']; // $_POST['receiver'];
        
        $s = friend_model::can_request($sender,$receiver);
        if (!$s){
            friend_model::send_request($sender,$receiver);
            echo "friend request is sent successfully";
        }else{
            echo "you already sent the friend request";
        }

        redirect('auth/profile');
        
    }
        

    

    public function response(){
        require_login();
    
        // print_r($_POST);
        // return ;

        $sender =  $_POST['sender']; // $_POST['sender'];
        $response =  $_POST['response']; // another option is reject // $_POST['response'];
        $receiver = $_SESSION['email'];

        friend_model::respond($sender,$receiver,$response);

        if($response == "accept"){
            friend_model::create_friendship($sender,$receiver);
            echo "you and '$sender' are now friends ";
        }else{
            echo "you rejected the friend request from '$sender' ";
        }

        redirect('auth/profile');
        
        
    }


    public function block(){
        require_login();
    
        $sender = $_SESSION['email'];
        $receiver =  $_POST['receiver']; // $_POST['receiver'];

        friend_model::remove_friendship($sender,$receiver);
        friend_model::block($sender,$receiver);

        echo "you successfully blocked '$sender' ";
        
        redirect('auth/profile');
        
    }

    public function un_block(){
        require_login();
    
        $sender = $_SESSION['email'];
        $receiver =  $_POST['receiver']; // $_POST['receiver'];

        friend_model::unblock($sender,$receiver);

        echo "you successfully unblocked '$sender' ";
        
        redirect('auth/profile');
        
        
    }


    public function delete(){
        // get the form data
        // log the user in or return the form page with errors  
        
        require_login();
    
        $sender = $_SESSION['email'];
        $receiver = $_POST['receiver']; // $_POST['user'];

        friend_model::remove_friendship($sender,$receiver);

        echo "your friendship with '$sender' is deleted ";
        
        redirect('auth/profile');
    }

    public function all(){
        
        // get all friends as users

        $user = $_SESSION['email'];

        $users = friend_model::friends($user);

        return $this->view("friends/all",['users'=>$users]);
        
        
    }

    public function requests(){
        // view all upcoming friend requests

        $user = $_SESSION['email'];

        $users = friend_model::all_requests($user);

        return $this->view("friends/requests",['users'=>$users]);
    }

}