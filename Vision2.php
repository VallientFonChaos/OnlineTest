<a href="/index.php">В главное меню</a>
<?php
//Подключаем файл конфигурации базы данных mysql
  require_once 'db.php';
  echo ' '. '<br>';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Документ</title>
    </head>
    <style>
        th, td {
            padding:  10px;
        }
    </style>
    <body>
        <table border="1">
        <tr>
            <th>XML_ID</th>
            <th>LAST_NAME</th>
            <th>NAME</th>
            <th>SECOND_NAME</th>
            <th>DEPARTMENT</th>
            <th>WORK_POSITION</th>
            <th>EMAIL</th>
            <th>MOBILE_PHONE</th>
            <th>PHONE</th>
            <th>LOGIN</th>
            <th>PASSWORD</th>
        </tr>
<?php
// Создаем запрос к базе данных
$sql = mysqli_query($conn, 'SELECT * FROM `import_users`');

// Выбераем все строки и помещаем их в массив
$sql = mysqli_fetch_all($sql);

// Вынимаем из массива строки и размещаем их
foreach ($sql as $sql) {
    echo '
    <tr>
        <td>' .$sql[0]. '</td>
        <td>' .$sql[1]. '</td>
        <td>' .$sql[2]. '</td>
        <td>' .$sql[3]. '</td>
        <td>' .$sql[4]. '</td>
        <td>' .$sql[5]. '</td>
        <td>' .$sql[6]. '</td>
        <td>' .$sql[7]. '</td>
        <td>' .$sql[8]. '</td>
        <td>' .$sql[9]. '</td>
        <td>' .$sql[10]. '</td>
    </tr>
    ';
}

?>
    </body>
</html>

