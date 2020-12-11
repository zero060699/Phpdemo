<?php
 class NewsModel extends DB {
    public function show() {
       $qr = "SELECT * FROM News ORDER BY id DESC";
       $data = mysqli_query($this->con, $qr);
       $rows = [];
       while($row = mysqli_fetch_assoc($data)) {
         array_push($rows,$row);
       }
       return $rows;
    }

    public function getNew($id) {
       $qr = "SELECT * FROM News WHERE id = '$id'";
       $result = mysqli_query($this->con, $qr);
       $row = mysqli_fetch_assoc($result);
       return $row;
    }

    public function store($title, $content) {
      $qr = "INSERT INTO News VALUES(null, '$title' , '$content')";
      $result = false;
      if(mysqli_query($this->con, $qr)) {
         return $result = true;
      }
      json_encode($result);
    }

    public function update($id, $title, $content) {
       $qr = "UPDATE News 
       SET title = '$title', content = '$content' 
       WHERE id = '$id'";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
           return $result = true;
        }
        json_encode($result);
    }

    public function destroy($id) {
      $qr = "DELETE FROM News WHERE id = '$id'";
      $result = false;
      if(mysqli_query($this->con, $qr)) {
         return $result = true;
      }
      json_encode($result);
    }
 }
?>