<a href="/index3.php">Назад</a>
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
    // Проверяем, является ли выбранный файл CSV-файлом
    if ($_FILES['file']['name'] == 'import_users.csv' && !empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
            // Открываем загруженный CSV-файл в режиме только для чтения
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Пропускаем первую строку
            fgetcsv($csvFile);
 
            // Разбираем данные из файла CSV построчно
            while (($getData = fgetcsv($csvFile, 10000, ";")) !== FALSE)
            {
                // Получаем данные строки
                $Users_ID = $getData[0];
                $Last_name = $getData[1];
                $Name = $getData[2];
                $Second_name = $getData[3];
                $ID = $getData[4];
                $Work_position = $getData[5];
                $Email = $getData[6];
                $Mobile_phone = $getData[7];
                $Phone = $getData[8];
                $Login = $getData[9];
                $Password = $getData[10];
                
                $query = "SELECT Users_ID FROM import_users WHERE Users_ID = '" . $getData[0] . "'";
 
                $check = mysqli_query($conn, $query);

                if ($check->num_rows > 0)
                {
                    echo "Такой ID существует ".$Users_ID. "<br>" ;
                }
                else
                {
                     mysqli_query($conn, "INSERT INTO `import_users` (`Users_ID`, `Last_name`, `Name`, `Second_name`, `ID`, `Work_position`, `Email`, `Mobile_phone`, `Phone`, `Login`, `Password`) VALUES ('$Users_ID','$Last_name', '$Name', '$Second_name', '$ID', '$Work_position', '$Email', '$Mobile_phone', '$Phone', '$Login','$Password')");

                 echo "Загруженный файл ".$Users_ID.' '. $Last_name.' '.$Name.' '.$Second_name.' '.$ID.' '.$Work_position.' '.$Email.' '.$Mobile_phone.' '.$Phone.' '.$Login.' '.$Password. "<br>";
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
<a href="/Vision2.php">Перейти на 2-2с</a>