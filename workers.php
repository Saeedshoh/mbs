<?php session_start();
    $s_login = $_SESSION['login'];
    if (isset($s_login) and $s_login == 'admin' or $s_login == 'mehrubon') : ?>
<!DOCTYPE html>
    <html>
         <script type="text/javascript">
                function isDelete(id) 
                {
                    if (confirm("Шумо мехоҳед кормандро аз базза нест кунед?")){
                       window.location.replace('http://mbs.tj/delate_worker.php?id='+ id );
                    }
                    else {
                        alert('Амалиёт бекор карда шуд');
                    }

                }
        </script>
    <head>
    <link rel="stylesheet" type="text/css" href="/style.css">
        <title>Рӯйхати кормандон</title>
    </head>
    <body>
    <div class="wrapper">
  <?php include 'sidebar.php'; ?>
    <div class="content">
        <div class="formm">
                    <h1>Рӯйхати кормандон</h1>
            <?php 
            include 'db.php';
            $query = mysqli_query($db, "SELECT * FROM workers");
            while ($row = mysqli_fetch_assoc($query)) {

            echo "<div class='doctors'>
                <div class='d_img'>
                    <img class='doc_images' src='".$row['avatar']."'>
                </div>
                <div class='d_img'>
                    <h2>".$row['name']."</h2>
                    <p><span style='font-weight: bold;'>Шуъба: </span>".$row['otdel']."</p>
                    <p><span style='font-weight: bold;'>Вазифа: </span>".$row['position']."</p>

                    <p><span style='font-weight: bold;'>Ҷои истиқомат: </span>".$row['address']."</p>
                    <p><span style='font-weight: bold;'>Телефони мобилӣ: </span>+992".$row['m_number']."</p>
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