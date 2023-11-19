<?php

require './../config/db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="main">
        <div class="div-content">
            <h1>register</h1>
            <div class="div-content"></div>
                <form action="" method="post">
                    <div>
                        <label for="Name">name</label>
                        <input type="name" name="name" id="name">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div>
                        <label for="password">password</label>
                        <input type="password" name="password" id="password">

                    </div>
                    <div>
                        <label for="confirmpasword">Confirmpassword</label>
                        <input type="confirmpassword" name="confirmpassword" id="confirmpassword">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="register">
                        <p> already have an account? <a href="login.php">login now</a>
                    </div>
                </form>
            </div>

            <?php
                 if(isset($_POST['submit'])){
                    $email = htmlspecialchars($_POST['email']);
                    $password = htmlspecialchars($_POST['password']);
                    $encryptedpassword = password_hash($password, PASSWORD_DEFAULT);

                 
    
                    $query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
                    $count = mysqli_num_rows($query);
                    

                    if($count> 0){
                        echo"cannot register. this email is existed in database";
                    }
                    else {
                        $queryinsert = mysqli_query($con, "INSERT INTO users (email, password) VALUES 
                        ('$email', '$encryptedpassword')");
                    
                        if($queryinsert) {
                            echo"register succes";

                        }
                    }

                }
            ?>
        </div>
    </div>
</body>
</html>

    
