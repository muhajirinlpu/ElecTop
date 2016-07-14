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
		$do->seeAllProduct($_GET['page']);
		break;

	case 'searchProduct':
		$do->search($_GET['q']);
		break;

	case 'SeeDetail':
		$do->seeDetail($_GET['id']);
		break;

	case 'init':
		$do->initAddress("date_added","DESC",5);
		break;

	default:
		echo 'check your command again';
		break;
		
}


?>