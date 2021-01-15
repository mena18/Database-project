<?php 
class Home extends Controller{


    public function index(){
        require_login();
        $posts = post_model::get_home_page($_SESSION['email']);
        $this->view('home/index',["posts"=>$posts]);
    }
        
    public function search(){
        require_login();
        $search = $_POST['search'];
        $users = user_model::search_user($search);
        $this->view('home/search',['users'=>$users,"search"=>$search]);
        
    }
}