<?php

class Comment extends Controller{


    public function list($post_id){
        require_login();
        $comments = comment_model::list($post_id);
        echo $comments
        
        
    }

    public function create($post_id){
        require_login();
        
        $comment = new comment_model();
        $coment->post_id = $post_id;
        $coment->text = $_POST['text'];
        $coment->writer = $_SESSION['email'];
    
        $comment->save();
        
        echo "comment created successfully";
        
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