<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "DateBase";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Нет подключение:' .mysql_error());
        }
?>




