<?php 

require_once '../../php/classes/userClass.php';

$do = new User();

switch ($_GET['do']) {
	case 'register':
		
		break;
	
	case 'completeProfile':
		
		break;

	case 'login':
		
		break;

	case 'buy':
		
		break;

	case 'updateProfile':
		# code...
		break;

	default:
		echo 'check your command again';
		break;

}

?>