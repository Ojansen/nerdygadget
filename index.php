
<?php
define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);

session_start();
include_once "router.php";

//// haal alle pagina's op uit %root%/pages/
//// die eindigen met .php
//$pages = glob(ROOT.'Views'.DIRECTORY_SEPARATOR.'*.html');
//// pak alleen de naam van het bestand
//$pageNames = array_map('basename', $pages);
//
//if ("$_SERVER[REQUEST_URI]" == "/") {
//    require ROOT . 'Views/IndexView.php';
//} elseif("$_SERVER[REQUEST_URI]" == "/artikel") {
//    require ROOT . 'Views/ArtikelView.php';
//}

