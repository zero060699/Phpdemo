<?php
class Controller {

    public $UserModel;

    function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    function view($view, $data=[]){
        $this->UserModel = $this->model("UserModel");
        $users = $this->UserModel->show();
        $data['users'] = $users;
        require_once "./mvc/views/".$view.".php";
    }
} 
?>
