<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login))
	{ 
        include 'db.php';
        $id = $_GET['id'];
        $query = mysqli_query($db, "DELETE FROM workers WHERE id = '$id'");
        if ($query){
            echo "<script type='text/javascript'>alert('Корманд аз  базза нест карда шуд');</script>";
            echo "<script type='text/javascript'>window.location.replace('http://mbs.tj/workers.php');</script>";
        }
    }

 ?>