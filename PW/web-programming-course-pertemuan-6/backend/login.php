<?php

require './../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <div class="div-content">
            <h1>login</h1>
            <div class="div-content">
            </div>
            <form action="" method="post">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off">
                    </div>

                    <div>
                        <label for="password">password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="login">
                        <p> have an account? <a href="register.php">login now</a>
                    </div>
            </form>

            <?php
                if(isset($_POST["submit"])) {
                    $email = htmlspecialchars($_POST["email"]);
                    $password = htmlspecialchars($_POST["password"]);

                    $query = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
                    $count = mysqli_num_rows($query);
                    echo $count;

                    if($count> 0){
                        $data = mysqli_fetch_array($query);
                        if(password_verify($password, $data['password']));
                            $_SESSION['logged_in'] = true;
                            $_SESSION['email'] = $data['email'];

                            header("location: create.php");
                        }
                        else {
                            echo"your account is invalid";
                            }

                    }

            ?>

        </div>
    </div>
</body>
</html>