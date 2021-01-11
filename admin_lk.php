<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>ТСЖ Советская 62 </title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container mt-4">
  <h1> Добро пожаловать в личный кабинет </h1>
 <br>
   <form action="index.php" method="post">
<br>

<br>    
<button class="btn btn-success"
   type="submit">Вернуться в начало</button>
<br>
<br>
<h6>Нужно выбрать номер квартиры и нажать ОК</h6>
</form>
<form action="static_admin.php" method="post">


<?php



$host = 'localhost';
$user = 'tsj';
$pass = 'drxdyn8N8T';
$db_name = 'tsj';
$db_table_users = 'users';
$db_table_data = 'data';
$mysqli = new mysqli($host,$user,$pass,$db_name);

// Проверка доступа к БД

if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    echo "Ошибка соединения с Базой Данных";
    exit ();
}


$query=mysqli_query($mysqli,"select login from ".$db_table_users);

if ( $query == false ) {
echo "база данных недоступна";
exit ();
}

// Формирование списка зареганных пользователей

echo "<select name = 'number' id = 'number'>";
while ($object = mysqli_fetch_object($query)) {
echo "<option value = '$object->login' > $object->login </option>";

}
echo "</select>";




?>

<button class="btn btn-success"
 type="submit">ОК</button>

</form>
<h6> Либо выбрать период для отображения информации по всем квартирам.</h6>
<form action="static_admin2.php" method="post">



   <select id="month" name="month">
        <option value="1">Январь</option>
        <option value="2">Февраль</option>
        <option value="3">Март</option>
        <option value="4">Апрель</option>
        <option value="5">Май</option>
        <option value="6">Июнь</option>
        <option value="7">Июль</option>
        <option value="8">Август</option>
        <option value="9">Сентябрь</option>
        <option value="10">Октябрь</option>
        <option value="11">Ноябрь</option>
        <option value="12">Декабрь</option>
    </select>
 <br>
   <select id="year" name="year">
        <option>2020</option>
        <option>2021</option>
        <option>2022</option>
   </select>






<button class="btn btn-success"
 type="submit">Запросить период</button>
</form>

</div>
</body>
</html>
