var form_login = document.getElementsByClassName("uhuy")[0];

var btn_register = form_login.getElementsByClassName("btn-register");

for(var i = 0; i < btn_register.length; i++){
    btn_register[i].addEventListener("click", function(e){
       
       var form_register = document.getElementsByClassName("form-register")[0];
       var frame_register = form_register.getElementsByClassName("frame-register")[0];
       var form = document.getElementsByClassName("uhuy")[0];
       var frame_login = form.getElementsByClassName("frame-login")[0];
       var  field_username = form.getElementsByClassName("isi-username-login")[0];

       frame_register.style.visibility = "visible";
       frame_register.style.transition ="0.5s";
       frame_login.style.visibility = "hidden";
       frame_login.style.transition = "0s";
       frame_register.style.width = "400px";
       frame_login.style.width = "300px";
       field_username.value = "";
       e.preventDefault();
    })
}
