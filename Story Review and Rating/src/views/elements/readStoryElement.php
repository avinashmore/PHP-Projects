<?php
namespace cmpe174\hw3\views\elements;

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
require_once('Element.php');

class readStoryElement extends Element
{
    public function render($story){
    }
	public function renderReadAStory($story){
     ?> 
		<div style="text-align: center">
			<table>			
				<tr>
					<th class="col-xs-2">Author</th>
					<td class="col-xs-4"><?php echo($story[3]) ?></td>
					<th class="col-xs-2">Date/Time</th>
					<td class="col-xs-4"><?php echo($story[2]) ?></td>
				</tr>
				<tr>
					<th class="col-xs-2">Your Rating</th>
					<td class="col-xs-4" >
						<?php
		 					if (isset($_SESSION['ratings'])){
									if(array_key_exists($story[0],$_SESSION['ratings'])){
										$user_rating = $_SESSION['ratings'][$story[0]];
										for($i =1; $i<=5 ; $i++){
											if($i == $user_rating){
												echo("<span class = 'userRating'> $i </span>");
											}else{
												echo("<span > $i </span>");
											}
										}
									
									}else{
										 echo("<a href ='./?story_id=".$story[0]."&rating=1' class='rate'> 1 </a>");
										 echo("<a href ='./?story_id=".$story[0]."&rating=2' class='rate'> 2 </a>");
										 echo("<a href ='./?story_id=".$story[0]."&rating=3' class='rate'> 3 </a>");
										 echo("<a href ='./?story_id=".$story[0]."&rating=4' class='rate'> 4 </a>");
										 echo("<a href ='./?story_id=".$story[0]."&rating=5' class='rate'> 5 </a>");
									}
							}else{
										 echo("<a href ='./?story_id=".$story[0]."&rating=1' class='rate'> 1 </a>");
										 echo("<a href ='./?story_id=".$story[0]."&rating=2' class='rate'> 2 </a>");
										 echo("<a href ='./?story_id=".$story[0]."&rating=3' class='rate'> 3 </a>");
										 echo("<a href ='./?story_id=".$story[0]."&rating=4' class='rate'> 4 </a>");
										 echo("<a href ='./?story_id=".$story[0]."&rating=5' class='rate'> 5 </a>");
							}
		 					
						?>
					</td>
					<th class="col-xs-2">Average Rating</th>
					<?php 			
						if ($story[6]==0){
						   echo("<td class='col-xs-4'>0 rating</td>");
						}else{
							$avg = $story[7]/$story[6];
							echo("<td class='col-xs-4'>$avg</td>");
						}
					?>
				</tr>
				<tr>
					<th class="col-xs-12" colspan="4">Contents</th>
				</tr>
				<tr>
					<td class="col-xs-12" colspan="4">
						<?php 
		 					echo($story[5]);
						?>
					</td>
				</tr>
			</table>
		</div>	

		<?php
			if(isset($_POST['rate'])) {
			$Add = "UPDATE STORY SET NUM_OF_RATINGS_SO_FAR = NUM_OF_RATINGS_SO_FAR + 1";
			$AddRate = mysql_query($Add,$link);
			$_SESSION['addRate'] = $AddRate;
		}
		?>

	<?php
    }
}
