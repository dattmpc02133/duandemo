<?php 
    if(isset($_POST['sub'])){
        $hinh  =$_FILES['file'];
        var_dump($hinh['name']);
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<form action="test.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="">Ảnh:</label>
      <input type="file" class="form-control-file" name="file[]" multiple>
    </div>
    <div class="button-group">
        <button type="submit" name="sub">Sub</button>
    </div>
  </form>


</body>
</html>