<?php

namespace cmpe174\hw3\models;

require_once("Model.php");

class GetStoryModel extends Model
{
    public function getAStoryById($id){
        $config = include("../configs/config.php");       $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $query="SELECT * FROM STORY WHERE STORY.IDENTIFIER = '$id'";

        $result=mysqli_query($con,$query);

        return $result;
    }
	
	 public function getContents($id){
        $config = include("../configs/config.php");
		$con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $query="SELECT CONTENTS FROM STORY Join STORY_CONTENTS ON STORY.IDENTIFIER = STORY_CONTENTS.STORY_IDENTIFIER WHERE STORY.IDENTIFIER = '$id' ORDER BY ID";

        $result=mysqli_query($con,$query);

        return $result;
    }

    public function getIdentifierCount($identifier){
        $config = include("../configs/config.php");
        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);
        $query="SELECT count(*) from STORY where identifier= '$identifier'";
        $result=mysqli_query($con,$query);
        
        return $result;
    }
    public function formFillUpDetails($identifier){
        $config = include("../configs/config.php");
        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);
        $query="SELECT S.IDENTIFIER, S.TITLE, S.AUTHOR, S.CONTENTS,SG.GENRE_ID FROM STORY S, STORY_GENRE SG WHERE S.IDENTIFIER = SG.STORY_IDENTIFIER and S.IDENTIFIER ='$identifier'";
        $result=mysqli_query($con,$query);
        
        return $result;
    }

    public function updateAStory($identifier,$title, $author, $writing, $genres ){
        $config = include("../configs/config.php");
        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);
		
        $query="UPDATE story SET author = '$author', title = '$title', contents = '$writing' WHERE identifier = '$identifier';";
		$query .= " DELETE FROM story_genre WHERE story_identifier = '$identifier';";
		
		foreach($genres as $genre){
			$query .= " INSERT INTO story_genre (STORY_IDENTIFIER, GENRE_ID) VALUES ('$identifier', $genre);";
		}				
		$result = $con->multi_query($query);
		if ($result === TRUE) {
			echo "Records updated successfully";
		} else {
			echo "Error: " . $query . "<br>" . $con->error;
		}
        
        return $result;
    }
	
	public function createAStory ($identifier,$title, $author, $writing, $genres ){
        $config = include("../configs/config.php");
        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);
        $query=" INSERT INTO STORY (AUTHOR, IDENTIFIER, TITLE, CONTENTS) VALUES ('$author','$identifier', '$title','$writing');";
		foreach($genres as $genre){
			$query .= " INSERT INTO story_genre (STORY_IDENTIFIER, GENRE_ID) VALUES ('$identifier', $genre);";
		}	
		
        $result = $con->multi_query($query);
		if ($result === TRUE) {
			echo "Records updated successfully";
		} else {
			echo "Error: " . $query . "<br>" . $con->error;
		}
		
        return $result;
    }
	
	public function updateRating($story_id,$rating){
        $config = include("../configs/config.php");
        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);
        $query="UPDATE STORY SET STORY.NUM_OF_RATINGS = STORY.NUM_OF_RATINGS + 1, STORY.SUM_OF_RATINGS = STORY.SUM_OF_RATINGS + $rating WHERE STORY.IDENTIFIER = '$story_id'";
        $result=mysqli_query($con,$query);
        
        return $result;
    }
}
