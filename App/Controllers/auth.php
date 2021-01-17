<?php

class Auth extends Controller{


    public function sign_up(){


        //print_r($_POST);

    
        if(isset($_SESSION['email']) ){
            redirect("auth/profile");
        }


        $data = validate($_POST,array(
            "email"=>"required",
            "first_name"=>"required",
            "last_name"=>"required",
            "password"=>"required",
            "gender"=>"required",
            "day"=>"required",
            "month"=>"required",
            "year"=>"required",
            
        ));

        if(is_string($data) ){
            send_alert($data);
            redirect("auth/login");
        }


        $date = new DateTime();
        $date->setDate($_POST['year'], date('m', strtotime($_POST['month'])), $_POST['day']);
        $final_date = $date->format('Y-m-d');
        
        $other_user = user_model::where(["email"=>$data['email']]);
        if(count($other_user)>0){
            send_alert("this email is unavaiable");
            redirect("auth/login");
        }

        $user = new user_model();
        $user->email = $data['email'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->gender = $data['gender'];
        $user->birth_date = $final_date;
        if($user->gender == "male"){
            $user->picture = "images/male-profile-image.png";
        }else{
            $user->picture = "images/female-profile-image.png";
        }
        $user->save();

        
        $_SESSION['email'] = $user->email;
        redirect("auth/profile");
        
        
    }

    public function login(){ 
        if(isset($_SESSION['email']) ){
            redirect("auth/profile");
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->view("auth/login");
        }else{


            $data = validate($_POST,array(
                "email"=>"required",
                "password"=>"required",
            ));

            if(is_string($data) ){
                echo $data;
                return $this->view("auth/login",['old'=>$data]);
            }


            $user = user_model::where(["email"=>$_POST['email']]);
            if(!$user){
                send_alert("user not found"); // change it to varialbe named error and display the error
                return $this->view("auth/login",['old'=>$data]);
            }
            $vert =  password_verify($_POST['password'],$user[0]->password);
            if(!$vert){
                send_alert("wrong password"); // change it to varialbe named error and display the error
                return $this->view("auth/login",['old'=>$data]);
                
            }else{
                $_SESSION['email'] = $user[0]->email;
                redirect("auth/profile");
            }

            
        }
        
        
        
    }


    public function logout(){
        session_destroy();
        redirect("auth/login");
    }

    public function profile($user_email=NULL){
        require_login();

        if($user_email && $user_email!=$_SESSION['email']){
            $user = user_model::where(["email"=>$user_email])[0];
            $is_blocked = friend_model::check_blocking($user_email,$_SESSION['email']);
            if($is_blocked){
                send_alert("can't view user profile");
                return redirect("auth/profile");
            }
            $posts =  post_model::get_my_posts($user_email);
            // $columns = array_column($posts, 'date');
            //array_multisort($columns, SORT_DESC, $posts);
            $friends = friend_model::friends($user_email);
            $is_friend = friend_model::check_friendship($user_email,$_SESSION['email']);
            $has_sent_request = friend_model::can_request($_SESSION['email'], $user_email);
            $this->view('auth/profile_form',[
                "user"=>$user,
                "posts"=>$posts,
                "friends"=>$friends,
                "is_friend"=>$is_friend,
                "can_send_friend_request" => $has_sent_request
            ]);


        }else{
            
            $user = user_model::where(["email"=>$_SESSION['email']])[0];
            $posts =  post_model::get_my_posts($_SESSION['email']);
            # TODO change sorting in the database
            //$columns = array_column($posts, 'date');
            //array_multisort($columns, SORT_DESC, $posts);


            $friends = friend_model::friends($_SESSION['email']);
            $all_requests = friend_model::all_requests($_SESSION['email']);
            $blocked_users = friend_model::get_blocked($_SESSION['email']);
            $phones = phone_model::where(['email'=>$_SESSION['email']]);

            $this->view('auth/profile_form',[
                    "user"=>$user,
                    "posts"=>$posts,
                    "friends"=>$friends,
                    "friend_requests"=>$all_requests,
                    "blocked_users"=>$blocked_users,
                    "phones"=>$phones
                    
            ]);
        }   
    }

    public function edit_profile(){
        require_login();
        
        //print_r($_POST);
        
        $data = validate($_POST,array(
            "first_name"=>"required",
            "last_name"=>"required",
            "gender"=>"required",
            "day"=>"required",
            "month"=>"required",
            "year"=>"required",
            "nick_name"=>"",
            "home_town"=>"",
            "status"=>"",
            "about_me"=>"",
            "phones"=>"",
            "old_password"=>"",
            "new_password"=>""
            
        ));

        # not valid input entered
        if(is_string($data) ){
            send_alert($data);
            redirect("auth/profile");
        
        }

        $date = new DateTime();
        $date->setDate($_POST['year'], date('m', strtotime($_POST['month'])), $_POST['day']);
        $final_date = $date->format('Y-m-d');

        
        $user = user_model::where(["email"=>$_SESSION['email']])[0];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->nick_name = $data['nick_name'];
        $user->gender = $data['gender'];
        $user->birth_date = $final_date;
        $user->home_town = $data['home_town'];
        $user->status = $data['status'];
        $user->about_me = $data['about_me'];

        if($data['old_password'] && $data['new_password'] ){
            if(password_verify($data['old_password'],$user->password)){
                $user->password = password_hash($data['new_password'], PASSWORD_DEFAULT);
                send_alert("password changed successfuly");
            }else{
                send_alert("wrong password");
            }
        }

        $user->update();

        

        # TODO update the query to be more optimized
        phone_model::delete_all($_SESSION['email']);
        foreach ($data['phones'] as $phone_num ) {
            $phone = new phone_model();
            $phone->phone_num = $phone_num;
            $phone->email = $_SESSION['email'];
            $phone->save();
        }
        send_alert("profile updated successfully");
        redirect("auth/profile");
    
        
        
    }


    public function profile_photo(){
        require_login();

        $user = user_model::where(["email"=>$_SESSION['email']])[0];
        $user->picture = upload_file('picture');
        $user->update();

        $post = new post_model();
        $post->writer = $user->email;
        $message = "his";
        if($user->gender=="female"){
            $message = "her";
        }
        $post->caption = $user->first_name." ".$user->last_name . " " . "updated $message profile picture";
        $post->is_public = 0;
        $post->image = $user->picture;
        $post->save();


        redirect("auth/profile");

    }

}