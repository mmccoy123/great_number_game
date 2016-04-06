<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="great_number_game.css">
	<title>Great Number Game</title>
</head>
<body>
	<?php

	// Start the session
	session_start();

	if (isset($_POST['guessed_number'])) {}
	
	else {
	$_POST['guessed_number'] = NULL;
	}

	// Generate random number for user to guess

	if (isset($_SESSION["random_number"])) {}
	
	else {
	$_SESSION["random_number"] = rand( 1, 100);
	}

	?>
	<div id="container">
		<h1>Welcome to the Great Number Game!</h1>
		<p>I am thinking of a number between 1 and 100</p>
		<p>Take a guess!</p>
		<?php  
			if(isset($_POST['submit'])) {
				if ($_POST['guessed_number'] < $_SESSION["random_number"]){
					echo "<div class='wrong_response'>Too low!</div>";
				}
				elseif ($_POST['guessed_number'] > $_SESSION["random_number"]){
					echo "<div class='wrong_response'>Too high!</div>";
				}
				elseif ($_POST['guessed_number'] == $_SESSION["random_number"]){
					echo "<div class='correct_response'>" . $_SESSION['random_number'] . " was the number!";
					echo "<form name='reset_page' action='' method='post'><input type='submit' name='playagain' value='Play again!'></submit></form></div>";
				}
				else {
					echo "<div class='response_box'>Try entering an actual number this time!</div>";
				}

			}

		?>
		<!-- Hide this form if user guesses the number correctly -->
		<?php if ((int)$_POST['guessed_number'] != $_SESSION['random_number']) { ?>
		<form id="number_guess" method="post" action="">
			<!-- Only allow input of numbers from 1 to 100 -->
			<input type="number" name="guessed_number" min="1" max="100"></input>
			<br>
			<input type="submit" value="Submit" name="submit" id="submit"></input>
		</form>
		<?php } 
			// Delete the random number so a new one will be set when the page reloads
			else unset($_SESSION["random_number"]);
		?>
	</div>
</body>
</html>