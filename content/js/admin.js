


function toggle_menu_admin(){
    var toggle  = document.querySelector('#toggle-icon');
    var aside = document.querySelector('#aside');
    toggle.onclick = function(){
        aside.classList.add('active')
    }
}
// function on_menu_admin(){
//     var on_menu_admin = document.querySelector('#on_menu_admin');
//     var aside = document.querySelector('#aside');
//     on_menu_admin.onclick = function(){
//         aside.classList.remove('active')
//     }
// }
document.onkeydown = function(e){
    var aside = document.querySelector('#aside');
    if(e.which == 27){
       
        aside.classList.remove('active')
    }
}
function on_account(){
    var account_manage_lish = document.querySelector('#account_manage-lish');
    var account_manage_ten = document.querySelector('#account_manage-ten')
    var accountHight = account_manage_lish.clientHeight;
    account_manage_ten.onclick = function(){
        account_manage_lish.classList.toggle('active');

        // var isClose = account_manage_lish.clientHeight === accountHight;
        // if (isClose) {
        //     account_manage_lish.style.height = 'auto';
        //     account_manage_lish.style.transition = 'all 0.5s';
        // } else {
        //     account_manage_lish.style.height = null;
        //     account_manage_lish.style.transition = 'all 0.5s';
        // }
    }


}



// on_menu_admin();
toggle_menu_admin();
on_account();


