<?php

namespace cmpe174\hw3\models;

require_once("Model.php");

class GetListModel extends Model
{
    public function getHighestRated(){
        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',(s.SUM_OF_RATINGS/s.NUM_OF_RATINGS) AS 'AVG' FROM story s LEFT JOIN STORY_GENRE g ON g.STORY_IDENTIFIER = s.IDENTIFIER GROUP BY TITLE ORDER BY AVG DESC, ID DESC LIMIT 10";

        $result=mysqli_query($con,$query);

        return $result;
    }
	
	public function getHighestRatedWithFilter($phrase,$genre){
        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);
		
		if($phrase!=null && ($genre == 0 || $genre === null )){
		
        	$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',(s.SUM_OF_RATINGS/s.NUM_OF_RATINGS) AS 'AVG' FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE TITLE LIKE '%$phrase%' GROUP BY TITLE ORDER BY AVG DESC, ID DESC LIMIT 10";
		}else if($phrase!=null && $genre != 0 && $genre !== null ){
			$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',(s.SUM_OF_RATINGS/s.NUM_OF_RATINGS) AS 'AVG' FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE TITLE LIKE '%$phrase%' AND g.GENRE_ID ='$genre' GROUP BY TITLE ORDER BY AVG DESC, ID DESC LIMIT 10";	
		}else if($phrase==null && $genre != 0 && $genre !== null){
			$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',(s.SUM_OF_RATINGS/s.NUM_OF_RATINGS) AS 'AVG' FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE g.GENRE_ID ='$genre' GROUP BY TITLE ORDER BY AVG DESC, ID DESC LIMIT 10";
		}else {
			 $query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',(s.SUM_OF_RATINGS/s.NUM_OF_RATINGS) AS 'AVG' FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER GROUP BY TITLE ORDER BY AVG DESC, ID DESC LIMIT 10";
		}

        $result=mysqli_query($con,$query);

        return $result;
    }
	
 	public function getMostViewed(){
        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.VIEWS FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER GROUP BY TITLE ORDER BY VIEWS DESC, ID DESC LIMIT 10";

        $result=mysqli_query($con,$query);

        return $result;
    }
	 public function getMostViewedWithFilter($phrase,$genre){
        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);
		 
		 
		if($phrase!=null && ($genre == 0 || $genre === null )){
			$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.VIEWS FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE TITLE LIKE '%$phrase%' GROUP BY TITLE ORDER BY VIEWS DESC, ID DESC LIMIT 10";
				
		}else if($phrase!=null && $genre != 0 && $genre !== null ){
			
			 $query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.VIEWS FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE TITLE LIKE '%$phrase%' AND g.GENRE_ID ='$genre' GROUP BY TITLE ORDER BY VIEWS DESC, ID DESC LIMIT 10";
				 
		}else if($phrase==null && $genre != 0 && $genre !== null){
			
			$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.VIEWS FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE g.GENRE_ID ='$genre' GROUP BY TITLE ORDER BY VIEWS DESC, ID DESC LIMIT 10";
		}else {
			 $query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.VIEWS FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER GROUP BY TITLE ORDER BY VIEWS DESC, ID DESC LIMIT 10";
		}

        $result=mysqli_query($con,$query);

        return $result;
    }
	
 	public function getNewest(){
        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.SUBMISSION_DATE FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER GROUP BY TITLE ORDER BY SUBMISSION_DATE DESC, ID DESC LIMIT 10";

        $result=mysqli_query($con,$query);

        return $result;
    }
	
 	public function getNewestWithFilter($phrase,$genre){
        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);


		
		if($phrase!=null && ($genre == 0 || $genre === null )){
			
			$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.SUBMISSION_DATE FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE TITLE LIKE '%$phrase%' GROUP BY TITLE ORDER BY SUBMISSION_DATE DESC, ID DESC LIMIT 10";
				
		}else if($phrase!=null && $genre != 0 && $genre !== null ){
			
			$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.SUBMISSION_DATE FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE TITLE LIKE '%$phrase%' AND g.GENRE_ID ='$genre' GROUP BY TITLE ORDER BY SUBMISSION_DATE DESC, ID DESC LIMIT 10";
		}else if($phrase==null && $genre != 0 && $genre !== null){
			
			$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.SUBMISSION_DATE FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER WHERE g.GENRE_ID ='$genre' GROUP BY TITLE ORDER BY SUBMISSION_DATE DESC, ID DESC LIMIT 10";
		}else {
			$query="SELECT s.IDENTIFIER, s.TITLE AS 'TITLE',s.SUBMISSION_DATE FROM story s LEFT JOIN STORY_GENRE g ON g.story_IDENTIFIER = s.IDENTIFIER GROUP BY TITLE ORDER BY SUBMISSION_DATE DESC, ID DESC LIMIT 10";
		}

        $result=mysqli_query($con,$query);

        return $result;
    }
}
