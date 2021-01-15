<?php

class Auth extends Controller{


    public function sign_up(){


        print_r($_POST);

    
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
            echo $data;
            return $this->view("auth/login");
        }


        $date = new DateTime();
        $date->setDate($_POST['year'], date('m', strtotime($_POST['month'])), $_POST['day']);
        $final_date = $date->format('Y-m-d');
        
        $user = new user_model();
        $user->email = $data['email'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->gender = $data['gender'];
        $user->birth_date = $final_date;
        $user->save();

        # TODO create session to make the user logged in
        $_SESSION['email'] = $user->email;
        redirect("auth/profile");
        
        
    }

    public function login(){ 
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
                echo "user not found"; // change it to varialbe named error and display the error
                return $this->view("auth/login",['old'=>$data]);
            }
            $vert =  password_verify($_POST['password'],$user[0]->password);
            if(!$vert){
                echo "wrong password"; // change it to varialbe named error and display the error
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
                return redirect("auth/profile");
            }
            $posts =  post_model::get_my_posts($user_email);
            $firends = friend_model::friends($user_email);
            $is_friend = friend_model::check_friendship($user_email,$_SESSION['email']);
            $this->view('auth/profile_form',[
                "user"=>$user,
                "posts"=>$posts,
                "friends"=>$firends,
                "is_friend"=>$is_friend,

            ]);


        }else{
            
            $user = user_model::where(["email"=>$_SESSION['email']])[0];
            $posts =  post_model::get_my_posts($_SESSION['email']);
            $firends = friend_model::friends($_SESSION['email']);
            $all_requests = friend_model::all_requests($_SESSION['email']);
            $blocked_users = friend_model::get_blocked($_SESSION['email']);
            $phones = phone_model::where(['email'=>$_SESSION['email']]);

            $this->view('auth/profile_form',[
                    "user"=>$user,
                    "posts"=>$posts,
                    "friends"=>$firends,
                    "friend_requests"=>$all_requests,
                    "blocked_users"=>$blocked_users,
                    "phones"=>$phones
                    
            ]);
        }   
    }

    public function edit_profile(){
        require_login();
        
        print_r($_POST);
        
        $data = validate($_POST,array(
            "first_name"=>"required",
            "last_name"=>"required",
            "gender"=>"required",
            "birth_date"=>"",
            "nick_name"=>"",
            "home_town"=>"",
            "status"=>"",
            "about_me"=>"",
            "phones"=>"",
            
        ));

        # not valid input entered
        if(is_string($data) ){
            redirect("auth/profile");
            // echo $old;
            //return $this->view("auth/sign_up");
        
        }
        
        $user = user_model::where(["email"=>$_SESSION['email']])[0];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->nick_name = $data['nick_name'];
        $user->gender = $data['gender'];
        //$user->birth_date = $old['birth_date'];
        // $new_pic = upload_file('picture');
        // if($new_pic){
        //     $user->picture = $new_pic; // i didn't created the path yet
        // }
        $user->home_town = $data['home_town'];
        //$user->status = $old['status'];
        $user->about_me = $data['about_me'];
        $user->update();

        

        # TODO update the query to be more optimized
        phone_model::delete_all($_SESSION['email']);
        foreach ($data['phones'] as $phone_num ) {
            $phone = new phone_model();
            $phone->phone_num = $phone_num;
            $phone->email = $_SESSION['email'];
            $phone->save();
        }

        redirect("auth/profile");
    
        
        
    }


    public function profile_photo(){
        require_login();

        $user = user_model::where(["email"=>$_SESSION['email']])[0];
        $user->picture = upload_file('picture');
        $user->update();

        $post = new post_model();
        $post->writer = $user->email;
        $post->caption = $user->first_name." ".$user->last_name . " " . "updated his profile picture";
        $post->is_public = 0;
        $post->image = $user->picture;
        $post->save();


        redirect("auth/profile");

    }

}