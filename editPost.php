<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: "textarea",
        plugins: [
        "insertdatetime"
        ],
        width: 700,
        height: 400,})
        </script>
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

    <div class="editPost-menu">
        <div class="leftSide">
            <div class='d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary' style='width: 100%;'>
                <h2 class='fs-5 fw-semibold' style='text-align: center;'>My Articles</h2>
                <?php

                    $connection = mysqli_connect("localhost","root","","phpprojekcik");

                    if(!$connection){
                        echo "Maluch to tez auto";
                        exit();
                    }

                    $query = "SELECT articleID,title,content,createdAt,userID,first_name,last_name,email FROM `articles` JOIN users ON articles.creatorID = users.userID WHERE login='{$_SESSION['currentUser']['login']}' AND email = '{$_SESSION['currentUser']['email']}' ORDER BY createdAt DESC";
                    
                    $res = mysqli_query($connection,$query);

                    if($res){

                        while($row = mysqli_fetch_assoc($res)){

                            echo "
                            <div class='list-group list-group-flush border-bottom scrollarea'>
                            <a href='?id={$row['articleID']}' class='list-group-item list-group-item-action py-3 lh-sm' aria-current='true'>
                                <div class='d-flex w-100 align-items-center justify-content-between'>
                                <strong class='mb-1'>{$row['title']}</strong>
                                <small>{$row['createdAt']}</small>
                                </div>
                                <div class='col-10 mb-1 small'>";

                                if(strlen($row['content']) < 15){
                                    for($i=0; $i< strlen($row['content']); $i++){
                                        echo "{$row['content'][$i]}";
                                    }
                                }
                                else {
                                    for($i=0; $i<= 20; $i++){
                                        echo "{$row['content'][$i]}";

                                        if($i + 1 >= strlen($row['content'])){
                                            break;
                                        }
                                    }
                                }
                                
                            echo "</div>
                            </a>
                            </div>";

                        }

                    }

                ?>
            </div>
        </div>

        <div class="rightSide">
                <?php 

                    if(isset($_GET['id'])){

                        $connection = mysqli_connect("localhost","root","","phpprojekcik");

                        if(!$connection){
                            echo "INDEX PHP";
                            exit();
                        }

                        $query = "SELECT * FROM `articles` JOIN users ON articles.creatorID = users.userID WHERE login = '{$_SESSION['currentUser']['login']}' AND articleID = '{$_GET['id']}'";
                        

                        $res = mysqli_query($connection,$query);

                        if($res){

                            $row = mysqli_fetch_assoc($res);

                            echo "
                            <form action='' method='post'>
                
                            <div class='form-row'>
                                <label for='title'>TITLE</label>
                                <input type='text' name='title' id='title' value='{$row['title']}'>
                            </div>
            
                            <div class='form-row'>
                                <label for='content'>CONTENT</label>
                                <textarea name='content' id='mytextarea' }'>{$row['content']}</textarea>
                            </div>
            
                            <button type='submit'>Edit Post</button>
                
                            </form>
                            ";
                        }

                    }

                ?>

                <?php

                    if(isset($_POST['title']) && isset($_POST['content']) && isset($_GET['id'])){

                        $connection = mysqli_connect("localhost","root","","phpprojekcik");

                        if(!$connection){
                            echo "INDEX PHP";
                            exit();
                        }

                        $query = "UPDATE getarticle SET title='{$_POST['title']}', content='{$_POST['content']}' WHERE articleID = '{$_GET['id']}' AND login ='{$_SESSION['currentUser']['login']}'";

                        $res = mysqli_query($connection,$query);

                    }

                ?>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>