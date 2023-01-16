<a href="/index2.php">Назад</a>
<?php
echo ' '. '<br>';
// подключаем файл конфигурации базы данных mysql
include_once 'db.php';
 
if (isset($_POST['submit']))
{
 
    // Разрешенные типы mime
    $fileMimes = array(
        'text/csv'
    );
    // Проверяем, является ли этот файл нашим CSV-файлом.
    if ($_FILES['file']['name'] == 'import_department.csv' && !empty($_FILES['file']['name']) && in_array($_FILES['file']['type'] , $fileMimes) )
    {
            // Открываем загруженный CSV-файл в режиме только для чтения
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Пропускаем первую строку
            fgetcsv($csvFile);

            
            // Разбираем данные из файла CSV построчно
            while (($getData = fgetcsv($csvFile, 10000, ";")) !== FALSE)
            {
                // Получаем данные строки
                $Dep_ID = $getData[0];
                $ID = $getData[1];
                $Name_Departament = $getData[2];
                
                $query = "SELECT Dep_ID FROM import_department WHERE Dep_ID = '" . $getData[0] . "'";
 
                $check = mysqli_query($conn, $query);

                if ($check->num_rows > 0)
                {
                    echo "Такой ID существует ".$Dep_ID. "<br>" ;
                }
                else
                {
                     mysqli_query($conn, "INSERT INTO `import_department` (`Dep_ID`, `ID`, `Name_Departament`) VALUES ('$Dep_ID','$ID','$Name_Departament')");

                 echo "Загруженный файл ".$Dep_ID.' '. $ID.' '.$Name_Departament. "<br>";
                }
            }

            // Закрываем открытый CSV-файл
            fclose($csvFile);
    }
    else
    {
        echo "Пожалуйста выберите правильный тип файла или имя файла.".'<br>';
    }
}
?>
<a href="/Vision1.php">Перейти на 2-1с</a>