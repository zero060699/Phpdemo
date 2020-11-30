<?php
class Home extends Controller {   
    public $NewsModel;
    public function  __construct() {
        //Model
        $this->NewsModel = $this->model("NewsModel");
    }
    public function index() {
       $news = $this->NewsModel->show();
       //$users = $this->UserModel->show();
       $this->view("layout", [
           "page" => "home",
           "news" => $news,
        ]);
    }
}
?>