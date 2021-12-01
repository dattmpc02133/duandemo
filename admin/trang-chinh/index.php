<?php 
require_once("../../DAO/pdo.php");
require_once("../../global.php");
require_once("../../DAO/khach-hang.php");


if(isset($_SESSION['admin'])){
    $VIEW_NAME = "trang-chinh/home.php";
}
else {
    header('location: ../../site/trang-chinh');
}
require("../layout.php");

?>
<script>
    document.querySelector('.trang-chu').classList.add('active');
</script>