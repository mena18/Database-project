<?php

class Post extends Controller{


    public function create(){
        
        require_login();

        $user = $_SESSION['email'];
        $cap = (strlen($_POST['caption'])) ? $_POST['caption'] : null;
        $img = upload_file("image");
        $privacy = ($_POST['privacy']==='public') ? 1 : 0;
        if ($cap === null && $img === null)
            return $this->view('post/form');    // Need to return with an error massage told the user the post must be contains caption or image or both

        if (!$img){
            $img = NULL;
        }
        $post = new post_model();
        $post->writer = $user;
        $post->caption = $cap;
        $post->date = date('Y-m-d');
        $post->is_public = $privacy;
        $post->image = $img;
        $post->save();

        return redirect("auth/profile");

//        return $this->view('auth/profile_form');
    }

    public function edit($post_id){
        require_login();


        print_r($_POST);
        #return ;

        $cap = (isset($_POST['caption'])) ? $_POST['caption'] : null;
        $img = upload_file("image");
        $privacy = (isset($_POST['privacy'])) ? $_POST['privacy'] : 0;
        if ($cap === null && $img === null)
            redirect('auth/profile');    // Need to return with an error massage told the user the post must be contains caption or image or both

        $data=[];
        $data['caption']=$cap;
        $data['is_public']=$privacy == "public" ? 1 : 0 ;
        if($img){
            $data['image']=$img;
        }

        post_model::edit($post_id, $data);
        // send_alert("post updated successfully");
        redirect("auth/profile");
    }

    public function delete($post_id, $date) {
        require_login();
        post_model::remove($_SESSION['email'], $post_id, $date);
    }


    public function share($post_id){
        require_login();
        
        $email = $_SESSION['email'];
        post_model::share($email,$post_id);
        echo "shared successfully";
        
    }

    public function react($post_id){
        require_login();
        
        $email = $_SESSION['email'];
        $react = post_model::get_react($email,$post_id);
        if($react){
            post_model::delete_react($email,$post_id);    
            echo json_encode(["message"=>"react deleted successfully"]);
        }else{
            post_model::add_react($email,$post_id);    
            echo json_encode(["message"=>"react created successfully"]);
        }
        
        
    }

    
    

    

}