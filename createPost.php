<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <?php

        session_start();

        if(!isset($_SESSION['currentUser'])){
            header("Location:register.php");
        }

        ?>

        <?php
          include("header.html");
          
        ?>

        <?php

        if(isset($_POST['title']) && isset($_POST['content'])){

            $title = strip_tags($_POST['title']);
            $content = strip_tags($_POST['content']);

            $connection = mysqli_connect("localhost","root","","phpprojekcik");

            if(!$connection){
                echo "DALEJ NIE MA BAZY";
                exit();
            }

            $query2 = "SELECT userID FROM users WHERE login='{$_SESSION['currentUser']['login']}'";

            $res2 = mysqli_query($connection,$query2);

            $userID = mysqli_fetch_assoc($res2);

            $date = date('Y-m-d H:i:s');

            $query = "INSERT INTO articles (creatorID,title,content,createdAt) VALUES ({$userID['userID']},'{$title}','{$content}','{$date}')";

            $res = mysqli_query($connection,$query);

            echo "<script>alert('Dodano Post')</script>";

        }

        ?>



        <div class="create-post-menu">

            <form action="" method="post">
                
                <div class="form-row">
                    <label for="title">TITLE</label>
                    <input type="text" name="title" id="title" >
                </div>

                <div class="form-row">
                    <label for="content">CONTENT</label>
                    <textarea name="content" id="content"></textarea>
                </div>

                <button type="submit">Create Post</button>

            </form>

        </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>