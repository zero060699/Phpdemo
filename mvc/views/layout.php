<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php/public/css/header.css">
    <link rel="stylesheet" href="http://localhost/php/public/css/table.css">
    <link rel="stylesheet" href="http://localhost/php/public/css/addNew.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sun*</title>
</head>
<body>
    <?php require_once "./mvc/views/blocks/header.php" ?>
    <div class="container_main">
        <?php 
        if(!isset($_SESSION['user'])) {
            header('location:http://localhost/php/User/login');
        }
        if(isset($_COOKIE['key'])) {
            $checkCookie = false;
            foreach($data["users"] as $value) {
                if($value["token"] == $_COOKIE['key']){
                    $_SESSION["user"] = $value['email'];
                    $checkCookie = true;
                }
            }
            if($checkCookie == false) {
                unset($_SESSION["user"]);
                header("location: http://localhost/php/User");
            } 
        }
        require"./mvc/views/pages/".$data["page"].".php" 
        ?>
    </div>
</body>
<script type="text/javascript">
      function checkDelete(){
          return confirm('Are you sure');
      }
</script>
</html>

