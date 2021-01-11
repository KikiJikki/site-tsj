<?php


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);



 $login = filter_var(trim($_POST['login']),
 FILTER_SANITIZE_STRING);


 $password = filter_var(trim($_POST['password']),
 FILTER_SANITIZE_STRING);

session_start();

$_SESSION["globallogin"]=$login;

if (mb_strlen($login) > 3) {
 echo "Неверный номер квартиры";
 exit ();
} 

$host = 'localhost';
$user = 'tsj';
$pass = 'drxdyn8N8T';
$db_name = 'tsj';
$db_table_users = 'users';
$mysqli = new mysqli($host,$user,$pass,$db_name);

if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    exit ();
}


// Проверка, является ли пользователь админом

$duplicate=mysqli_query($mysqli,"select password from ".$db_table_users." where login=$login");
$getPass2=mysqli_fetch_row($duplicate);
$getPass=$getPass2[0];

$login1 = "999";

header ('Location: http://84.201.134.136/admin_lk.php', true, 301);

   if ( $password == $getPass )
    {
if ( $login == $login1 ) {
header ('Location: http://84.201.134.136/admin_lk.php', true, 301);
}
else {
header ('Location: http://84.201.134.136/lk.php', true, 301);


exit ();
}
}
else {

echo "Неверный номер квартиры или пароль";
    exit ();
}



?>

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
   <form action="index.php" method="post">
    <button class="btn btn-success"
   type="submit">Вернуться в начало</button>
</form>
</body>
</html>


