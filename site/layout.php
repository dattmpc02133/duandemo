<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/chi-tiet-san-pham.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/font/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!--repónive css-->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/responsive.css">
</head>

<body>
    <div class="containermax-width">
        <section class="headerrr">
            <?php require_once("../trang-chinh/header.php")  ?>
        </section>
        <div id="hidden__something">
            <!-- slide -->

            <!-- end slide -->
            <!-- main -->
            <main class="main" id="main" style="padding-top: 10px;">
                <?php require_once $VIEW_NAME ?>
            </main>
            <section class="fooooooter">
                <?php require_once("../trang-chinh/footer.php") ?>
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="<?= $CONTENT_URL ?>/js/app.js"></script>
   
</body>

</html>