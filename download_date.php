<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon')
	{
?>
<!DOCTYPE html>
 	<html>
 	<head>
 	<link rel="stylesheet" type="text/css" href="/style.css">
 		<title>Гузориш аз рӯи санаҳо</title>
 	</head>
 	<body>
 	<div class="wrapper">

  <?php include 'sidebar.php'; ?>

 	<div class="content">
 	
      <form action="download_date_pdf.php" method="post" target="_blank">
      
        <h1>Санаҳоро интихоб намоед</h1>
          <label><span style="text-align: left;">Аз санаи:</span><span style=" margin-left:43%; text-align: right;">То санаи:</span></label>
          <input type="date" id="password_u" name="start_date"><input type="date" id="password_u" name="end_date" required="" >
          <input type="submit" class="button" name="submit" value="Ҷустуҷӯ намудан">
      </form>
<?php 
echo "
 	</div>
 	</div>
 	</body>
 	</html>";
	}
 ?>