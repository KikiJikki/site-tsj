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

    <button class="btn btn-success"
   type="submit">Вернуться в начало</button>
</form>


<?php



$host = 'localhost';
$user = 'tsj';
$pass = 'drxdyn8N8T';
$db_name = 'tsj';
$db_table_users = 'users';
$db_table_data = 'data';
$mysqli = new mysqli($host,$user,$pass,$db_name);
$login = $_POST['number'];
echo " Квартира $login";
if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    echo "Ошибка соединения с Базой Данных";
    exit ();
}


$query=mysqli_query($mysqli,"select hvs,gvs,dn_el,nc_el,month,year,id from ".$db_table_data." where login=$login ORDER BY id DESC");


if ( $query == false ) {
echo "база данных недоступна";
exit ();
}


// рисуем таблицу выдачи 
echo "<table>";
echo "<tr><td>Хвс</td><td>Гвс</td><td>Дн.эл.</td><td>Нч.эл.</td><td>Расход хвс</td><td>Расход гвс</td><td>Расход дн.эл.</td><td>Расход нч.эл.</td><td>Месяц</td><td>Год</td></tr>";

while ($row = mysqli_fetch_array($query))
{

$pole1 = $row['hvs'];
$pole2 = $row['gvs'];
$pole3 = $row['dn_el'];
$pole4 = $row['nc_el'];

$id1 = $row['id']-1;

$query1 = mysqli_query($mysqli,"select hvs,gvs,dn_el,nc_el from ".$db_table_data." where id=$id1");

if ( $query1 == false ) {
$pole5 = "Нет предудущего периода";
$pole6 = "Нет предыдущего периода";
$pole7 = "Нет предыдущего периода";
$pole8 = "Нет предыдущего периода";
}
else {
while ($row1 = mysqli_fetch_array($query1))
{
$delta_hvs = $row['hvs'] - $row1['hvs'];
$delta_gvs = $row['gvs'] - $row1['gvs'];
$delta_dn = $row['dn_el'] - $row1['dn_el'];
$delta_nc = $row['nc_el'] - $row1['nc_el'];

$delta_hvs = round ($delta_hvs, 2);
$delta_gvs = round ($delta_gvs, 2);

$pole5 = $delta_hvs;
$pole6 = $delta_gvs;
$pole7 = $delta_dn;
$pole8 = $delta_nc;

}
}

switch ($row['month']){
   case "1": $pole9  = "Январь";break;
   case "2": $pole9 = "Февраль";break;
   case "3": $pole9 = "Март";break;
   case "4": $pole9 = "Апрель";break;
   case "5": $pole9 = "Май";break;
   case "6": $pole9 = "Июнь";break;
   case "7": $pole9 = "Июль";break;
   case "8": $pole9 = "Август";break;
   case "9": $pole9 = "Сентябрь";break;
   case "10": $pole9 = "Октябрь";break;
   case "11": $pole9 = "Ноябрь";break;
   case "12": $pole9 = "Декабрь";break;
}
$pole10 = $row['year'];

echo "<tr><td>$pole1</td><td>$pole2</td><td>$pole3</td><td>$pole4</td><td>$pole5</td><td>$pole6</td><td>$pole7</td><td>$pole8</td><td>$pole9</td><td>$pole10</td></tr>";
}
echo "</table>";
?>
</div>
</body>
</html>
