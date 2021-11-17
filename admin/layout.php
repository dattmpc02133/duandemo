<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Quản Lý </title>
    <link rel="stylesheet" href="../content/css/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/font/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->

 

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
        <!--repónive css-->
        <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/admin.css">
</head>
<body>
        <div class="aside_and_article">
            <div class="aside" id= "aside">
                <div class="row">
                <aside class="col-sm-12 aside_content" id= "aside_content">
                     <?php require_once ("aside.php") ?>
                </aside>
                </div>
            </div>
            <div class="article">
                <div class="row">
                    <article class="col-12" id= "main_admin">
                    <?php require_once $VIEW_NAME; ?>
                    </article>
                </div>
            </div>
         </div>
    <script src="<?= $CONTENT_URL ?>/js/admin.js"></script>
    <footer>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>

</html>