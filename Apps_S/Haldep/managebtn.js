var btnmanage = document.getElementsByClassName("btnmanagementaset")[0];
btnmanage.addEventListener("click", function(){
    var btndashoard = document.getElementsByClassName("dashbtn")[0];
    var btnupload = document.getElementsByClassName("btnupload")[0];
    var btnsampah = document.getElementsByClassName("btnsampah")[0];
    var btnhsshare = document.getElementsByClassName("btnhistorishare")[0];

    document.title = "Management Asset";

    btnsampah.classList.remove("active");
    btnhsshare.classList.remove("active");
    btnmanage.classList.add("active");
    btndashoard.classList.remove("active");
    btnupload.classList.remove("active");

    var framedashboard = document.getElementById("frame-1");
    var frameupload = document.getElementById("frame-2");
    var framemanage = document.getElementById("frame-3");
    var framesampah = document.getElementById("frame-4");
    var framehistorishare = document.getElementById("frame-5");
    framedashboard.style.visibility = "hidden";
    frameupload.style.visibility = "hidden";
    framemanage.style.visibility = "visible";
    framemanage.style.marginLeft = "100px";
    framemanage.style.marginTop = "-220px";
    framemanage.style.marginBottom = "200px";
    framesampah.style.visibility = "hidden";
    framehistorishare.style.visibility = "hidden";
})