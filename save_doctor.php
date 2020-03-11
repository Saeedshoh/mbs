<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login)) 
  {
      if (isset($_POST['last_name'])) { $last_name = $_POST['last_name']; if ($last_name == '') unset($last_name);}
      if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') unset($name);}
      if (isset($_POST['phamiliya'])) { $phamiliya = $_POST['phamiliya']; if ($phamiliya == '') unset($phamiliya);}
      if (isset($_POST['departament'])) { $departament = $_POST['departament']; if ($departament == '') unset($departament);}
      if (isset($_POST['position'])) { $position = $_POST['position']; if ($position == '') unset($position);}
      if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') unset($login);}
      if (isset($_POST['password_1'])) { $password_1 = $_POST['password_1']; if ($password_1 == '') unset($password_1);}
      if (isset($_POST['password_2'])) { $password_2 = $_POST['password_2']; if ($password_2 == '') unset($password_2);}
      if (isset($_POST['e_mail'])) { $e_mail = $_POST['e_mail']; if ($e_mail == '') unset($e_mail);}
      if (isset($_POST['address'])) { $address = $_POST['address']; if ($address == '') unset($address);}
      if (isset($_POST['m_number'])) { $m_number = $_POST['m_number']; if ($m_number == '') unset($m_number);}

       if (empty($last_name) || empty($name) || empty($phamiliya) || empty($position) || empty($login) || empty($password_1) || empty($password_2) || empty($e_mail) || empty($address) || empty($m_number))  
      {
        echo "<script type='text/javascript'>alert('Ҳама маълумотҳои корманд илова карда нашудааст. Баргашта ҳамаи маълумотҳоро пур кунед');</script>";
        echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/reg_doctor.php');</script>";
      }

      if (!isset($_FILES['fupload']) || $_FILES['fupload']['error'] == UPLOAD_ERR_NO_FILE) {
         $avatar    = "images/net-avatara.jpg";

      }
      else{
      $path_to_90_directory = 'images/';
      $allowed = array('GIF', 'gif', 'JPG', 'jpg', 'PNG', 'png');
      $filename = $_FILES['fupload']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($ext, $allowed)){
        $source = $_FILES['fupload']['tmp_name'];
        $target = $path_to_90_directory.$filename;
        move_uploaded_file($source, $target);
        }
        else {
          exit ("Аватар бояд дар формати <strong>JPG,GIF ё PNG</strong> бошад");
      }

       if (pathinfo($filename, PATHINFO_EXTENSION) == 'jpg' OR pathinfo($filename, PATHINFO_EXTENSION) == 'JPG' ){
      $im = imagecreatefromjpeg($path_to_90_directory.$filename);     
     }
     if (pathinfo($filename, PATHINFO_EXTENSION) == 'png' OR pathinfo($filename, PATHINFO_EXTENSION) == 'PNG' ){
      $im = imagecreatefrompng($path_to_90_directory.$filename);
     }
     if (pathinfo($filename, PATHINFO_EXTENSION) == 'gif' OR pathinfo($filename, PATHINFO_EXTENSION) == 'GIF' ){
      $im = imagecreatefromgif($path_to_90_directory.$filename);
     }
     //СОЗДАНИЕ КВАДРАТНОГО ИЗОБРАЖЕНИЯ
     $w = 150;
     $w_src = imagesx($im);
     $h_src = imagesy($im);
     $dest = imagecreatetruecolor($w, $w);
     if ($w_src > $h_src){
      imagecopyresampled($dest, $im, 0, 0, round((max($w_src, $h_src) - min($w_src, $h_src))/2), 0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));
      
     }
     if ($w_src < $h_src){
      imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));
      
     }
     if ($w_src == $h_src){
      imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);     
     }
     $data = time();
     imagejpeg($dest, $path_to_90_directory.$data.'.jpg');
     $avatar = $path_to_90_directory.$data.'.jpg';
     $default = $path_to_90_directory.$filename;
     unlink($default);
   

    }



    switch ($departament) {
      case '1':
        $departament = 'Отдел 1';
        break;
        case '2':
        $departament = 'Отдел 2';
        break;
        case '3':
        $departament = 'Отдел 3';
        break;
        case '4':
        $departament = 'Отдел 4';
        break;
        case '5':
        $departament = 'Отдел 5';
        break;
        case '6':
        $departament = 'Отдел 6';
        break;
        case '7':
        $departament = 'Отдел 7';
        break;
        case '8':
        $departament = 'Отдел 8';
        break;
        case '9':
        $departament = 'Отдел 9';
        break;

      default:
        $departament = 'Отдел 10';
        break;
    }
    if ($password_1 != $password_2){
      echo "<script type='text/javascript'>alert('Рамзҳо мувофиқат намекунанд');</script>";
      echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/reg_doctor.php');</script>";
      exit();
    }

    $result_1 = mysqli_query($db, "SELECT id FROM doctors WHERE password = '$password_1'");
      $myrow_1 = mysqli_fetch_array($result_1);
      if (!empty($myrow_1['id'])) { exit('Бубахшед логин ё рамз алакай вуҷуд дорад. Баргашта рамзи дигареро интихоб намоед'); }

    include 'db.php'; //Подключаемся к базе

    $result2 = mysqli_query($db, "INSERT INTO doctors (name, last_name, phamiliya, departament, position, login, password, photo, m_number, address, e_mail) VALUES ('$name', '$last_name', '$phamiliya', '$departament', '$position', '$login', '$password_1', '$avatar',  '$m_number',  '$address',  '$e_mail')");
      if ($result2) {
          $message = "Сотрудник ".$last_name ." ".$name ." успешно добавлен в баззу";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/reg_doctor.php');</script>";
          //header("Location: http://mbs.tj/reg_patient.php");

          }
      else echo "<b>Ошибка: Вы не зарегистрированы!</b>";
}

 ?>