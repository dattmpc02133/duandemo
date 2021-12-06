const app = {
    hien_thi_gio_hang(){
        var cart_click = document.getElementById('cart');
        // console.log(cart_click);
        var cart_on = document.getElementById("header_cart-list");
        cart_click.onclick = function(){
            var account_on = document.getElementById('header-dropdown_content');
            cart_on.classList.toggle('active');
            account_on.classList.remove('active')
        }
    },
    hidden_something(){
        var hidden__something = document.getElementById('hidden__something');
        hidden__something.onclick = function(){
            var account_on = document.getElementById('header-dropdown_content');
            var cart_on = document.getElementById("header_cart-list");
            account_on.classList.remove('active');
            cart_on.classList.remove('active');
            
        }

    },
    hien_thi_account(){
        var dang_nhap = document.querySelector("#dang_nhap")
        if(dang_nhap){
            var account_click = document.getElementById('dang_nhap');
            var account_on = document.getElementById('header-dropdown_content');
            account_click.onclick = function(e){
                var cart_on = document.getElementById("header_cart-list");
                account_on.classList.toggle('active');
                cart_on.classList.remove('active');
                e.stopPropagation();
            }
        }    
    },
    
    start(){
        this.hien_thi_account();
        this.hien_thi_gio_hang()
        this.hidden_something()
    }
}
app.start();