<?php

include_once "Controllers/Controller.php";

class HomeController extends Controller
{
    public function GenerateMenu() {
        $menuItems = $this->model->menu();
        return $menuItems;
    }
}