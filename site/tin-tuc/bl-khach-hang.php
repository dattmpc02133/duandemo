<h5 class="comment_news">
    Bình Luận
</h5>
<hr>
<div class="comment_news-wrap">
    <div class="row comment_news-container" id="output__data_bl">
        <!-- <div class="col-1 user_comment">
            <img src="../../content/images/user/z2975563806417_87be175912960c0cbea56f10736a3cab.jpg" alt="" class="user_comment-img">
        </div>
        <div class="col-11 content_comment-moment">
            <p class="full_comment">
                <span class="user-tex">
                    <b>Đạt G:</b>
                </span>
                Sự hài hước của QBV... đã tăng lên cấp số nhân theo từng năm. VĐ Copa mà 5 năm tổ chức 4 lần ( thua cả cái AFF cúp ao làng nhà ta 2 năm tổ chức 1 lần )
                và ở cấp CLB thì chả ra sao vậy Jorginho vđ C1 và UEFA mà thua với bé làng nhàng mà có QBV. Do đâu, do về độ hot và không thu hút được tiền và fan rồi,
                chung quy là tiền giải thưởng chỉ là hình thức thôi. Fifa còn có phốt đầy ra nên những giải thưởng như thế này cũng là bình thường. Cười ra nước mắt hhhh
            </p>
            <p class="block_like-comment">
                <a class="classnutdive" href=""><i class="fas fa-thumbs-up"></i> Like</a>
                <a class="classnutdive" href="">Trả lời</a>
                <a class="classnutdive" href="">Chia sẻ</a>
                <span class="time-com" style="color:#757575;font-size: 13px;">1 phút trước</span>
            </p>
        </div> -->
    </div>
</div>

<script type="text/javascript">
    // lấy dữ liệu
     function fetch_data($ma_tin_tuc){
        
        $.ajax({
              url:'ajax_action.php',
              method: "POST",
              data:{
                ma_tin_tuc:ma_tin_tuc
              },
              success: function(respone){
                //   alert(respone)
              $('#output__data_bl').html(respone);           
              }
          })
      }
      var ma_tin_tuc = $('.ma_tin_tuc').val();
    
      setInterval(() => {
        fetch_data(ma_tin_tuc);
      }, 2000);
</script>

