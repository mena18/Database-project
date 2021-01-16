<?php 
class Home extends Controller{


    public function index(){
        require_login();
        $user = user_model::where(["email"=>$_SESSION['email']])[0];
        $posts = post_model::get_home_page($_SESSION['email']);
        $this->view('home/index',["user" => $user, "posts" => $posts ]);
    }
        
    public function search(){
        require_login();
        $search = $_POST['search'];
        $users = user_model::search_user($search, $_SESSION['email']);
        $this->view('home/search',['users'=>$users,"search"=>$search]);
    }
}