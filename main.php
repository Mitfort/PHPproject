<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForumVerse</title>
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
  <main role="main">

        <?php
          include("header.html");
        ?>
  
<!-- <section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">ForumVerse</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
      <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </p>
  </div>
</section> -->

<div class="album py-5 bg-light">
  <div class="container">

    <div class="row">
        <?php

          $connection = mysqli_connect("localhost","root","","phpprojekcik");

          if(!$connection){
            echo "NIE MA DANCYH";
            exit();
          }

          $query = "SELECT articleID,userID,title,content,createdAt,first_name,last_name,email,login FROM `articles` JOIN users ON articles.creatorID = users.userID ORDER BY createdAt DESC";

          $res = mysqli_query($connection,$query);

          if($res){

            while($row = mysqli_fetch_assoc($res)){

              ?>
                <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                    <div style="width: 100%; height: 100px ; display: flex; align-items: center; justify-content: center; background-color: bisque;">
                      <?php echo $row['title']?>
                    </div>
                    <!-- <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=<?php echo $row['title']?>" alt="123 [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18bc8cc2658%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18bc8cc2658%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;"> -->
                    <div class="card-body">
                      <p class="card-text"><?php echo "Author : {$row['first_name']}  {$row['last_name']}"?></p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="articleView.php?id=<?php echo $row['articleID'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                        </div>
                        <small class="text-muted"><?php echo $row['createdAt'] ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }

          }

        ?>
      
    </div>
  </div>
</div>

</main>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>