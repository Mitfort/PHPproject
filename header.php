<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="main.php" class="nav-link px-2 link-secondary">Main</a></li>
              <li><a href="createPost.php" class="nav-link px-2 link-body-emphasis">Create Post</a></li>
              <li><a href="editPost.php" class="nav-link px-2 link-body-emphasis">Edit Post</a></li>
            </ul>

            <?php

              $connection = mysqli_connect("localhost","root","","phpprojekcik");

              if(!$connection){
                echo "NO ja nie wiem";
                exit();
              }

              $query = "SELECT data FROM profileImages WHERE photoID = '{$_SESSION['currentUser']['photoID']}'";

              $res = mysqli_query($connection,$query);

              $row = mysqli_fetch_assoc($res);

            ?>
    
            <div class="dropdown text-end">
              <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                  echo "<img src='data:image/jpg;base64," . base64_encode($row['data']) . "' alt='xd' width='48' height='48' class='rounded-circle'>";
                ?>
                <!-- <img src= alt="mdo" width="32" height="32" class="rounded-circle"> -->
              </a>
              <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>

</body>
</html>