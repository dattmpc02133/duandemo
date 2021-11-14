function tang_giam_so_luong(){
        var giam_so_luong = document.getElementById('giam_so_luong');
        var tang_so_luong = document.getElementById('tang_so_luong');    
        var so_luong_chi_tiet = document.getElementById('so_luong_chi_tiet')

        tang_so_luong.onclick = function(){
           so_luong_chi_tiet.value++;
           
        }
      
        giam_so_luong.onclick = function(){
            if(so_luong_chi_tiet.value == 0 || so_luong_chi_tiet.value  < 0 ){

            } else{
                so_luong_chi_tiet.value--;
            } 
          
        }
}
tang_giam_so_luong()