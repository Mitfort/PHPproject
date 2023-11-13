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

        if(isset($_GET['id'])){

            $connection = mysqli_connect("localhost","root","","phpprojekcik");

            if(!$connection){
                echo "Panoramix ma wywar z magicznym napojem";
                exit();
            }

            $query = "SELECT articleID,title,content,createdAt,userID,first_name,last_name,email FROM `articles` JOIN users ON articles.creatorID = users.userID WHERE articleID = {$_GET['id']}";
            
            $res = mysqli_query($connection,$query);

            if(mysqli_num_rows($res) == 1){

                $row = mysqli_fetch_assoc($res);

                echo  "<div class='p-5 mb-4 bg-body-tertiary rounded-3'>
                <div class='container-fluid py-5'>
                    <h1 class='display-5 fw-bold' style='text-align: center;'>|  {$row['title']}  |</h1><hr>
                    <p class='col-md-8 fs-4 content'>{$row['content']}</p>
                    <small class='text-muted'>Author: {$row['first_name']} {$row['last_name']}</small><br>
                    <small class='text-muted'>Created At: {$row['createdAt']}</small>
                </div>
            </div>";

            }
        }

    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>