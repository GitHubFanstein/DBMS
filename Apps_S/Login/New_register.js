var form_register= document.getElementsByClassName("form-register")[0];

var btn_login = form_register.getElementsByClassName("btn-login");

for(var i = 0; i < btn_login.length; i++){
    btn_login[i].addEventListener("click", function(e){
        var form_register = document.getElementsByClassName("form-register")[0];
        var frame_register = form_register.getElementsByClassName("frame-register")[0];
        var form = document.getElementsByClassName("uhuy")[0];
        var frame_login = form.getElementsByClassName("frame-login")[0];
        var  field_username = form.getElementsByClassName("isi-username-login")[0];

        frame_register.style.visibility = "hidden";
        frame_register.style.transition ="0s";
        frame_login.style.visibility = "visible";
        frame_login.style.transition = "0.5s";
        frame_register.style.width = "300px";
        frame_login.style.width = "400px";
        field_username.value = "";
        e.preventDefault();
    })
}

var register_btn = form_register.getElementsByClassName("button-regis-kuy")[0];



