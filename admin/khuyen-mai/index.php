<?php 
    require_once '../../global.php';
    require_once '../../DAO/pdo.php';
    require_once '../../DAO/khuyen-mai.php';
    require_once '../../DAO/san-pham.php';
    require_once '../../DAO/loai.php';
    if(!isset($_SESSION['admin'])){
        header('location: ../../site/trang-chinh');
    }
    

    extract($_REQUEST);
    if(exit_param("btn_add")){
        $VIEW_NAME = 'add.php';
    }
    else if(exit_param("btn_add_ct")){
        $VIEW_NAME = 'add_ct_km.php';
    }
    else if(exit_param("btn_update")){
        $VIEW_NAME = 'update.php';
    }
    else if(exit_param("btn_detail"))
        $VIEW_NAME = 'detail.php';
    else if(exit_param("btn_list")){
        $VIEW_NAME = 'list.php';
    }
    else{
        $VIEW_NAME = 'list.php';
    }
    require_once '../layout.php';
?>
<script>
    document.querySelector('.khuyen-mai').classList.add('active');
</script>