<?php
    require_once ("../../global.php");

    if(!isset($_SESSION['admin'])){
        header('location: ../../site/trang-chinh');
    }
    

    extract($_REQUEST);
    if(exit_param("btn-add")){
        $VIEW_NAME = "add.php";
    } else if(exit_param("btn-update")){
        $VIEW_NAME = "update.php";
    }else {
        $VIEW_NAME = "list.php";
    } 
    require "../layout.php";
?>
<script>
    document.querySelector('.loai').classList.add('active');
</script>