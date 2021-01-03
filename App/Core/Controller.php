<?php


class Controller {

  function view($view,$data=[]){
    require_once(app_path('views/'.$view .".php"));
  }

}
