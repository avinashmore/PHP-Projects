<?php

namespace cmpe174\hw3\controllers;

include('Controller.php');

use cmpe174\hw3 as H;



class writeSomethingController extends Controller
{
    function __construct()
    {

    }

    public function maincontrol()
    {
        require_once('../views/writeSomethingView.php');
        $mainRender = new H\views\writeSomethingView();
		
        require_once('../models/GetGenreModel.php');
        $genredata = new H\models\GetGenreModel();
        $data=$genredata->getDataWriteSomething();
        $arr=array();
        while($row=mysqli_fetch_array($data))
        {
            $arr[]=$row;
        }
        
        $mainRender->render($arr);
    }
}
