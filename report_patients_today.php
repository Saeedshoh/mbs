<?php session_start();
	$s_login = $_SESSION['login'];
	if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon')
	{
?>
<!DOCTYPE html>
 	<html>
 	<head>
 	<link rel="stylesheet" type="text/css" href="/style.css">
 		<title>Беморони имрӯз</title>
         <script type="text/javascript">
            function isDelete(id) {
                if (confirm("Шумо мехоҳед варақаи беморро нест кунед?")){
                   window.location.replace('http://mbs.tj/delate_patient.php?id='+ id );
                }
                else {
                    alert('Амалиёт бекор карда шуд');
                }

 }
</script>
 	</head>
 	<body>
 	<div class="wrapper">

  <?php include 'sidebar.php'; ?>

 	<div class="content">   
      <div class="block">   
        <h1>Беморони имрӯз</h1>
  
<?php 
 $db = mysqli_connect("localhost", "root", "", "mbs") or die ('ERROR'); 
     $sql = "SELECT * FROM `patients` WHERE reg_date >= curdate()";
        $query = mysqli_query($db, $sql);

            if (mysqli_num_rows($query) == 0){
            exit ("<div class='pills_title'><span class='not_found'>Аз рӯи дархости Шумо чизе ёфт нашуд</span></div>");
         }
           echo "<ol class='pills'>";
         echo "<div class='pills_title'><span class='info_name'>Ном ва насаби бемор</span><span  class='info_status'>Статус</span> <span class='info_doctor'>Духтур</span><span class='info_date'>Санаи бақайдгирӣ</span></div>";
        while ($row = mysqli_fetch_assoc($query)) {

             $doctor = $row['doctor'];
            $sql_2 = "SELECT name, last_name FROM doctors WHERE id='$doctor'";
            $query_2 = mysqli_query($db, $sql_2);
            $row2 = mysqli_fetch_array($query_2);
            $name = substr($row2['name'], 0, 2 );


            if ($row['status'] == 0 ) {
              $status = "Кушода";
            }
            else $status = "Маҳкам";

            echo "<li><a target='_blank' href='patient.php?id=".$row['id']."' class='lnp_search'>".$row['last_name']." ".$row['name']." ".$row['partonymic']."</a><span>".$status."</span><span  class='edit'> <span style='padding-right:45px;'>".$row2['last_name']." ".$name."</span><span style='padding-right:27px;'>".$row['reg_date']."</span><a href='edit_patient.php?id=".$row['id']."'   class='btn' style='padding-right:25px;'>Таҳрир кардан</a> <button class='btn' onclick='isDelete(".$row['id'].")'>Нест кардан</button></span> </li>";
        }
        echo "</ol>";
echo "
  </div>
 	</div>
 	</div>
 	</body>
 	</html>";
	}
 ?>