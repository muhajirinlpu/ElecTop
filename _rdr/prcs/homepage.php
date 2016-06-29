<?php  

require_once '../../php/classes/hmpgClass.php';

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

	case 'getAllProduct':
		if (isset($_GET['p'])) $p = $_GET['p'];
		else $p = 1;
		$do->seeAllProduct($p);
		break;

	case 'searchProduct':
		$do->search($_GET['q']);
		break;

	case 'SeeDetail':
		$do->seeDetail($_GET['id']);
		break;

	default:
		echo 'check your command again';
		break;
		
}


?>