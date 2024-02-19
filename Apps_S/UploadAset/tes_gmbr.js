var inputfile2 = document.getElementById("nama-file2");
var tumbnail = document.getElementsByClassName("gmbrtum")[0];

inputfile2.addEventListener("input", function(){
    
   if(inputfile2.files.length){

        let file = inputfile2.files[0].name.split(".").pop();
        tumbnail.setAttribute("value", file + ".png");
   }

   else{
    tumbnail.setAttribute("value", " ");
   }
})