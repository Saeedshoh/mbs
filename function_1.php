<?php 
	function MessageSend($p1, $p2)
	{
		if ($p1 == 1 ) $p1 = 'Хатогӣ';
		else if ($p1 == 2 ) $p1 = 'Маълумот';
		$_SESSION['message'] = '<div class="MessageBlock"><b>'.$p1.'</b>: '.$p2.'hvghdvhdvhv</div>';
		exit(header("Location: ".$_SERVER['HTTP_REFERER']));
	}
		function MessageShow()
	{
		if ($_SESSION['message']) $message = $_SESSION['message'];
		echo $message;
		$_SESSION['message'] = array();
	}
 ?>