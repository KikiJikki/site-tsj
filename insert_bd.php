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
  <h1> Ваша квартира № 
<?php
session_start();
echo $_SESSION["globallogin"];

?>
</h1> <br>

</div>
   <form action="index.php" method="post">
<br>

    <button class="btn btn-success"
   type="submit">Вернуться в начало</button>
</form>  
</body>
</html>


<?php
session_start();
$login1 = $_SESSION["globallogin"];


$host = 'localhost';
$user = 'tsj';
$pass = 'drxdyn8N8T';
$db_name = 'tsj';
$db_table_users = 'users';
$db_table_data = 'data';
$mysqli = new mysqli($host,$user,$pass,$db_name);

if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    echo "Ошибка соединения с Базой Данных";
    exit ();
}
// Корректировка вводимых данных 

 $hvs = filter_var(trim($_POST['hvs']),
 FILTER_SANITIZE_STRING);

 $gvs = filter_var(trim($_POST['gvs']),
 FILTER_SANITIZE_STRING);

 $dn_el = filter_var(trim($_POST['dn_el']),
 FILTER_SANITIZE_STRING);

 $nc_el = filter_var(trim($_POST['nc_el']),
 FILTER_SANITIZE_STRING);


$hvs = str_replace(",",".",$hvs);
$gvs = str_replace(",",".",$gvs);

// Запрос данных из БД

$query=mysqli_query($mysqli,"select hvs,gvs,dn_el,nc_el,delta_hvs,delta_gvs,delta_dn,delta_nc,month,year from ".$db_table_data." where login=$login1");
if ($query == true) {
while ($row = mysqli_fetch_array($query))
{
if ( $_POST['year'] == $row['year'] ) {
if ( $_POST['month'] == $row['month'] ) {
echo "Данные за этот период уже внесены";
exit ();
}
}
}
}

// Присвоение id по месяцу

if ( $_POST['year'] == '2020' ) {

switch ($_POST['month']){
   case "1": $_SESSION['id'] = 1;break;
   case "2": $_SESSION['id'] = 2;break;
   case "3": $_SESSION['id'] = 3;break;
   case "4": $_SESSION['id'] = 4;break;
   case "5": $_SESSION['id'] = 5;break;
   case "6": $_SESSION['id'] = 6;break;
   case "7": $_SESSION['id'] = 7;break;
   case "8": $_SESSION['id'] = 8;break;
   case "9": $_SESSION['id'] = 9;break;
   case "10": $_SESSION['id'] = 10;break;
   case "11": $_SESSION['id'] = 11;break;
   case "12": $_SESSION['id'] = 12;break;
}
}



if ( $_POST['year'] == '2021' ) {

switch ($_POST['month']){
   case "1": $_SESSION['id'] = 13;break;
   case "2": $_SESSION['id'] = 14;break;
   case "3": $_SESSION['id'] = 15;break;
   case "4": $_SESSION['id'] = 16;break;
   case "5": $_SESSION['id'] = 17;break;
   case "6": $_SESSION['id'] = 18;break;
   case "7": $_SESSION['id'] = 19;break;
   case "8": $_SESSION['id'] = 20;break;
   case "9": $_SESSION['id'] = 21;break;
   case "10": $_SESSION['id'] = 22;break;
   case "11": $_SESSION['id'] = 23;break;
   case "12": $_SESSION['id'] = 24;break;
}
}



if ( $_POST['year'] == '2022' ) {

switch ($_POST['month']){
   case "1": $_SESSION['id'] = 25;break;
   case "2": $_SESSION['id'] = 26;break;
   case "3": $_SESSION['id'] = 27;break;
   case "4": $_SESSION['id'] = 28;break;
   case "5": $_SESSION['id'] = 29;break;
   case "6": $_SESSION['id'] = 30;break;
   case "7": $_SESSION['id'] = 31;break;
   case "8": $_SESSION['id'] = 32;break;
   case "9": $_SESSION['id'] = 33;break;
   case "10": $_SESSION['id'] = 34;break;
   case "11": $_SESSION['id'] = 35;break;
   case "12": $_SESSION['id'] = 36;break;
}
}


$month1 = $_POST['month'];
$year1 = $_POST['year'];
$id1 = $_SESSION['id'];

// Добавление новых данных в БД

$mysqli = new mysqli($host,$user,$pass,$db_name);
$result = $mysqli->query("INSERT INTO ".$db_table_data." (login,hvs,gvs,dn_el,nc_el,month,year,id) VALUES ('$login1','$hvs','$gvs','$dn_el','$nc_el','$month1','$year1','$id1')");


if ($result == true ){
        echo "<br>";
        echo "<h3>Данные добавлены</h3>";

}
else{
        echo "Данные не добавлены";
        echo "<br>";
         printf("%s\n", $mysqli->error); 
}
?>

