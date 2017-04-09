<?php

namespace cmpe174\hw3\controllers;

use cmpe174\hw3 as H;

require_once("Controller.php");

class FilterController extends Controller
{
    public function maincontrol()
    {
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
        if(!empty($_POST)){
            $data[0]=filter_input(INPUT_POST,'phrase_filter',FILTER_SANITIZE_STRING);//sanitize string here
			
            $data[1]=$_POST['genres'];//sanitize string here
			
            $_SESSION['phrase_filter']=$data[0];
            $_SESSION['genre']=$data[1];
            header("Location: ../../index.php");
			exit;
		}

    }
}

$filterControl = new FilterController();
$filterControl->maincontrol();
