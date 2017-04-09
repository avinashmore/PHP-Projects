<?php

namespace cmpe174\hw3\controllers;

use cmpe174\hw3 as H;

require_once("Controller.php");

class ReadAStoryController extends Controller
{
    public function maincontrol()
    {
    }
	public function maincontrolReadAStory($story_id)
    {
		require_once('../views/readAStoryView.php');
        $readAStoryRender = new H\views\readAStoryView();
		
		require_once('../models/GetStoryModel.php');
        $storydata = new H\models\GetStoryModel();
        $data=$storydata->getAStoryById($story_id);
        $storyArr=array();
        while($row=mysqli_fetch_array($data))
        {
            $storyArr[]=$row;
        }
		
        $readAStoryRender->renderReadAStory($storyArr);
    }
}
