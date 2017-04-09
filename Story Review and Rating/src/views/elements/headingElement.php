<?php
namespace cmpe174\hw3\views\elements;

require_once('Element.php');

class headingElement extends Element
{
    public function render($datas){
        ?><h1 style="text-align: center">Five Thousand Characters</h1>
	<?php
    }
	public function renderReadAStory($title){
        echo("<h1><a href = '../../../index.php'>Five Thousand Characters</a> - $title </h1>");
	
    }
}
