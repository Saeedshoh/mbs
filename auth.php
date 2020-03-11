<?php session_start();
	if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') unset($login);}
	if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') unset($password);}
	if ((empty($login) || empty($password))) {
		echo "<script type='text/javascript'>alert('Шумо ҳама маълумотҳоро ворид накардед. Лутфан аз сари нав ворид шавед');</script>";
        echo "<script type='text/javascript'>window.location.replace('http://mbs.tj');</script>";
	}

	$login = stripcslashes($login);
	$login = htmlspecialchars($login);
	$login = trim($login);
	$password = stripcslashes($password);
	$password = htmlspecialchars($password);
	$password = trim($password);
	include 'db.php'; //Подключаемся к базе
	if ($login == 'admin' && $password == '55555' or $login == 'mehrubon' && $password == 'mehrubon' )
	{

		$result = mysqli_query($db, "SELECT * FROM users WHERE login = '$login'");
		$myrow = mysqli_fetch_array($result);
		if (empty($myrow['password']))
		{
			echo "<script type='text/javascript'>alert('Бубахшед логин ё рамзи вордкардаи Шумо хато аст. Лутфан аз сари нав ворид шавед');</script>";
        	echo "<script type='text/javascript'>window.location.replace('http://mbs.tj');</script>";
		}
		else 
		{
			if ($myrow['password'] == $password) {
				$_SESSION['login'] = $myrow['login'];
				$_SESSION['id'] = $myrow['id'];
			}
		else 
		{
		echo "<script type='text/javascript'>alert('Бубахшед логин ё рамзи вордкардаи Шумо хато аст. Лутфан аз сари нав ворид шавед');</script>";
        echo "<script type='text/javascript'>window.location.replace('http://mbs.tj');</script>";
		}
	}

		echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/console.php');</script>";
}
	else {
		$result = mysqli_query($db, "SELECT * FROM doctors WHERE login = '$login'");
		$myrow = mysqli_fetch_array($result);
		if (empty($myrow['password'])) {
		echo "<script type='text/javascript'>alert('Бубахшед логин ё рамзи вордкардаи Шумо хато аст. Лутфан аз сари нав ворид шавед');</script>";
        echo "<script type='text/javascript'>window.location.replace('http://mbs.tj');</script>";
		}
		else {
			if ($myrow['password'] == $password) {
				$_SESSION['login'] = $myrow['login'];
				$_SESSION['id'] = $myrow['id'];
			}
		else {
		echo "<script type='text/javascript'>alert('Бубахшед логин ё рамзи вордкардаи Шумо хато аст. Лутфан аз сари нав ворид шавед');</script>";
        echo "<script type='text/javascript'>window.location.replace('http://mbs.tj');</script>";
			}
		}

		echo "<script type='text/javascript'>window.location.replace('http://".IP."/doctors/index.php');</script>";
	}
	?>
