<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <div class="login-container">
        <form action="" method="post">
            <fieldset>
                <legend>
                    LOGIN
                </legend>

                <h3 style="color: whitesmoke;">LOGIN:</h3>
                <div class="form-row" >
                    <input type="text" name="login" placeholder="Login">
                </div>

                <h3 style="color: whitesmoke;">PASSWORD:</h3>
                <div class="form-row">
                    <input type="password" name="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary"> SIGN IN</button>

                <p style="color: whitesmoke; margin-top: 70px;">New here ?</p>
                <button type="button" class="btn btn-secondary registerButton">Register</button>

            </fieldset>

        </form>
    </div>

    <script>
        let registerButton = document.querySelector(".registerButton");

        registerButton.addEventListener("click",() => {
            window.location.href='register.php';
        })
    </script>

    <?php

        if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){

            $login = strip_tags($_POST['login']);
            $password = strip_tags($_POST['password']);

            $password = hash('sha256', $password);

            $connection = mysqli_connect("localhost","root","","phpprojekcik");

            if(!$connection){
                echo "Dalej nie dziala";
                exit(); 
            }

            $query = "SELECT * FROM users WHERE login='{$login}' AND password='{$password}'";

            $res = mysqli_query($connection,$query);

            if(mysqli_num_rows($res) == 1){

                $row = mysqli_fetch_assoc($res);

                session_start();

                $_SESSION['currentUser'] = ["login" => $row['login'],
                                            "first_name" => $row['first_name'],
                                            "last_name"=> $row['last_name'],
                                            "email" => $row['email'],
                                            "birthday" => $row['birthday']];


                unset($_POST['login']);
                unset($_POST['password']);
                
                header("Location:main.php");
            }

            mysqli_close($connection);
        }

    ?>

</body>
</html>