<?php

namespace cmpe174\hw3\controllers;

include('Controller.php');

use cmpe174\hw3 as H;



class filteredController extends Controller
{
    function __construct()
    {

    }

    public function maincontrol()
    {
	}
	
	public function maincontrolFilter($phrase,$genre){
        require_once('./src/views/landingView.php');
        $mainRender = new H\views\landingView();
		
        require_once('./src/models/GetGenreModel.php');
        $genredata = new H\models\GetGenreModel();
        $data=$genredata->getData();
        $genreArr=array();
        while($row=mysqli_fetch_array($data))
        {
            $genreArr[]=$row;
        }
		
		require_once('./src/models/GetListModel.php');
		
        $storydata = new H\models\GetListModel();
        $highestRated=$storydata->getHighestRatedWithFilter($phrase,$genre);
        $highestRatedArr=array();
        while($row=mysqli_fetch_array($highestRated))
        {
            $highestRatedArr[]=$row;
        }
		
        $mostViewed=$storydata->getMostViewedWithFilter($phrase,$genre);
        $mostViewedArr=array();
        while($row=mysqli_fetch_array($mostViewed))
        {
            $mostViewedArr[]=$row;
        }
		
		$newest=$storydata->getNewestWithFilter($phrase,$genre);
        $newestArr=array();
        while($row=mysqli_fetch_array($newest))
        {
            $newestArr[]=$row;
        }

		
        $mainRender->renderLandingView($genreArr,$highestRatedArr,$mostViewedArr,$newestArr);
    
	}
}
