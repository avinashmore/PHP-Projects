<?php

namespace cmpe174\hw3\views;
use cmpe174\hw3\views\elements as E;
use cmpe174\hw3\controllers as C;

require_once('View.php');

class readAStoryView extends View
{
    public function render($data){
    }	
	public function renderReadAStory($data){
		$story = $data[0];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
			<link rel="stylesheet" href="../../../src/styles/mainStyle.css">
			<link rel="stylesheet" href="../../../src/styles/readAStoryStyle.css">
            <title>Five Thousand Characters - Story Title</title>
        </head>
        <body>
			<?php
            	require_once("elements/headingElement.php");
                $heading = new E\headingElement();
                $heading->renderReadAStory($story[1]);
		
				require_once("elements/readStoryElement.php");
                $readStory = new E\readStoryElement();
                $readStory->renderReadAStory($story);
		
			?>
        </body>
        </html>
        <?php
    }	
}
$story_id = $_GET['story_id'];

if(isset($_GET['rating'])&& $_GET['rating']!= null) {
	$rating = $_GET['rating'];	
	require_once("../controllers/rateController.php");
	$rateControl = new C\rateController();
	$rateControl->maincontrolRate($story_id,$rating);
}

	require_once("../controllers/readAStoryController.php");
	$readAStoryControl = new C\ReadAStoryController();
	$readAStoryControl->maincontrolReadAStory($story_id);
	



?>