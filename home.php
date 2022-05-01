<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"
  rel="stylesheet"
/></head>
<style>
  .card {
    background-color: #FFB8BF;
  }
</style>
<body>
  <?php
    $conn =new mysqli('localhost', 'root' , '' , 'cosmetic');
    
  ?>

      <div class="card mb-2">
      <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link" href="home.php"  style="color: black;">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="add.php"  style="color: black;">Add Item</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="update.php"  style="color: black;">Update Item</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="delete.php"  style="color: black;">Delete Item</a>
                    </li>
            </ul>
      </div>
      <div class="container">
      <div class="row m-3">
      <?php 
      $conn =new mysqli('localhost', 'root' , '' , 'cosmetic');
      $sql = "SELECT * FROM product";
      $cosmetic = $conn->query($sql) ;
      if ($cosmetic->num_rows > 0) :
        // output data of each row
        while($row = $cosmetic->fetch_assoc()):?>
            <div class="col-4 my-5">
            <div class="card" style="width: 18rem;">
                    <!-- <img src="{{asset('uploads/' .$row['photo'])}}" ; -->
                    <img src="uploads/<?php echo $row['photo']; ?>"
                     style="height: 200px;"
                    class="card-img-top">
                    <div class="card-body text-center">
                      <h4 class="card-text"><?php echo $row['cname']?></h4>
                      <h5 class="card-text"><?php echo $row['brand']?></h5>
                      <p class="card-text"><?php echo $row['ctype']?></p>
                      <p class="card-text"><?php echo $row['price']?>kyats</p>
                    </div>
                    <!-- <div class="my-3">
                      <a href="update.php" id="<?php echo $row['cid']; ?>"><button class="btn bg-dark ms-2">edit</button></a>
                    </div> -->
                  </div>
            </div>
      <?php endwhile ?>
      <?php endif ?>
      <?php $conn->close(); ?>
      </div>
</div>
</body>
</html>