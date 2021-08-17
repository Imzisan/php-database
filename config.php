<?php 
switch ($_SERVER['SCRIPT_NAME']) {
	case '/Final 1/login-form.php':
		// code...
	$CURRENT_PAGE ="Login";
	$PAGE_TITTLE ="Login Page";
		break;
	case '/Final 1/registration-form.php':
		// code...
	$CURRENT_PAGE ="Registration";
	$PAGE_TITTLE ="Registration Page";
		break;
		case '/Final 1/home-page.php':
		// code...
	$CURRENT_PAGE ="Home";
	$PAGE_TITTLE ="Home Page";
		break;
		

	
	default:
		// code...
		break;
}

?>