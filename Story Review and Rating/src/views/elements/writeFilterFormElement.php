<?php
namespace cmpe174\hw3\views\elements;

require_once('Element.php');

class writeFilterFormElement extends Element
{
    public function render($datas){
        ?> 
		<div class="form-container">
			<form action = "../controllers/writeFormHandlingController.php" method="post">
				<label for="TitleID">Title</label>
				<input type="text" name="title" id="TitleID" value=""><br/>
				<label for="AuthorID">Author</label>
				<input type="text" name="author" id="AuthorID" value=""><br/>
				<label for="IdentifierID">Identifier</label>
				<input type="text" name="identifier" id="IdentifierID" value=""><br><br>
				<label for="GenreID">Genre</label><br/>
				<select name="genres[]" id="GenreID" multiple>
						<?php foreach($datas as $data) { 
						  echo "<option value='$data[0]'>$data[1]</option>";
						} 
						?>
				</select><br/>
				<label for="WritingID">Your Writing</label><br/>
				<textarea rows="4" cols="50" name="writing" id= "WritingID" placeholder="Enter text here..."></textarea><br><br>
				<div class = "buttons">
					<input type="reset" value="Reset"/>
					<input type="submit" value="Save"/>
				</div>

			</form>
		</div>


<?php
    }
    public function renderUpdate($identfier,$title,$author,$content,$allGenreArr,$genreArr){
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
    	<div class="form-container">
			<form action = "../controllers/writeFormHandlingController.php" method="post">
				<label for="TitleID">Title</label>
				<input type="text" name="title" id="TitleID" value="<?php echo ($title); ?>"><br/>
				<label for="AuthorID">Author</label>
				<input type="text" name="author" id="AuthorID" value="<?php echo ($author); ?>"><br/>
				<label for="IdentifierID">Identifier</label>
				<input type="text" name="identifier" id="IdentifierID" value="<?php echo ($identfier); ?>"><br><br>
				<label for="GenreID">Genre</label><br/>
				<?php 
				$selected_genre = $genreArr;
				?>
				<select name="genres[]" id="GenreID" multiple="multiple">
						<?php foreach($allGenreArr as $data) { 
						  if(in_array($data[0], $selected_genre)){
							  echo "<option value='$data[0]' selected>$data[1]</option>";
						  }
						  else echo "<option value='$data[0]'>$data[1]</option>";
						} 
						?>

				</select><br/>			
				<label for="WritingID">Your Writing</label><br/>
				<textarea rows="4" cols="50" name="writing" id= "WritingID" placeholder="Enter text here..." ><?php echo ($content); ?></textarea><br><br>
				<div class = "buttons">
					<input type="reset" value="Reset"/>
					<input type="submit" value="Save"/>
				</div>
			</form>
		</div>
		</body>
        </html>

<?php



    }

}
?>
