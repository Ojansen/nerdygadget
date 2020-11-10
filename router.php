<?php
include_once "Controllers/Controller.php";
include_once "Models/Model.php";
include_once "Views/View.php";

$pages = glob(ROOT.'Models'.DIRECTORY_SEPARATOR.'*.php');
$pageNames = array_map('basename', $pages);
foreach ($pageNames as $pages) {
    include_once "Models/" . $pages;
}

$pages = glob(ROOT.'Controllers'.DIRECTORY_SEPARATOR.'*.php');
$pageNames = array_map('basename', $pages);
foreach ($pageNames as $pages) {
    include_once "Controllers/" . $pages;
}

$pages = glob(ROOT.'Views'.DIRECTORY_SEPARATOR.'*.php');
$pageNames = array_map('basename', $pages);
foreach ($pageNames as $pages) {
    include_once "Views/" . $pages;
}

//$page = empty($_GET['page']) ? 'home' : $_GET['page'];
if (!empty("$_SERVER[REQUEST_URI]")) {

    $data = array(
        '/' => array('model' => 'HomeModel', 'view' => 'HomeView', 'controller' => 'HomeController'),
        '/artikel/.*?' => array('model' => 'ArtikelModel', 'view' => 'ArtikelView', 'controller' => 'ArtikelController'),
    );

    foreach($data as $key => $components){
        if ("$_SERVER[REQUEST_URI]" == $key) {
            $model = $components['model'];
            $view = $components['view'];
            $controller = $components['controller'];
            break;
        }
    }

    if (isset($model)) {
        $m = new $model();
        $c = new $controller($m);
        $v = new $view($c, $m);
        echo $v->output();
    }
}