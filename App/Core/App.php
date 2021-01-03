<?php


class App{

  protected $controller = "test";
  protected $method = "index";
  protected $params = [];

  public function __construct(){
    $url = $this->Get_url();
    //print_r($url);
    //return ;
    if(file_exists(app_path('Controllers/') . $url[0] . '.php')){
      $this->controller = $url[0];
      unset($url[0]);
    }
    require_once(app_path('Controllers/') . $this->controller . '.php');

    $this->controller = new $this->controller;

    if(isset($url[1])){
      if(method_exists($this->controller,$url[1])){
        $this->method = $url[1];
        unset($url[1]);
      }
    }
    $this->params = $url ? array_values($url) : [];

    call_user_func_array([$this->controller,$this->method],$this->params);

  }

  public function Get_url(){
    if(isset($_GET['url'])){
      return  explode('/',$_GET['url']);
    }else{
      return  array("index");
    }
  }

}
