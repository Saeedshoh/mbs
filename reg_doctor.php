<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon') : ?>
<!DOCTYPE html>
 	<html>
 	<head>
 	<link rel="stylesheet" type="text/css" href="/style.css">
 		<title>Илова намудани духтур</title>
 	</head>
 	<body>
 	<div class="wrapper">

  <?php include 'sidebar.php'; ?>
 	<div class="content">
 	
      <form action="save_doctor.php" method="post" enctype="multipart/form-data">
      
        <h1>Илова намудани духтур</h1>
           <label>Ном ва насаб(ФИО):</label>
           <input type="text" id="name" name="last_name" required="" placeholder="Насаб"><input type="text" id="name" name="name" required="" placeholder="Ном"> <input type="text" id="name" name="phamiliya" required="" placeholder="Номи падар">
          <label>Шуъба:</label>
          <select name="departament">
            <option value="1">Отдел - 1</option>
            <option value="2">Отдел - 2</option>
            <option value="3">Отдел - 3</option>
            <option value="4">Отдел - 4</option>
            <option value="5">Отдел - 5</option>
            <option value="6">Отдел - 6</option>
            <option value="7">Отдел - 7</option>
            <option value="8">Отдел - 8</option>
            <option value="9">Отдел - 9</option>
          </select>
          <label>Вазифа:</label>
         <input type="text" name="position" required="" placeholder="Номи вазифа">
          <label>Логин и рамз:</label>
           <input type="text" id="name" name="login" required="" placeholder="Логин"><input type="password" id="name" name="password_1" required="" placeholder="Рамз"> <input type="password" id="name" name="password_2" required="" placeholder="Тасдиқи рамз">
           <label>E-mail:</label>
         <input type="text" name="e_mail" required="" placeholder="example@example.ru">
          <label>Суроғаи истиқомат:</label>
          <input type="text" name="address" required="">
          <label>Телефони мобилӣ:</label>
          <input type="text" name="m_number" required="" placeholder="907700500">
           <label>Акси духтур(ихтиёрӣ):</label>
           <input type="file" name="fupload">
          <input type="submit" class="button" value="Илова намудани духтур">
      </form>
 	</div>
 	</div>
 	</body>
 	</html>
<?php endif; ?>