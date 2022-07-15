<?php
    include 'db.php';
    include 'config.php';

    session_start();
    if(!empty($_POST["username"])){
        $query = "SELECT * FROM tbl_users_208 WHERE email = '" . $_POST["username"] . "' AND password = '" . $_POST["password"] . "'";
        $result = mysqli_query($connection , $query);
        $row = mysqli_fetch_array($result);
        if(is_array($row)){
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["user_type"] = $row["user_type"];
            header("Location: " . "main.php");
        }
        else{
            $massage = "Invalid user or password";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/style.css">
    <title>SIS -Login</title>
</head>
<body>
    <div class="loginContainer">
        <section class="loginIconImage">
            <img src="images/SIS - New Icon.png" alt="">
        </section>
        <section class="loginSection">
            <div class="loginTitle">
                <h1><b>Login</b></h1>
            </div>
            <form action="#" method="post">
                <label for="userName">
                    <input required type="text" name="username" placeholder="Type your E-Mail">
                    <span>E-Mail</span>
                </label>
                <label for="password">
                    <input required type="password" name="password" placeholder="Type your password">
                    <span>Password</span>
                </label>
                <div class="error-massage">
                    <?php
                    if(isset($massage)){
                        echo $massage;
                    }
                    ?>
                </div>
                <button class="forgot">Forgot password?</button>
                <input type="submit" value="LOGIN">
            </form>
            <h5>Or Login Using</h5>
            <div class="loginBySocial">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-twitter"></i>
                <i class="bi bi-google"></i>
            </div>
            <div class="notAccount">
                <h6>Have not account yet?</h6>
                <button class="signUp">SIGN UP</button>
            </div>
        </section>

    <div class="registerSection">
        <div class="registerTitle">
            <h1><b>Register</b></h1>
        </div>
        <form action="">
            <label for="FName-Register">
                <input required type="text" name="FName-register" placeholder="Type your Full Name">
                <span>Full Name</span>
            </label>

            <label for="Email-Register">
                <input required type="text" name="Email-register" placeholder="Type your E-Mail">
                <span>E-Mail</span>
            </label>
            <label for="password-Register">
                <input required type="password" name="password-register" placeholder="Type your password">
                <span>Password</span>
            </label>
            <input type="submit" value="CREATE">
        </form>
        <h5>Or register Using</h5>
        <div class="loginBySocial">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-google"></i>
        </div>
        <button class="BackToLogin">BACK TO LOGIN</button>
    </div>
</div>

      <script src="js/script.js"></script>
</body>
</html>
<?php
mysqli_close($connection);
?>