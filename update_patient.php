<?php session_start();
    $s_login = $_SESSION['login'];
    if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon') 
  {   
      $id = $_GET['id'];
      if (isset($_POST['code'])) { $code = $_POST['code']; if ($code == '') unset($code);}
      if (isset($_POST['last_name'])) { $last_name = $_POST['last_name']; if ($last_name == '') unset($last_name);}
      if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') unset($name);}
      if (isset($_POST['partonymic'])) { $partonymic = $_POST['partonymic']; if ($partonymic == '') unset($partonymic);}
      if (isset($_POST['birthday'])) { $birthday = $_POST['birthday']; if ($birthday == '') unset($birthday);}
      if (isset($_POST['m_number'])) { $m_number = $_POST['m_number']; if ($m_number == '') unset($m_number);}
      if (isset($_POST['pol'])) { $pol = $_POST['pol']; if ($pol == '') unset($pol);}
      if (isset($_POST['address'])) { $address = $_POST['address']; if ($address == '') unset($address);}
      if (isset($_POST['job'])) { $job = $_POST['job']; if ($job == '') unset($job);}
      if (empty($code) || empty($last_name) || empty($name) || empty($partonymic) || empty($birthday) || empty($m_number) || empty($pol) || empty($address) || empty($job))  
      {
        $message = "Бубахшед Шумо ҳамаи маълумотҳоро ворид накардед, баргашта ҳамаи маълумотҳоро аз сари нав дохил намоед";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/edit_patient.php');</script>";
      }
      if ($pol == 'men') { $pol = 'Мард'; }
      if ($pol == 'women') { $pol = 'Зан'; }
      date_default_timezone_set('Asia/Dushanbe');
      $today = date("Y-m-d H:i:s");
      include 'db.php'; //Подключаемся к базе
      $result2 = mysqli_query($db, "UPDATE patients SET code = '$code', last_name = '$last_name', name = '$name', partonymic = '$partonymic', birthday = '$birthday', `number` = '$m_number', pol = '$pol', address = '$address', job = '$job' WHERE id ='$id'");
      if ($result2) {
          $message = "Бемори -  ".$last_name ." ".$name ." бо мувафақият дар базза таҳрир карда шуд";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/search.php');</script>";
          //header("Location: http://mbs.tj/reg_patient.php");

          }
      else {
        echo "<b>Ошибка: Вы не зарегистрированы!</b>";
        echo mysqli_errno($db).":".mysqli_error($db)."\n";
    }
  }

 ?>