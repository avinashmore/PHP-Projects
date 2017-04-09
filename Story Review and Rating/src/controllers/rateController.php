<?php


namespace cmpe174\hw3\controllers;

use cmpe174\hw3 as H;

require_once("Controller.php");

class rateController extends Controller{

    public function maincontrol()
    {
    }
	public function maincontrolRate($story_id,$rating)
    {
		
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		require_once('../models/GetStoryModel.php');
        $storydata = new H\models\GetStoryModel();
        $storydata->updateRating($story_id,$rating);
		
		$_SESSION['ratings'][$story_id] = $rating;
    }
}
