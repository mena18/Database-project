<?php 
class Home extends Controller{


public function index(){
    $posts = post_model::get_my_posts($_SESSION['email']);
    print_r($posts);
    return $this->view("home/index",['posts'=>$posts]);
}
    


public function search(){
    // search for user with this name excluding the user how blocked you then display them  
    
    $this->view('home/search');
    
}
    
    
}