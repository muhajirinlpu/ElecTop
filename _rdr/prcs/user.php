<?php 

require_once '../../php/classes/userClass.php';

$do = new User();

switch ($_GET['do']) {
	case 'register':
		
		break;
	
	case 'completeProfile':
		
		break;

	case 'login':
		$do->login($_POST['username'],$_POST['password']);
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