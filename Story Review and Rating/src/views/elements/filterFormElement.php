<?php
namespace cmpe174\hw3\views\elements;

require_once('Element.php');

class filterFormElement extends Element
{
    public function render($datas){
        ?>
		<div class = "form-container">
			<form name="Filterform" id="Filterform" action="src/controllers/filterController.php" method="post">
				<input type= "text" name = "phrase_filter" placeholder = "Phrase Filter" />
				<select name="genres">
						<option value="0">All Genres</option>
						<?php foreach($datas as $data) { 
						  echo "<option value='$data[0]'>$data[1]</option>";
						} 
						?>
				</select>
				<input type="submit" value="GO"/>
			</form>
		</div>


<?php
    }
}
