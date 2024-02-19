var cobabtntes = document.getElementsByClassName("btnupload");

for(var i = 0; i < cobabtntes.length; i++){
    cobabtntes[i].addEventListener("click", function(){
      var btndashoard = document.getElementsByClassName("dashbtn")[0];
      var btnupload = document.getElementsByClassName("btnupload")[0];
      var btnmanage = document.getElementsByClassName("btnmanagementaset")[0];
      var btnsampah = document.getElementsByClassName("btnsampah")[0];
      var btnhsshare = document.getElementsByClassName("btnhistorishare")[0];

      document.title = "Upload";

      btnsampah.classList.remove("active");
      btnmanage.classList.remove("active");
      btndashoard.classList.remove("active");
      btnhsshare.classList.remove("aactive");
      btnupload.classList.add("active");

      var framedashboard = document.getElementById("frame-1");
      var frameupload = document.getElementById("frame-2");
      var framemanage = document.getElementById("frame-3");
      var framesampah = document.getElementById("frame-4");
      var framehistorishare = document.getElementById("frame-5");
      framedashboard.style.visibility = "hidden";
      frameupload.style.visibility = "visible";
      frameupload.style.marginTop = "-100px";
      frameupload.style.marginBottom = "100px";
      framemanage.style.visibility = "hidden";
      framesampah.style.visibility = "hidden";
      framehistorishare.style.visibility = "hidden";
    })
}