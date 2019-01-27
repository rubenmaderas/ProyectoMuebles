<?php
    spl_autoload_register(function($clase){
        include_once $_SERVER['DOCUMENT_ROOT'].'Examen/Pescadores/clases/'.$clase.'.php';
    });
?>