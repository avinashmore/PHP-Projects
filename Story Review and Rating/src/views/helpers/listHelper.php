<?php

namespace cmpe174\hw3\views\helpers;

require_once("Helper.php");

class listHelper 
{
	public function render($datas) {
?>
		<ol>
			<?php foreach($datas as $data) { 
			  echo "<a  href ='#'>Title: $data[1], $data[2]</a></br>";
			}?>
		</ol>
<?php
	}
	
	public function renderWithType($datas,$type){
?>
		<ol>
			<?php foreach($datas as $data) { 
			  echo "<li><a href ='src/views/readAStoryView.php/?story_id=".$data[0]."'>Title: $data[1], $type:$data[2]</a></br></li>";
			}?>
		</ol>
<?php
	}
	
	
} 
?>