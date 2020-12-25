<?php 
class Home extends Controller{


public function index(){
    
    $this->view('home/index');
}
    


public function search(){
    // search for user with this name excluding the user how blocked you then display them  
    
    $this->view('home/search');
    
}
    
    
}