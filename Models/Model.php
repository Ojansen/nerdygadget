<?php

include "connect.php";

class Model
{
    public $Connection;
    function  __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Set MySQLi to throw exceptions
        try {
            $this->Connection = mysqli_connect("localhost", "root", "", "nerdygadgets");
            mysqli_set_charset($this->Connection, 'latin1');
            $DatabaseAvailable = true;
        } catch (mysqli_sql_exception $e) {
            $DatabaseAvailable = false;
        }
        if (!$DatabaseAvailable) {
            ?><h2>Website wordt op dit moment onderhouden.</h2><?php
            die();
        } else {
            return $this->Connection;
        }
    }

    protected function getAll($Query) {
        $Statement = mysqli_prepare($this->Connection, $Query);
        mysqli_stmt_execute($Statement);
        $Result = mysqli_stmt_get_result($Statement);
        $All = mysqli_fetch_all($Result);
        return $All;
    }

    protected function getOne($Query, $id) {
        $Statement = mysqli_prepare($this->Connection, $Query);
        mysqli_stmt_bind_param($Statement, "i", $id);
        mysqli_stmt_execute($Statement);
        $ReturnableResult = mysqli_stmt_get_result($Statement);
        if ($ReturnableResult && mysqli_num_rows($ReturnableResult) == 1) {
            $Result = mysqli_fetch_all($ReturnableResult, MYSQLI_ASSOC)[0];
        } else {
            $Result = null;
        }
        return $Result;
    }
}