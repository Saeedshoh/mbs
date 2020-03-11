<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login)) 
  {
      if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') unset($name);}
      if (isset($_POST['otdel'])) { $otdel = $_POST['otdel']; if ($otdel == '') unset($otdel);}
      if (isset($_POST['position'])) { $position = $_POST['position']; if ($position == '') unset($position);}
      if (isset($_POST['address'])) { $address = $_POST['address']; if ($address == '') unset($address);}
      if (isset($_POST['m_number'])) { $m_number = $_POST['m_number']; if ($m_number == '') unset($m_number);}

       if (empty($name) || empty($otdel) || empty($position) || empty($address) || empty($m_number))  
      {
        echo "<script type='text/javascript'>alert('Ҳама маълумотҳои корманд илова карда нашудааст. Баргашта ҳамаи маълумотҳоро пур кунед');</script>";
        echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/reg_worker.php');</script>";
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

    include 'db.php'; //Подключаемся к базе

    $result2 = mysqli_query($db, "INSERT INTO workers (name, otdel, m_number, avatar, position, address) VALUES ('$name', '$otdel', '$m_number', '$avatar', '$position', '$address')");
      if ($result2) {
          $message = "Корманд -  ".$last_name ." ".$name ." бо мувафиқият ба база ворид карда шуд";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/reg_worker.php');</script>";
          //header("Location: http://mbs.tj/reg_patient.php");

          }
      else echo "<b>Ошибка: Вы не зарегистрированы!</b>";
}

 ?>