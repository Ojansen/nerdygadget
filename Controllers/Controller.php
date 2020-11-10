<?php

include_once "Models/Model.php";

class Controller
{
    public $model;
    public function __construct($model){
        $this->model = $model;
    }
}