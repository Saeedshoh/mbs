<?php session_start();
    $s_login = $_SESSION['login'];
    if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon') : ?>
<!DOCTYPE html>
    <html>
         <script type="text/javascript">
                function isDelete(id) 
                {
                    if (confirm("Шумо мехоҳед духтурро аз базза нест кунед?")){
                       window.location.replace('http://mbs.tj/delate_doctor.php?id='+ id );
                    }
                    else {
                        alert('Амалиёт бекор карда шуд');
                    }

                }
        </script>
    <head>
    <link rel="stylesheet" type="text/css" href="/style.css">
        <title>Рӯйхати духтурон</title>
    </head>
    <body>
    <div class="wrapper">
  <?php include 'sidebar.php'; ?>
    <div class="content">
        <div class="formm">
                    <h1>Рӯйхати духтурон</h1>
            <?php 
            include 'db.php';
            $query = mysqli_query($db, "SELECT * FROM doctors");
            while ($row = mysqli_fetch_assoc($query)) {

            echo "<div class='doctors'>
                <div class='d_img'>
                    <img class='doc_images' src='".$row['photo']."'>
                </div>
                <div class='d_img'>
                    <h2>".$row['last_name']." ".$row['name']." ".$row['phamiliya']."</h2>
                    <p><span style='font-weight: bold;'>Шуъба: </span>".$row['departament']."</p>
                    <p><span style='font-weight: bold;'>Вазифа: </span>".$row['position']."</p>
                    <p><span style='font-weight: bold;'>Ҷои истиқомат: </span>".$row['address']."</p>
                    <p><span style='font-weight: bold;'>Телефони мобилӣ: </span>+992".$row['m_number']."</p>
                    <p><span style='font-weight: bold;'>E-Mail: </span>".$row['e_mail']."</p>
                    <p><span style='font-weight: bold;'>Login: </span>".$row['login']."</p>
                    <p><span style='font-weight: bold;'>Парол: </span>".$row['password']."</p>
                </div>
                <div class='d_img' style='float:right;'>
                <button class='btn' onclick='isDelete(".$row['id'].")'>Нест кардан</button>
                </div>
                <hr>
            </div>";



            }
            ?>
        </div>
 
    </div>
    </div>
    </body>
    </html>
<?php endif; ?>