<?php  

require_once '../php/classes/hmpgClass.php';

$do = new Hmpg();

switch ($_GET['do']) {

	case 'getNewProduct':
		# code...
		break;

	case 'getTopProduct':
		# code...
		break;

	case 'getLastviewProduct':
		# code...
		break;

	case 'searchProduct':
		# code...
		break;

	default:
		echo 'check your command again';
		break;
}


?>