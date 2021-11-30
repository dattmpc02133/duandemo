<?php
    require_once ("../../global.php");
    extract($_REQUEST);
    if(exit_param("btn-add")){
        $VIEW_NAME = "add.php";
    } else if(exit_param("btn-update")){
        $VIEW_NAME = "update.php";
    }else {
        $VIEW_NAME = "list.php";
    } 
    require_once "../layout.php";  
?>

<script>
    document.querySelector('.khach-hang').classList.add('active');
</script>