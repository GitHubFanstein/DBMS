<?php 

function getfile($file_name){
    return pathinfo($file_name, PATHINFO_EXTENSION);
};

?>