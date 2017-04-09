<?php

function initializeDB()
{
    $config = require("config.php");

    $con = mysqli_connect($config['host'], $config['username'], $config['password']);


    $stmt = mysqli_prepare($con, 'DROP DATABASE IF EXISTS Hw3DB');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE DATABASE Hw3DB;' );
    mysqli_stmt_execute($stmt);

    mysqli_select_db($con,"Hw3DB");
    

	# CREATE GENRE Table
    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS GENRE;');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE TABLE GENRE
        (ID INT AUTO_INCREMENT,
        GENRE VARCHAR(45) NOT NULL,
        PRIMARY KEY (ID));');
    mysqli_stmt_execute($stmt);




	
	# CREATE STORY Table
    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS STORY;' );
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE TABLE STORY
        ( IDENTIFIER varchar(45) NOT NULL,
        TITLE varchar(45) NOT NULL,
        SUBMISSION_DATE timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        AUTHOR varchar(45) NOT NULL,
        VIEWS int(18) NOT NULL DEFAULT 0,
		CONTENTS varchar(5000) NOT NULL,
        NUM_OF_RATINGS int(45) NOT NULL DEFAULT 0,
        SUM_OF_RATINGS int(45) NOT NULL DEFAULT 0,
        PRIMARY KEY (IDENTIFIER));');
    mysqli_stmt_execute($stmt);
	
	
	# CREATE STORY_GENRE Table
    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS STORY_GENRE;' );
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE TABLE STORY_GENRE
        (ID INT AUTO_INCREMENT,
        STORY_IDENTIFIER VARCHAR(45) NOT NULL,
        GENRE_ID int(18) NOT NULL,
        PRIMARY KEY (ID),
        FOREIGN KEY(GENRE_ID) REFERENCES GENRE(ID),
        FOREIGN KEY(STORY_IDENTIFIER) REFERENCES STORY(IDENTIFIER)
        );');
    mysqli_stmt_execute($stmt);

	
	#Dumping data for table `GENRE`
    $stmt = mysqli_prepare($con,'INSERT INTO GENRE
        Values(NULL, "Crime"),
        (NULL, "Science fiction"),
        (NULL, "Satire"),
        (NULL, "Drama");');
    mysqli_stmt_execute($stmt);

	#Dumping data for table `STORY`
    $stmt = mysqli_prepare($con,'INSERT INTO STORY
        Values("CutePuppies","Cute Puppies", "2016-10-14", "Avinash More", 30, "CutePuppiesContent", 30, 90),
        ( "LoveStory","Love Story", "2016-10-15", "Avinash More", 10, "LoveStoryContent", 5, 20),
        ( "CSI","CSI", "2016-10-16", "Avinash More",  0, "CSIContent",0, 0),
        ( "SFStory","SF Story", "2016-10-16", "Avinash More",  20,"SFStoryContent", 10, 20),
        ( "SadStory","Sad Story", "2016-10-18", "Avinash More", 5, "SadStoryContent",  1, 2),
        ( "Crime2","Crime 2", "2016-10-19", "Avinash More", 10, "Crime2Content",  1, 5),
        ("Drama3","Drama 3", "2016-10-19", "Avinash More", 14, "Drama3Content",  1, 4),
        ( "Sciencefiction4","Science fiction 4", "2016-10-20", 18, "Avinash More","Sciencefiction4Content",  1, 3),
        ( "Sciencefiction2","Science fiction 2", "2016-10-21", 20, "Avinash More","Sciencefiction2Content",  1, 2),
        ( "Sciencefiction3","Science fiction 3", "2016-10-22", 90, "Avinash More","Sciencefiction3Content",  1, 5),
        ( "Crime4", "Crime 4", "2016-10-23", "Avinash More", 0,"Crime4Content",  1, 2),
        ( "Satire1","Satire 1", "2016-10-24", "Avinash More",13, "Satire1Content",  1, 4),
        ( "Drama1","Drama 1", "2016-10-25", "Avinash More",12, "Drama1Content",  1, 3),
        ( "Drama2","Drama 2", "2016-10-26", "Avinash More", 1, "Drama2Content", 1, 2),
        ( "Crime3","Crime 3", "2016-10-27", "Avinash More", 2,"Crime3Content",  1, 2);');
    mysqli_stmt_execute($stmt);

	#Dumping data for table `STORY_GENRE`
    $stmt = mysqli_prepare($con,'INSERT INTO STORY_GENRE
		Values(NULL, "CutePuppies", 4),
		(NULL, "LoveStory", 4),
		(NULL, "CSI", 1),
		(NULL, "SFStory", 2),
		(NULL, "SadStory", 2),
		(NULL, "Crime2", 4),
		(NULL, "Drama3", 1),
		(NULL, "Sciencefiction4", 4),
		(NULL, "Sciencefiction2", 2),
		(NULL, "Sciencefiction3", 2),
		(NULL, "Crime4", 2),
		(NULL, "Satire1", 1),
		(NULL, "Drama1", 3),
		(NULL, "Drama2", 4),
		(NULL, "Crime3", 4),
		(NULL, "Crime3", 1);');
    mysqli_stmt_execute($stmt);

    

    $stmt->close();
    $con->close();

    echo ("Database Successfully Initialized. Be sure to change check mysql login is correct.");
}

initializeDB();
