var pareent_pembungkus = document.getElementsByClassName("section_masukan_data")[0];
var inputfile = document.getElementById("nama-file");
var inputfile_word = document.getElementById("nama-filee");
var validasi_ekstension = () => {

    var pathfile = inputfile.value;
    
    var ekstensiFile = /(.pdf)/;

   if (!ekstensiFile.exec(pathfile)){
        alert('Silakan upload file yang memiliki ekstensi .pdf');
        inputfile.value = '';
        return false;
   }
}

var validasi_ekstension_exe = () => {

     var pathfile = inputfile.value;
     
     var ekstensiFile = /(.exe)/;
 
    if (!ekstensiFile.exec(pathfile)){
         alert('Silakan upload file yang memiliki ekstensi .exe');
         inputfile.value = ' ';
         return false;
    }
 }

 var validasi_ekstension_word = () => {

     var pathfile = inputfile_word.value;
     
     var ekstensiFile = /(.docx)/;
 
    if (!ekstensiFile.exec(pathfile)){
         alert('Silakan upload file yang memiliki ekstensi .docx');
         inputfile_word.value = ' ';
         return false;
    }
 }
 
 