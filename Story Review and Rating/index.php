<?php

namespace cmpe174\hw3;

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

use cmpe174\hw3\controllers as C;

if (isset($_SESSION['phrase_filter']) || isset($_SESSION['genre']) && ($_SESSION['phrase_filter']!=null && $_SESSION['genre']!=null)) {
    require_once("./src/controllers/filteredController.php");
    $main = new C\filteredController();
    $main->maincontrolFilter($_SESSION['phrase_filter'],$_SESSION['genre']);
} else {
    require_once("./src/controllers/defaultController.php");
    $main = new C\defaultController();
    $main->maincontrol();
}


