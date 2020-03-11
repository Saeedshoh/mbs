<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon'):
?>
<!DOCTYPE html>
 	<html>
 	<head>
 	<link rel="stylesheet" type="text/css" href="/style.css">
 		<title>Хуш омадед</title>
 	</head>
 	<body>
 	<div class="wrapper">

 	<?php include 'sidebar.php'; ?>

 	<div class="content">
 		<div class="block">
 			<h1>Хуш омадед</h1>
 			<?php 
 			//Пайвастшавӣ ба база
 			include 'db.php';
 			// Ҳисоб намудани шумораи беморони бақайдгирифташуда
         	$sql = "SELECT COUNT(*) AS `patients` FROM `patients`";
         	$query = mysqli_query($db, $sql);
         	$row = mysqli_fetch_array($query);

         	// Ҳисоб намудани шумораи кормандони бақайдгирифташуда
         	$sql_1 = "SELECT COUNT(*) AS `doctors` FROM `doctors`";
         	$query_1 = mysqli_query($db, $sql_1);
         	$row_1 = mysqli_fetch_array($query_1);

 			 ?>
 			<div style="width: 50%; float: left;">
 				<p>Шумораи беморони бақайдгирифташуда: <b><?php echo $row['patients']; ?></b></p>
 			</div>
 			<div style="width: 50%; float: right;">
 				<p>Шумораи духтурони бақайдгирифташуда: <b><?php echo $row_1['doctors']; ?></b></p>
 			</div>
 		</div>
 	</div>
 	</div>
 	</body>
 	</html>
 <?php endif; ?>