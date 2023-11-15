<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    
    <?php

    session_start();

    if(!isset($_SESSION['currentUser'])){
        header("Location:register.php");
    }

    ?>

    <?php
    include("header.php");

        $connection = mysqli_connect("localhost","root","","phpprojekcik");

        $query = "SELECT data FROM profileimages WHERE photoID='{$_SESSION['currentUser']['photoID']}'";

        $res = mysqli_query($connection,$query);

        if($res){

            $data = mysqli_fetch_assoc($res);

        }
    
    ?>

    <div class="profile-container">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src=<?php echo "data:image/jpg;base64,".base64_encode($row['data'])?> alt="Maxwell Admin" >
                            </div>
                            <h5 class="user-name"><?php echo "{$_SESSION['currentUser']['first_name']} {$_SESSION['currentUser']['last_name']}" ?></h5>
                            <h6 class="user-email"><?php echo "{$_SESSION['currentUser']['email']}" ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <form class="card-body" action="" method="post" enctype="multipart/form-data">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter first name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="image">Profile Photo</label>
                                <input type='file' class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class='btn btn-primary' style="margin-top: 50px;">Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?php 

        if(isset($_POST['fname']) && !empty($_POST['fname'])){

            $connection = mysqli_connect("localhost","root","","phpprojekcik");

            if(!$connection){
                echo "Nie bedzie updata";
                exit();
            }

            $query = "UPDATE users SET first_name = '{$_POST['fname']}' WHERE login='{$_SESSION['currentUser']['login']}'";

            $res = mysqli_query($connection,$query);
        }

        if(isset($_POST['lname']) && !empty($_POST['lname'])){
            
            $connection = mysqli_connect("localhost","root","","phpprojekcik");

            if(!$connection){
                echo "Nie bedzie updata";
                exit();
            }

            $query = "UPDATE users SET last_name = '{$_POST['lname']}' WHERE login='{$_SESSION['currentUser']['login']}'";

            $res = mysqli_query($connection,$query);
        }

        if(isset($_POST['email']) && !empty($_POST['email'])){
            
            $connection = mysqli_connect("localhost","root","","phpprojekcik");

            if(!$connection){
                echo "Nie bedzie updata";
                exit();
            }

            $query = "UPDATE users SET email = '{$_POST['email']}' WHERE login='{$_SESSION['currentUser']['login']}'";

            $res = mysqli_query($connection,$query);
        }

            
        if(isset($_FILES['image'])){

            $connection = mysqli_connect("localhost","root","","phpprojekcik");

            if(!$connection){
                echo "Nie bedzie updata";
                exit();
            }

            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $imageName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            
            $fileExt = explode('.' ,$imageName);
            $fileActualExt  = strtolower(end($fileExt));

            $allowed = array('jpg','jpeg','png','pdf');

            if(in_array($fileActualExt,$allowed)){
                if($fileSize < 65536){
                    
                    $query2 = "SELECT userID FROM users WHERE login='{$_SESSION['currentUser']['login']}'";

                    $res = mysqli_query($connection,$query2);
        
                    if(mysqli_num_rows($res) == 1){
        
                        $row = mysqli_fetch_assoc($res);
        
                        $query = "UPDATE profileimages SET name='{$imageName}', data='{$imgData}' WHERE userID='{$row['userID']}'";
        
                        $res2 = mysqli_query($connection,$query);
        
                    }

                    echo "<script>window.location.href = 'main.php'</script>";
                }
                else {

                    echo "<script>alert('plik jest za duzy')</script>";
                    exit();
                }
            }


        }


    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>