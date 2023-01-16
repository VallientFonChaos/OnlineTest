<a href="/index.php">В главное меню</a>
<?php
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
            <th>PARENT_XML_ID</th>
            <th>NAME_DEPARTMENT</th>
        </tr>
<?php
// Создаем запрос к базе данных
$sql = mysqli_query($conn, 'SELECT * FROM `import_department`');

// Выбераем все строки и помещаем их в массив
$sql = mysqli_fetch_all($sql);

// Вынимаем из массива строки и размещаем их
foreach ($sql as $sql) {
    echo '
    <tr>
        <td>' .$sql[0]. '</td>
        <td>' .$sql[1]. '</td>
        <td>' .$sql[2]. '</td>
    </tr>
    ';
}

?>
    </body>
</html>



