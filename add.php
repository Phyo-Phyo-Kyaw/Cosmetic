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
    $errorName = $errorType = $errorPhoto = $errorPrice = $errorBrand ="" ;
    $conn =new mysqli('localhost', 'root' , '' , 'cosmetic');
    
  if(isset($_POST['btnRegister'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $photo = $_FILES['photo']['name'];
    $price = $_POST['price'];
    $brand = $_POST['brand'] ;
    $target_file = 'uploads/' .$photo;
    if(move_uploaded_file($_FILES['photo']['tmp_name'] , $target_file)) {
      move_uploaded_file($_FILES['photo']['tmp_name'] , $target_file) ;
    }
    if($name == null || $name == "" || empty($name)) {
      $errorName = "Please fill name field";
    }
    if($type == null || $type == "" || empty($type)) {
      $errorType = "Please fill type field";
    }
    if($photo == null || $photo == "" || empty($photo)) {
      $errorPhoto = "Please fill photo field";
    }
    if($price == null || $price == "" || empty($price)) {
      $errorPrice = "Please fill price field";
    }
    if($brand == null || $brand == "" || empty($brand)) {
      $errorBrand = "Please fill brand field";
    }

    if($name != '' && $type != '' && $photo!= '' && $price != '' && $brand != '') {
      $insertData = "INSERT INTO product (cname , ctype , photo ,price , brand) 
                      VALUES ('$name' , '$type' , '$photo' , '$price' , '$brand') ";
      if ($conn->query($insertData) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
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
                <label for=""> Name : </label>
                <input type="text" class="form-control" name="name">
                <small class="text-warning"><?php echo $errorName; ?></small>
              </div>
              <div class="mt-2" style="align-items: center;align-content: center;">
                <label for=""> Type : </label>
                <input type="text" class="form-control" name="type">
                <small class="text-warning"><?php echo $errorType; ?></small>
              </div>
              <div class="mt-2" style="align-items: center;align-content: center;">
                <label for=""> Photo : </label>
                <input type="file" class="form-control" name="photo">
                <small class="text-warning"><?php echo $errorPhoto; ?></small>
              </div>
              <div class="mt-2" style="align-items: center;align-content: center;">
                <label for=""> Price : </label>
                <input type="number" class="form-control" name="price">
                <small class="text-warning"><?php echo $errorPrice; ?></small>
              </div>
              <div class="mt-2" style="align-items: center;align-content: center;">
                <label for=""> Brand : </label>
                <input type="text" class="form-control" name="brand">
                <small class="text-warning"><?php echo $errorBrand; ?></small>
              </div>
              <div class="mt-2 mb-3">
                <input type="submit" name="btnRegister" value="Add" class="btn mt-2 mb-3 btn-lg" style="text-align: center;background-color: #FB928E;">
                <!-- <input type="submit" value="Cancel" class="float-end"> -->
              </div>
            </form>
          </div>
      </div>
</div>
</body>
</html>