<?php
include_once "Controllers/ArtikelController.php";

include_once "Views/View.php";
include_once "Templates/layouts/layout.php";


class ArtikelView extends View
{
    public function output()
    {
//        $this->controller->GenerateMenu();
        var_dump($this->controller->Artikel());
        $Results = ["hoi", $_GET];
        include_once "Templates/ArtikelTemplate.php";
    }
}

