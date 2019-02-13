<?php
// Config


spl_autoload_register(function($class_name){
    $fileName ="./models/DAO/".$class_name.".php";
    if(file_exists($fileName)){
        require_once($fileName);
    }
});
?>