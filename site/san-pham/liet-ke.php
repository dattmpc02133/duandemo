<?php

require_once("../../DAO/pdo.php");
require_once("../../DAO/san-pham.php");
require_once("../../DAO/loai.php");
require_once("../../global.php");
require_once("../../DAO/cart.php");
extract($_REQUEST);
if (exit_param("ma_loai")) {
    $products = san_pham_select_by_loai($ma_loai);
} elseif (exit_param("search")) {
    $products = san_pham_select_by_keyword($search);
} else {
    $products =  san_pham_selectall();
}
$VIEW_NAME = "liet-ke-ui.php";
require("../layout.php");
?>
<script>
    function hover_img(){
        var img_mains = document.querySelectorAll(".hinh_chinh");
        var img_mouseover = document.querySelectorAll(".img_onmouseover")
        var img_onmouseout = document.querySelectorAll(".onmouseout");
        img_mains.forEach(function(img_main,index){
            img_main.onmouseover = function(){
                
                img_main.src = img_mouseover[index].src;
            }
            img_main.onmouseout = function(){
                img_main.src = img_onmouseout[index].src;
            }
        })
       
    }
    hover_img();
</script>