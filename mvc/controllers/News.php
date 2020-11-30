<?php
class News extends Controller {
    public $NewsModel;
    public function  __construct() {
        //Model
        $this->NewsModel = $this->model("NewsModel");
    }

    public function index() {
        $news = $this->NewsModel->show();
        $this->view("layout", [
            "page" => "home",
            "news" => $news,
         ]);
    }

    public function show($id) {
        $result = $this->NewsModel->getNew($id);
        if($result) {
            $this->view("layout",
                [
                    "page" => "viewNew",
                    "new" => $result,
                ]
            );
        }
    }

    public function addNew() {
        $this->view("layout",["page" => "addNew"]);
    }

    public function store() {
        if(isset($_POST["btn_store"])){
            $title = htmlspecialchars($_POST["title"]);
            $content = htmlspecialchars($_POST["content"]);
            
            if(strlen($title) < 5) {
                $_SESSION['error'] = "Tiêu đề phải có ít nhất 5 ký tự";
                return header("location: http://localhost/php/News/addNew");
            }

            if(strlen($content) < 10) {
                $_SESSION['error'] = "Nội dung không được ngắn quá";
                return header("location: http://localhost/php/News/addNew");
            }
           
            $result =  $this->NewsModel->store($title, $content);
            if($result) {
                $news = $this->NewsModel->show();
                header("location: http://localhost/php/Home");
            }
        }
    }

    public function edit($id) {
        $result = $this->NewsModel->getNew($id);
        if($result) {
            $this->view("layout",
                [
                    "page" => "editNew",
                    "new" => $result,
                ]
            );
        }
    }

    public function editNew() {
        $id = htmlspecialchars($_POST['id']);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        if(strlen($title) < 5) {
            $_SESSION['error'] = "Tiêu đề phải có ít nhất 5 ký tự";
            $result = $this->NewsModel->getNew($id);
            if($result) {
                return $this->view("layout",
                    [
                        "page" => "editNew",
                        "new" => $result,
                    ]
                );
            }
        }

        if(strlen($content) < 10) {
            $_SESSION['error'] = "Nội dung không được ngắn quá";
            $result = $this->NewsModel->getNew($id);
            if($result) {
                return $this->view("layout",
                    [
                        "page" => "editNew",
                        "new" => $result,
                    ]
                );
            }
        }

        $result = $this->NewsModel->update($id, $title, $content);
        if($result) {
            $_SESSION["mess"] = "Sửa thành công";
            header("location: http://localhost/php/Home");
        }else {
            $_SESSION["mess"] = "Sửa thất bại";
            header("location: http://localhost/php/Home");
        }
    }

    public function destroy($id) {
        $result = $this->NewsModel->destroy($id);
        if($result) {
            $_SESSION["mess"] = "Xóa thành công";
            header("location: http://localhost/php/Home");
        }
    }
}
?>