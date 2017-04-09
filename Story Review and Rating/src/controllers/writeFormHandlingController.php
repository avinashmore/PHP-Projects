<?php

namespace cmpe174\hw3\controllers;

use cmpe174\hw3 as H;

require_once("Controller.php");

class writeFormHandlingController extends Controller
{
    public function maincontrol()
    {
        $writingErr = "";
		$writing = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (strlen($_POST["writing"])>5000) {
					echo "<script>alert('Maximum character allowed for the contents is 5000');window.location.href='../views/writeSomethingView.php';</script>";
						
			  }
		}
        if(!empty($_POST)){
            if(!empty($_POST['identifier'])){
                require_once('../../src/models/GetStoryModel.php');
                $getStoryData = new H\models\GetStoryModel();
                $count = $getStoryData->getIdentifierCount($_POST['identifier']);
                $countArr = array();
                while($row=mysqli_fetch_array($count))
                    {
                        $countArr[]=$row;
                    }
                if ($countArr[0][0]) {
                    if (empty($_POST['title']) and empty($_POST['author'])) {
                        //already there is an entry for identifier and title and author both are empty,
                        //therefore just fecth the data corresponding to it and populate the form
                        //1. only id field filled -> id exist -> retrieve data -> update
                           $row_count = 0; 
                           $formFillUpData= $getStoryData-> formFillUpDetails($_POST['identifier']);
                           $formArr = array();
                           while($row=mysqli_fetch_array($formFillUpData))
                            {
                                $formArr[]=$row;
                                $row_count=$row_count+1;
                            }
                            $identifier = $formArr[0][0]; 
                            $title = $formArr[0][1]; 
                            $author= $formArr[0][2]; 
                            $content = $formArr[0][3];
                            $genreArr = [];
                            $i =0; 
                            while ($row_count > 0) {
                               $genreArr[$i] = $formArr[$i][4]; 
                               $row_count= $row_count - 1; 
                               $i = $i+1;
                            }
                            require_once('../models/GetGenreModel.php');
                            $genredata = new H\models\GetGenreModel();
                            $data=$genredata->getDataWriteSomething();
                            $allGenreArr=array();
                            while($row=mysqli_fetch_array($data))
                            {
                                 $allGenreArr[]=$row;
                             }
                            require_once('../../src/views/elements/writeFilterFormElement.php');
                            $renderNewdata = new H\views\elements\writeFilterFormElement();
                            $renderNewdata-> renderUpdate($identifier,$title,$author,$content,$allGenreArr,$genreArr);
                    }
                    else if (!empty($_POST['title']) and !empty($_POST['author'])) {
                        // 3. other field filled -> id exist -> update
                        //already there is an entry for identifier but title and author both are not empty,
                        //therefore update those things
                        echo $_POST['identifier'];
                        echo $_POST['title'];
                        echo $_POST['author'];
                        echo $_POST['writing'];
						if (is_array($_POST['genres']) || is_object($_POST['genres']))
						{	
							foreach ($_POST['genres'] as $selectedOption){
								echo ($selectedOption);
							}
						}
						
						require_once('../../src/models/GetStoryModel.php');
						$storeStoryData = new H\models\GetStoryModel();
						$storeStoryData-> updateAStory($_POST['identifier'],$_POST['title'], $_POST['author'],$_POST['writing'], $_POST['genres']);
						
						echo "<script>alert('ID already exsists! Successfully Updated the Story');window.location.href='../views/writeSomethingView.php';</script>";
						
                        //header("Location: ../views/elements/writeFilterFormElement.php");
                        //exit;                       
                       
                    }

                }
                else{
                    //there is no entry for identfier, but title and author are also not empty, so enter the data in DB  
                    // 4. other field filled -> id does not exist -> create
                      if( !empty($_POST['title']) and !empty($_POST['author'])){
                        echo "Enter data in DB";
                        echo $_POST['identifier'];
                        echo $_POST['title'];
                        echo $_POST['author'];
                        echo $_POST['writing'];
						if (is_array($_POST['genres']) || is_object($_POST['genres']))
						{	
							foreach ($_POST['genres'] as $selectedOption){
								echo ($selectedOption);
							}
						}			  
                        require_once('../../src/models/GetStoryModel.php');
                        $storeStoryData = new H\models\GetStoryModel();
                        $storeStoryData-> createAStory($_POST['identifier'],$_POST['title'], $_POST['author'],$_POST['writing'], $_POST['genres']);
                        //header("Location: ../views/elements/writeFilterFormElement.php");
						echo "<script>alert('Successfully Uploaded the Story');window.location.href='../views/writeSomethingView.php';</script>";
						
                        exit;
                    }
                    else {
                        //2. only id field filled -> id does not exist -> alert
						echo "<script>alert('ID does not exist');window.location.href='../views/writeSomethingView.php';</script>";
                    }


                }

            }
            else {
                 echo "Identifier is empty";
            }
            
        }
        else{
            echo ("post is empty!");
        }
    } 
}

$filterControl = new writeFormHandlingController();
$filterControl->maincontrol();

?>