var btndashoard = document.getElementsByClassName("dashbtn")[0];

btndashoard.addEventListener("click", function(){
    var btnupload = document.getElementsByClassName("btnupload")[0];
    var btnmanage = document.getElementsByClassName("btnmanagementaset")[0];
    var btnsampah = document.getElementsByClassName("btnsampah")[0];
    var btnhsshare = document.getElementsByClassName("btnhistorishare")[0];

    document.title = "Dashboard";

    btnsampah.classList.remove("active");
    btnhsshare.classList.remove("active");
    btnmanage.classList.remove("active");
    btndashoard.classList.add("active");
    btnupload.classList.remove("active");

    var framedashboard = document.getElementById("frame-1");
    var frameupload = document.getElementById("frame-2");
    var framemanage = document.getElementById("frame-3");
    var framesampah = document.getElementById("frame-4");
    var framehistorishare = document.getElementById("frame-5");
    framedashboard.style.visibility = "visible";
    frameupload.style.visibility = "hidden";
    framemanage.style.visibility = "hidden";
    framesampah.style.visibility = "hidden";
    framehistorishare.style.visibility = "hidden";
})