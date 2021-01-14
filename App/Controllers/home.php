<?php 
class Home extends Controller{


public function index(){
    $posts = post_model::get_home_page($_SESSION['email']);
    
    $this->view('home/index',["posts"=>$posts]);
}
    


public function search(){
    $search = $_POST['search'];
    $users = user_model::search_user($search);

    $this->view('home/search',['users'=>$users,"search"=>$search]);
    
}
    
    
}