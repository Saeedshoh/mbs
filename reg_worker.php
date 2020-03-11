<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon') : ?>
<!DOCTYPE html>
 	<html>
 	<head>
 	<link rel="stylesheet" type="text/css" href="/style.css">
 		<title>Илова намудани корманд</title>
 	</head>
 	<body>
 	<div class="wrapper">

  <?php include 'sidebar.php'; ?>
 	<div class="content">
 	
      <form action="save_worker.php" method="post" enctype="multipart/form-data">
      
        <h1>Илова намудани корманд</h1>
          <label>Ном ва насаб(ФИО):</label>
          <input type="text" name="name" required="" placeholder="Ном ва насаби корманд">
          <label>Шуъба:</label>
          <input type="text" name="otdel" required="" placeholder="Номи шуъба">
          <label>Вазифа:</label>
          <input type="text" name="position" required="" placeholder="Номи вазифа">
          <label>Суроғаи истиқомат:</label>
          <input type="text" name="address" required="" placeholder="Дар куҷо зиндагӣ мекунад">
          <label>Телефони мобилӣ:</label>
          <input type="text" name="m_number" required="" placeholder="Рақамҳои дастӣ">
          <label>Акси корманд(ихтиёрӣ):</label>
          <input type="file" name="fupload">
          <input type="submit" class="button" value="Илова намудани корманд">
      </form>
 	</div>
 	</div>
 	</body>
 	</html>
<?php endif; ?>