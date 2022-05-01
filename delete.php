<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
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
            $name = $price ="" ;
            $conn =new mysqli('localhost', 'root' , '' , 'cosmetic');
            if(isset($_POST['btnChoose'])) {
                  $id = $_POST['cosmetic'];
                  $sql = "SELECT * FROM product WHERE cid = $id";
                  $cosmetic = $conn->query($sql) ;
                  if($cosmetic->num_rows > 0) {
                        while($row = $cosmetic->fetch_assoc()) {
                              $name = $row['cname'] ;
                              $price =$row['price'] ;
                              $photo = $row['photo'];
                              $id= $row['cid'];
                        }
                  }   
            }
            
            if(isset($_POST['btnDelete'])) {
                  $id = $_POST['id'];
                  $sql = "DELETE FROM product WHERE cid=$id";
                  if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                      } else {
                        echo "Error deleting record: " . $conn->error;
                  }
                  
            }
            $conn->close();

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
            <div class="container mt-5">
            <div class="row col-5" style="align-items: center;margin-left: 200px;">
                <div class="card">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mt-2" style="align-items: center;align-content: center;">
                      <label for=""> ID : </label>
                      <select name="cosmetic">
                      <?php 
                        $conn =new mysqli('localhost', 'root' , '' , 'cosmetic');
                        $sql = "SELECT * FROM product";
                        $cosmetic = $conn->query($sql) ;
                        if ($cosmetic->num_rows > 0) :
                          // output data of each row
                          while($row = $cosmetic->fetch_assoc()):?>
                          <option value="<?php echo $row['cid']; ?>"><?php echo $row['cid']; ?></option>
                        <?php endwhile ?>
                        <?php endif ?>  
                      </select>
                      <input type="submit" name="btnChoose" value="Choose" class="btn mt-2 mx-3" style="text-align: center;background-color: #FB928E;">
                    </div>
                    
                  <!-- </form>

                  <form action="" method="POST"> -->
                  <div class="mt-2">
                        <div class="div">
                              <img src="uploads/<?php echo $photo; ?>"
                                class="rounded-circle ms-5">
                        </div>
                  <div class="mt-2" style="align-items: center;align-content: center;">
                                <label for="">ID:</label>
                                <input type="number" name="id" class="form-control" value="<?php echo $id; ?>" >
                              </div>
                              <div class="mt-2" style="align-items: center;align-content: center;">
                                  <label for=""> Name : </label>
                                  <input type="text" class="form-control" name="name"  value="<?php echo $name; ?>" disabled>
                                  <!-- <small class="text-warning"><?php echo $errorName; ?></small> -->
                                </div>
                              <div class="mt-2" style="align-items: center;align-content: center;">
                                  <label for=""> Price : </label>
                                  <input type="number" class="form-control" name="price" value="<?php echo $price; ?>">
                                  <!-- <small class="text-warning"><?php echo $errorPrice; ?></small> -->
                                </div>
                                <div class="mt-2 mb-3">
                                  <input type="submit" name="btnDelete" value="Delete" class="btn mt-2 mb-3" style="text-align: center;background-color: #FB928E;">
                                </div>
                          </div>
                  </form>
                </div>
            </div>
      </div>
      </body>
      </html>
</body>
</html>