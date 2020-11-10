<?php

include_once "Models/ArtikelModel.php";
include_once "Controllers/Controller.php";

class ArtikelController extends Controller
{
    private $ArtikelModel;
    private function __construct() {
        $this->ArtikelModel = new ArtikelModel();
    }

    public function Artikel() {
        $menuItems = $this->model->getArtikel();
        return $menuItems;
    }
}