<?php  

require_once '../php/classes/hmpgClass.php';

$do = new Hmpg();

switch ($_GET['do']) {

	case 'getNewProduct':
		$do->seeNewProduct();
		break;

	case 'getTopProduct':
		$do->seeTopProduct();
		break;

	case 'getLastviewProduct':
		$do->seeLastviewProduct();
		break;

	case 'searchProduct':
		$do->search($_POST['q']);
		break;

	case 'SeeDetail':
		$do->seeDetail($_POST['id']);
		break;

	default:
		echo 'check your command again';
		break;
}


?>