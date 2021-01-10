<?php

class Post extends Controller{


    public function create(){
        return;
        # required logged in users
        require_login();

        if ($_SERVER['REQUEST_METHOD'] === 'GET')
            return $this->view("post/form");

        $user = $_SESSION['email'];
        $cap = (strlen($_POST['caption'])) ? $_POST['caption'] : null;
        $img = upload_file("image");
        $privacy = ($_POST['privacy']==='public') ? 1 : 0;
        if ($cap === null && $img === null)
            return $this->view('post/form');    // Need to return with an error massage told the user the post must be contains caption or image or both

        $post = new post_model();
        $post->writer = $user;
        $post->caption = $cap;
        $post->date = date('Y-m-d');
        $post->is_public = $privacy;
        $post->image = $img;
        $post->save();

        return $this->view('post/form');
    }

    public function edit($post_id){
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
            return $this->view("post/form"); // you should change post/form to be able to handle both creation and updates

        $cap = (strlen($_POST['caption'])) ? $_POST['caption'] : null;
        $img = upload_file("image");
        $privacy = (isset($_POST['privacy'])) ? 1 : 0;
        if ($cap === null && $img === null)
            return $this->view('post/form');    // Need to return with an error massage told the user the post must be contains caption or image or both


        $data = [
            'caption'   =>  $cap,
            'is_public' =>  $privacy,
            'image'     =>  $img
        ];
        post_model::edit($post_id, $data);
        return $this->view('post/form');
    }

    public function delete($post_id) {
        post_model::remove($post_id);
        return $this->view('post/form');
    }


    public function share($post_id){
        echo "sharing post";
        
    }

    public function react($post_id){
        
        echo "reacting on a post";
        
        
    }

    

}