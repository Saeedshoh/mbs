<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login)  and $s_login == 'admin' or $s_login == 'mehrubon'):
		$id = $_GET['id'];

         include 'db.php';
         $sql = "SELECT * FROM patients WHERE id='$id'";
        $query = mysqli_query($db, $sql);
        $myrow = mysqli_fetch_array($query);
  ?>
<!DOCTYPE html>
 	<html>
 	<head>
 	<link rel="stylesheet" type="text/css" href="/style.css">
 		<title>Таҳрир намудани варақаи бемор</title>
 	</head>
 	<body>
 	<div class="wrapper">

    <?php include 'sidebar.php'; ?>

 	<div class="content">
 	
      <form action='update_patient.php?id=<?=$myrow['id']?>' method="post">
      
        <h1>Таҳрир намудани варақаи бемор</h1>
          <label>Рамзи бемор:</label>
          <input type="text" name="code" required="" value="<?=$myrow['code'];?>">
          
          <label>Ном ва насаб(ФИО):</label>
           <input type="text" id="name" name="last_name" required="" value="<?=$myrow['last_name'];?>"><input type="text" id="name" name="name" required=""  value="<?=$myrow['name'];?>""> <input type="text" id="name" name="partonymic"  value="<?=$myrow['partonymic'];?>">
          
          <label><span style="text-align: left;">Рӯзи таваллуд:</span><span style=" margin-left:41%; text-align: right;">Рақами телефон:</span></label>
          <input type="date" id="password_u" name="birthday"  value="<?=$myrow['birthday'];?>"><input type="text" id="password_u" name="m_number" required=""  value="<?=$myrow['number'];?>">
          <label>Ҷинс:</label>
          <select name="pol">
          	<option value="men">Мард</option>
          	<option value="women">Зан</option>
          </select>
          <label>Суроға:</label>
          <input type="text" name="address" required=""  value="<?=$myrow['address'];?>">
          <label>Ҷои кор ( таҳсил ):</label>
          <input type="text" name="job" required="" placeholder=""  value="<?=$myrow['job'];?>">
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
          <input type="submit" class="button" value="Таҳрир намудан">
      </form>
 	</div>
 	</div>
 	</body>
 	</html>
 <?php endif; ?>