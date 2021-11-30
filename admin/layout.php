<!doctype html>
<html lang="en">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$CONTENT_URL?>/font/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="<?=$CONTENT_URL?>/css/admin_layout.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
  </head>
  <body>
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-2 left-col">
                <?php 
                    require_once '../aside.php';
                ?>
              </div>
              <div class="col-sm-10 right-col">
                  <?php 
                    require_once '../article.php';
                  ?>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
   
    <!-- cke -->
    <script src="../../content/ckeditor/ckeditor.js"></script>
    <script>
                        CKEDITOR.replace('mo_ta');
                        CKEDITOR.replace('mo_ta_tin_tuc');
                        CKEDITOR.replace('noi_dung_tin_tuc');
    </script>
   
  </body>
  


