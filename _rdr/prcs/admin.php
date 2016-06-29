<?php  

require_once '../../php/classes/admnClass.php';

$do = new admn();

switch ($_GET['do']) {
	case 'login':
		$do->login($_POST['username'],$_POST['password'],$_POST['passver']);
		break;

	case 'addBarang':
		$do->addBarang($_SESSION['id_admin'],$_POST['merk'],$_POST['type'],$_POST['spoiler'],$_POST['harga'],$_POST['stok']);
		break;

	case 'checkNotif':
		$do->NotifyMe();
		break;

	case 'seeAllOrder':
		$do->seeAllOrder();
		break;

	case 'responseOrder':
		$do->responseOrder($_POST['id']);
		break;

	case 'changeProfile':
		# code...
		break;
	
	default:
		echo 'check your command again';
		break;
}

?>