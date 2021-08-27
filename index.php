<?php
	/*
		Name: get-random-joke.php
		Description: Returns a single random joke in JSON format
		Author: Dancin Feldman
		Last Modified: 4/6/2020
	*/
	// Send HTTP headers
	// https://www.php.net/manual/en/function.header.php
	// DO THIS **BEFORE** you `echo()` the content!
	header('content-type:application/json');      // tell the requestor that this is JSON
	header("Access-Control-Allow-Origin: *");     // turn on CORS
	header("X-this-330-service-is-kinda-lame: true");   // a custom header - by convention they begin with 'X'
	header("X-author-name: Ava");
	header("X-program-used: Git");
	
	// $jokes contains our data
	// this is an indexed array of associative arrays
	// the associative arrays are jokes -  they have an 'q' key and an 'a' key
	$jokes = [
		["q"=>"What do you call a very small valentine?","a"=>"A valen-tiny!"],
		["q"=>"What did the dog say when he rubbed his tail on the sandpaper?","a"=>"Ruff, Ruff!"],
		["q"=>"Why don't sharks like to eat clowns?","a"=>"Because they taste funny!"],
		["q"=>"What did the fish say when be bumped his head?","a"=>"Dam!"],
		["q"=>"Why did the drunk walk into the bar?","a"=>"He couldn't see it coming!"],
		["q"=>"What's worse than a stick in the eye?", "a"=>"A stick in each eye."],
		["q"=>"I keep trying to lose weight.", "a"=>"It keeps finding me."],
		["q"=>"I know a guy who's really good at Russian Roulette...", "a"=>"He's only lost once!"],
		["q"=>"What do you get a man with no elbows?", "a"=>"Elbows."],
		["q"=>"What is a duck's favorite drug?", "a"=>"Quack cocaine!"],
		["q"=>"What do you call a boomerang that doesn't come back?", "a"=>"A stick."],
		["q"=>"I don't usually like cooking with fresh herbs...", "a"=>"But this thyme... It's different."],
		["q"=>"Do you wanna hear a knock-knock joke?", "a"=>"Two guys walk into a bar."],
		["q"=>"I tried to kill a spider with soap?", "a"=>"He got away clean."],
		["q"=>"What do you call a time traveling bounty hunter?", "a"=>"A ManDelorean!"],
		["q"=>"What's red and bad for your teeth?", "a"=>"A brick."],
		["q"=>"What do you call a belt made of watches?", "a"=>"A waist of time!"],
		["q"=>"What's the best way to carve wood?", "a"=>"Whittle by whittle!"],
		["q"=>"Why was 6 afraid of 7?", "a"=>"Because 7 was a registered 6 offender!"]
	];
	
	$limit = 2; // the default
	if(array_key_exists('limit', $_GET)){
		$limit = $_GET['limit'];
		$limit = (int)$limit; // explicitly cast value to an integer
		if ($limit < 2){
			$limit = 2;
		} else if ($limit > count($jokes)) {
			$limit = count($jokes);
		}
	}
	
	$randomJokes = [];

	$randomKeys = array_rand($jokes, $limit);
	for ($i = 0; $i < count($randomKeys); $i++) {
		array_push($randomJokes, $jokes[$randomKeys[$i]]);
	}
	
	$string = json_encode($randomJokes);
	echo $string;

	// Debugging - comment all these `echo()` statements out after you verify that everything works
	// print the first joke
	//echo $jokes[0]["q"] . " " . $jokes[0]["a"]; 
	// print a blank line
	//echo "\n\n"; 
	// print the entire array to the window
	//print_r($jokes);
	//print_r($_GET);
	//echo($_GET["limit"]);
?>
