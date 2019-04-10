<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/php-template/schedules.php":
			$CURRENT_PAGE = "Schedules"; 
			$PAGE_TITLE = "Schedules";
			break;
		case "/php-template/rankings.php":
			$CURRENT_PAGE = "Rankings"; 
			$PAGE_TITLE = "Rankings";
			break;
		case "/php-template/scores.php":
			$CURRENT_PAGE = "Scores"; 
			$PAGE_TITLE = "Teams";
			break;
		case "/php-template/teams.php":
			$CURRENT_PAGE = "Teams"; 
			$PAGE_TITLE = "Teams";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to my homepage!";
	}
?>