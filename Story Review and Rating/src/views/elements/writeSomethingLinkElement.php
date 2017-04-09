<?php

namespace cmpe174\hw3\views\elements;

require_once('Element.php');
class writeSomethingLinkElement extends Element
{
    public function render($data){
        ?>
			<a href = "./src/views/writeSomethingView.php">Write Something!</a>
			<p>Check out what people are writing...</p>
        <?php
    }
}
