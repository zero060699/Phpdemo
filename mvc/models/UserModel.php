<?php
class UserModel extends DB {

    public function show() {
        $qr = "SELECT * FROM users";
        $result = mysqli_query($this->con, $qr);
        $data = mysqli_query($this->con, $qr);
        $rows = [];
        while($row = mysqli_fetch_assoc($data)) {
         array_push($rows,$row);
        }
        return $rows;
    }
    
    public function createUser($username, $password, $email){
        $token = md5($email.$password);
        $password = md5($password);
        $qr = "INSERT INTO users Values(null, '$username' ,'$email', '$password'  , '$token')";
        $result = false;
        if(mysqli_query($this->con, $qr) ) {
            $result = true;
        }
        return json_encode($result);
    }
    

    public function login($email, $password) {    
        $qr = "SELECT * FROM users WHERE email = '$email' AND`password` = '$password' ";
        $result = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_row($result);
        if($row > 0) {
            return true;  
        } 
        return false;
    }

    public function token($token,$email) {
        $qr = "UPDATE users 
        SET token = '$token'
        WHERE email = '$email'";
        if(mysqli_query($this->con, $qr)) {
            return true;
        }
    }

    public function checkUser($email) {
        $qr = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_row($result);
        if($row > 0) {
            return true;  
        } 
        return false;
    }
} 
?>