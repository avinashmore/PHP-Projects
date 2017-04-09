<?php

namespace cmpe174\hw3\views;
use cmpe174\hw3\views\elements as E;
use cmpe174\hw3\controllers as C;

require_once('View.php');

class writeSomethingView extends View
{
    public function render($data){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">			
			<link rel="stylesheet" href="../../src/styles/mainStyle.css">
			<link rel="stylesheet" href="../../src/styles/writeSomethingStyle.css">
            <title>Five Thousand Characters - Write Something</title>
        </head>
        <body>
			<h1 style="text-align: center"><a href = "../../index.php">Five Thousand Characters</a> - Write Something</h1>
            <?php
                require_once("elements/writeFilterFormElement.php");
                $filterForm = new E\writeFilterFormElement();
                $filterForm->render($data);

                /*
                require_once("elements/headingElement.php");
                $heading = new E\headingElement();
                $heading->render($data);
				
                require_once("elements/writeSomethingLinkElement.php");
                $writeSomethinglink = new E\writeSomethingLinkElement();
                $writeSomethinglink->render(null);
		
				require_once("elements/filterFormElement.php");
                $filterForm = new E\filterFormElement();
                $filterForm->render($data);
				
                require_once("elements/recentElement.php");
                $recent = new E\recentElement();
                $recent->render($data);

                require_once("elements/popularElement.php");
                $popular = new E\popularElement();
                $popular->render($data);*/
            ?>
        </body>
        </html>
        <?php
    }	
}

require_once("../controllers/writeSomethingController.php");
$writeSomethingControl = new C\writeSomethingController();
$writeSomethingControl->maincontrol();
/*
$writeSomething = new writeSomethingView();

$writeSomething->render($data);
*/