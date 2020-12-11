<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php/public/css/login.css">
    <title>Sun*</title>
</head>
<body>
<form action="http://localhost/php/User/postLogin" method="POST">
    <div class="container">
        <div class="imgcontainer">
            <img src="https://sun-asterisk.vn/wp-content/uploads/2019/03/Sun-Logotype-RGB-01.png" alt="sun*">
            <?php if(isset($_SESSION['login_error'])){
                echo "<h4 style='color: red'>".$_SESSION['login_error']."<h4/>";
                unset($_SESSION["login_error"]);
            } ?>
            <?php 
                $check = false;
                if(isset($_COOKIE['key'])) {
                    $check = true;
                }
            ?>
        </div> 
        <div class="login">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" value="" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="" required>

            <button type="submit" name="btnLogin">Login</button>
            <label>
            <input <?php echo $check?"checked":"" ?> type="checkbox" name="remember" value="1"> Remember me
            <a href="http://localhost/php/User/register">Sign Up</a>
            </label>
        </div>
    </div>
    </form>
    <?php
       if(isset($_SESSION['login'])){
          echo "<script type='text/javascript'>alert('Register sucessfull')</script>";
          unset($_SESSION['login']);
       }
    ?>
</body>
</html>