<?php
include_once "Controllers/HomeController.php";

include_once "Views/View.php";
include_once "Templates/layouts/layout.php";


class HomeView extends View
{
    public function output()
    {
        var_dump($this->controller->GenerateMenu());
        $data = "hoi";
        include_once "Templates/HomeTemplate.php";
    }
}
?>

