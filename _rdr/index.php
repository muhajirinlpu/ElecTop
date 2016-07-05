<!DOCTYPE html>
<html>
<head>
	<title>ElecTop</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/jquery.bxslider.css">
</head>
<body>

	<?php 
	
		session_start();
		$loggedin = false;

		if (isset($_SESSION['id_user'])) {
			$loggedin = true;
		}

		switch ($_GET['p']) {
			case 'home':
				require_once '../view/hmpg.php';
				break;
			
			default:
				header("location:?p=home");
				break;
		}

	?>

	<script type="text/javascript">
		<?php 
			if ($loggedin) {
				echo "var user =".$_SESSION['id_user']." ;";		
			}else{
				echo "var user = NaN ;";		
			}
		?>
	</script>
	<script type="text/javascript" src="../assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>
