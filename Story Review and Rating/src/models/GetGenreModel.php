<?php

namespace cmpe174\hw3\models;

require_once("Model.php");

class GetGenreModel extends Model
{
    public function getData(){
        $config = include("./src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $query='SELECT * FROM GENRE';

        $result=mysqli_query($con,$query);

        return $result;
    }
	 public function getDataWriteSomething(){
		$config = include("../../src/configs/config.php");

        $con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database']);

        $query='SELECT * FROM GENRE';

        $result=mysqli_query($con,$query);

        return $result;
    }
}
