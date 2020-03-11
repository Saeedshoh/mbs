<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon') : ?>
<!DOCTYPE html>
 	<html>
 	<head>
 	<link rel="stylesheet" type="text/css" href="/style.css">
 		<title>Бақайдгирии бемор</title>
 	</head>
 	<body>
 	<div class="wrapper">

  <?php include 'sidebar.php'; ?>
 	<div class="content">
 	
      <form action="save_patient.php" method="post">
      
        <h1>Бақайдгирии бемор</h1>
          <label>Рамзи бемор:</label>
          <input type="text" name="code" required="" placeholder="*****">
          
          <label>Ном ва насаб(ФИО):</label>
           <input type="text" id="name" name="last_name" required="" placeholder="Насаб"><input type="text" id="name" name="name" required="" placeholder="Ном"> <input type="text" id="name" name="partonymic" required="" placeholder="Номи падар">
          
          <label><span style="text-align: left;">Рӯзи таваллуд:</span><span style=" margin-left:41%; text-align: right;">Рақами телефон:</span></label>
          <input type="date" id="password_u" name="birthday"><input type="text" id="password_u" name="m_number" required="" placeholder="123456789">
          <label>Ҷинс:</label>
          <select name="pol">
          	<option value="men">Мард</option>
          	<option value="women">Зан</option>
          </select>
          <label>Суроға:</label>
          <input type="text" name="address" required="" placeholder="Душанбе, проспект Негмата Карабоева 48/12 кв 12">
          <label>Ҷои кор ( таҳсил ):</label>
          <input type="text" name="job" required="" placeholder="">
          <label>Духтур:</label>
          <select name="doctor">
          <?php 
          include 'db.php';
           $sql = "SELECT * FROM doctors";
           $query = mysqli_query($db, $sql);
           while ($row = mysqli_fetch_assoc($query)) {
              echo "<option value='".$row['id']."'>".$row['last_name']." ".$row['name']." ".$row['phamiliya']."</option>";
            }
            ?>
            </select>
          <input type="submit" class="button" value="Илова намудан">
      </form>
 	</div>
 	</div>
 	</body>
 	</html>
<?php endif; ?>