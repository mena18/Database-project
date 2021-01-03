<?php

class Comment extends Controller{


    public function create($post_id){
        //if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
        
            // get the data
            // validate them
            echo "create new comment for the post $post_id";
        
        
    }

    public function edit($comment_id){
        //if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}

            // get the data
            // validate them
            echo "edit comment $comment_id";
        
        
    }

    public function delete($comment_id){
        // get the form data
        // log the user in or return the form page with errors  
        
        echo "delete the comment  $comment_id";
        
        
    }



}