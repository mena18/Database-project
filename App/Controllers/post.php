<?php

class Post extends Controller{


    public function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
            return $this->view("post/form");

//        $user = $_SESSION['email'];
        $user = "ahmad@gmail.com";    // Need this value to be in the session when user login to the website
        echo strlen($_POST['caption']);
        $cap = (strlen($_POST['caption'])) ? $_POST['caption'] : null;
        $img = ($_FILES['image']['size'] > 0) ? $_FILES['image']: null;
        $privacy = (isset($_POST['privacy'])) ? 1 : 0;
        if ($cap === null && $img === null)
            return $this->view('post/form');    // Need to return with an error massage told the user the post must be contains caption or image or both

//        if ($img !== null):
//            $fileName = $img['name'];
//            $tmpFileName = $img['tmp_name'];
//            move_uploaded_file($tmpFileName, '/opt/lampp/htdocs/social/users/files/'.$fileName);  // This line has an error Permission Denied
//            $img = $img['tmp_name'];
//        endif;
        $img = null;

        $data = [
            'post_id'   =>  null,
            'writer'    =>  $user,
            'caption'   =>  $cap,
            'date'      =>  date('Y-m-d'),
            'is_public' =>  $privacy,
            'image'     =>  $img
        ];
        post_model::create($data);

        // I couldn't know how to use this way to create a new post so I made it by implementing a function in post_model to insert in db
//            $post = new post_model();
//            $post->post_id = null;
//            $post->writer = $user;
//            $post->caption = $cap;
//            $post->date = date('Y-m-d');
//            $post->is_public = $privacy;
//            $post->image = $img;
//            $post->save();

        return $this->view('post/form');
    }

    public function edit($post_id){
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
            return $this->view("post/form");

        $cap = (strlen($_POST['caption'])) ? $_POST['caption'] : null;
        $img = ($_FILES['image']['size'] > 0) ? $_FILES['image']: null;
        $privacy = (isset($_POST['privacy'])) ? 1 : 0;
        if ($cap === null && $img === null)
            return $this->view('post/form');    // Need to return with an error massage told the user the post must be contains caption or image or both

        // To download uploaded file in a directory then store the path in db

//        if ($img !== null):
//            $fileName = $img['name'];
//            $tmpFileName = $img['tmp_name'];
//            move_uploaded_file($tmpFileName, '/opt/lampp/htdocs/social/users/files/'.$fileName);
//            $img = $img['tmp_name'];
//        endif;
        $img = null;

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