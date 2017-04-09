<?php

namespace cmpe174\hw3\views;
use cmpe174\hw3\views\elements as E;

require_once('View.php');

class landingView extends View
{
	public function render($data){
	}
    public function renderLandingView($genre,$highestRated,$mostViewedArr,$newestArr){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">		
			<link rel="stylesheet" href="src/styles/mainStyle.css">
			<link rel="stylesheet" href="src/styles/landingStyle.css">
            <title>Five Thousand Characters</title>
        </head>
        <body>
            <?php
                require_once("elements/headingElement.php");
                $heading = new E\headingElement();
                $heading->render(null);
				
                require_once("elements/writeSomethingLinkElement.php");
                $writeSomethinglink = new E\writeSomethingLinkElement();
                $writeSomethinglink->render(null);
		
				require_once("elements/filterFormElement.php");
                $filterForm = new E\filterFormElement();
                $filterForm->render($genre);
		
                require_once("elements/rateElement.php");
                $rate = new E\rateElement();
				$type = "AVG Rating";
                $rate->render($highestRated);		
				
				require_once("elements/mostViewedElement.php");
                $mostViewed = new E\mostViewedElement();
                $mostViewed->render($mostViewedArr);

                require_once("elements/newestElement.php");
                $newest = new E\newestElement();
                $newest->render($newestArr);

            ?>
        </body>
        </html>
        <?php
    }
}
