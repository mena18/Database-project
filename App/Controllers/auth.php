<?php

class Auth extends Controller{


    public function sign_up(){
        //if(!isset($_SESSION['user']) ){echo "You aren't admin";return ;}
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_SESSION['email']) ){
                redirect("auth/my_profile");
            }
            return $this->view("auth/sign_up");
        }else{

            $old = validate($_POST,array(
                "email"=>"required",
                "first_name"=>"required",
                "last_name"=>"required",
                "password"=>"required",
                "gender"=>"required",
                "birth_date"=>"required",
                "nick_name"=>"",
                "home_town"=>"",
                "status"=>"",
                "about_me"=>"",
                "phone"=>"",
                
            ));

            if(is_string($old) ){
                echo $old;
                return $this->view("auth/sign_up");
            }
            
            $user = new user_model();
            $user->email = $old['email'];
            $user->first_name = $old['first_name'];
            $user->last_name = $old['last_name'];
            $user->nick_name = $old['nick_name'];
            $user->password = password_hash($old['password'], PASSWORD_DEFAULT);
            $user->gender = $old['gender'];
            $user->birth_date = $old['birth_date'];
            $user->picture = upload_file('picture');
            if(!$user->picture){
                $user->picture = "default_image"; // i didn't created the path yet
            }
            $user->home_town = $old['home_town'];
            $user->status = $old['status'];
            $user->about_me = $old['about_me'];
            $user->save();

            $phone = new phone_model();
            $phone->phone_num = $old['phone'];
            $phone->email = $user->email;
            $phone->save();

            # TODO create session to make the user logged in
            $_SESSION['email'] = $user->email;
            redirect("auth/my_profile");
        }
        
    }

    public function login(){ 
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->view("auth/login");
        }else{


            $old = validate($_POST,array(
                "email"=>"required",
                "password"=>"required",
            ));

            if(is_string($old) ){
                echo $old;
                return $this->view("auth/login",['old'=>$old]);
            }


            $user = user_model::where(["email"=>$_POST['email']]);
            if(!$user){
                echo "user not found"; // change it to varialbe named error and display the error
                return $this->view("auth/login",['old'=>$old]);
            }
            $vert =  password_verify($_POST['password'],$user[0]->password);
            if(!$vert){
                echo "wrong password"; // change it to varialbe named error and display the error
                return $this->view("auth/login",['old'=>$old]);
                
            }else{
                $_SESSION['email'] = $user[0]->email;
                redirect("auth/my_profile");
            }

            
        }
        
        
        
    }


    public function logout(){
        // get the form data
        // log the user in or return the form page with errors  
        
        session_destroy();
        redirect("auth/login");
        
        
    }

    public function my_posts(){
        // get the form data
        // log the user in or return the form page with errors  
        
        return $this->view("auth/posts");
        
        
    }

    public function my_profile(){
        // get the form data
        // log the user in or return the form page with errors  
        
        if(!isset($_SESSION['email']) ){
            return redirect("auth/login");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user = user_model::where(["email"=>$_SESSION['email']])[0];
            $posts = post_model::get_my_posts($_SESSION['email']);
            return $this->view("auth/profile_form",['user'=>$user, 'posts'=>$posts]);
        }else{
            $old = validate($_POST,array(
                "first_name"=>"required",
                "last_name"=>"required",
                "gender"=>"required",
                "birth_date"=>"required",
                "nick_name"=>"",
                "home_town"=>"",
                "status"=>"",
                "about_me"=>"",
                
            ));

            if(is_string($old) ){
                echo $old;
                //return $this->view("auth/sign_up");
            }
            
            $user = user_model::where(["email"=>$_SESSION['email']])[0];
            $user->first_name = $old['first_name'];
            $user->last_name = $old['last_name'];
            $user->nick_name = $old['nick_name'];
            $user->gender = $old['gender'];
            $user->birth_date = $old['birth_date'];
            $new_pic = upload_file('picture');
            if($new_pic){
                $user->picture = $new_pic; // i didn't created the path yet
            }
            $user->home_town = $old['home_town'];
            $user->status = $old['status'];
            $user->about_me = $old['about_me'];
            $user->update();

            // TODO might create a seperate one for the phones (because you can create or delete many phones)
            // TODO might create seperate one for password (because it's secured)
            // $phone = new phone_model();
            // $phone->phone_num = $old['phone'];
            // $phone->email = $user->email;
            // $phone->save();

            redirect("auth/my_profile");
        }
        
        
    }

}