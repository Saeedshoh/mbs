<?php session_start();
  $s_login = $_SESSION['login'];
  if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon')
  {  
        include 'db.php';
        $sql = "SELECT * FROM `patients` WHERE reg_date >= curdate()";
        $query = mysqli_query($db, $sql);
        $myrow = mysqli_fetch_array($query);
  }
 ?>
 <!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title><?=$myrow['reg_date'];?></title>
</head>
<body>
  <?php while ($myrow = mysqli_fetch_assoc($query)): ?>
   <div class="patient" >
  <div class="ramz">
    <p>Рамзи шакл аз рӯи ТУҲИ _________</p>
    <p>Рамзи муасиса аз рӯи РУКТ________</p>
  </div>
  <table class="tab">
    <tr><td>Вазорати тандурустӣ ва ҳифзи иҷтимоии аҳоли Ҷумҳурии Тоҷикистон</td><td  rowspan="2">Ҳуҷҷати тиббии шакли №024
Бо фармоиши Вазорати тандурустӣ ва ва ҳифзи иҷтимоии аҳолии Ҷумҳурии Тоҷикистон аз «03» октябри соли 2015, №840 тасдиқ карда шудааст
</td></tr>
    <tr><td>Номи муассиса</td></tr>
  </table>
  <h4 style="text-align: center; margin: 15px 0;">КАРТАИ ТИББИИ ДАРМОНГОҲӢ №_________</h4>
  <div class="karta">
    <p>Рамзи патсиент&nbsp;&nbsp;<span class="kode"> <?=$myrow['code'];?></span></p>
    <p>1. Ному насаб &nbsp;&nbsp;<label class="name_last"> <?=$myrow['last_name'].' '.$myrow['name'].' '.$myrow['partonymic'];?></label></p>
    <p>2. Санаи таваллуд &nbsp;&nbsp;<label class="birthday"><?=$myrow['birthday'];?></label><span> 3. Ҷинс <label class="birthday"><?=$myrow['pol'];?></span><span> 4. Телефон <label class="phone">+992<?=$myrow['number'];?></span></p>
    <p class="nish">5. Нишонӣ &nbsp;&nbsp;<span class="address"><?=$myrow['address'];?></span></p>  
    <span class="drob">доимӣ/мувақатан зиндагонӣ мекунад: аз дигар шаҳр, деҳот омадааст (хат кашед)</span>
    <p class="nish">6. Ҷои кор (таҳсилот) &nbsp;&nbsp;<label class="jobss"><?=$myrow['job'];?></label></p>
    <p class="nish">7. Санаи бақайдгирӣ &nbsp;&nbsp; <label class="jobss"><?=$myrow['reg_date'];?></label></p>
    <?php
      $doctor = $myrow['doctor'];
      $res_1 = mysqli_query($db, "SELECT name, last_name, phamiliya FROM doctors WHERE id = '$doctor'");
      $row_1 = mysqli_fetch_array($res_1);
     ?>
    <p class="nish">8. Ному насаби духтур &nbsp;&nbsp; <label class="ddoctor"><?=$row_1['last_name'];?> <?=$row_1['name'];?> <?=$row_1['phamiliya'];?></label></p>
    <p class="nish">9. Шикояти бемор: &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['shikoyati_bemor'];?></span><hr  color='black' size="1"></p>  
    <p class="nish">10. Собиқаи беморӣ: &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['sobiqai_bemori'];?></span><hr  color='black' size="1"></p> 
    <p class="nish">11. Табобат гирифтааст ё не: &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['tabobat'];?></span><hr  color='black' size="1"></p>
    <p class="nish">12. Ҳолати ҳозира ва рафти беморӣ: &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['holat'];?></span><hr  color='black' size="1"></p>
    <p class="nish">13. Тавсияи таҷлилҳои лабораторӣ : &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['tavsiya_lab'];?></span><hr  color='black' size="1"></p>
    <p class="nish">14. Т/С:  &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['tc'];?></span><hr  color='black' size="1"></p>
    <p class="nish">15. Тавсияи табобат : &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['tavsiya_tabobat'];?></span><hr  color='black' size="1"></p>
    <p class="nish">16. Ташрифи навбатӣ : &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['tashrifi_navbati'];?></span><hr  color='black' size="1"></p>
    <p class="nish">17. Хулоса &nbsp;&nbsp;<span class="shikoyati_bemor"><?=$myrow['conclusion'];?></span><hr  color='black' size="1"></p>
  </div>
</div>
  <?php endwhile; ?>

</body>
</html>