<?php


//отрезание пробелов у введенных данных

 $login = filter_var(trim($_POST['login']),
 FILTER_SANITIZE_STRING);
  $password = filter_var(trim($_POST['password']),
 FILTER_SANITIZE_STRING);
  $password2 = filter_var(trim($_POST['password2']),
 FILTER_SANITIZE_STRING);

// Авторизация 
if (mb_strlen($login) > 3) {
 echo "Неверный номер квартиры";
 exit ();
} 

   if( $_POST['password'] == $_POST['password2'] )
    {

}
else {
    $msg = "Пароли не совпадают";
    echo $msg;
    exit ();
}

$host = 'localhost';
$user = 'tsj';
$pass = '551330Trojan@';
$db_name = 'tsj';
$db_table_users = 'users';
$db_table_data = 'data';
$mysqli = new mysqli($host,$user,$pass,$db_name);

if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    exit ();
}
$duplicate=mysqli_query($mysqli,"select login from ".$db_table_users." where login='$login'");
if (mysqli_num_rows($duplicate)>0)
{
 echo "Такой пользователь уже создан";
 exit ();
}

// Добавление пользователя

$result = $mysqli->query("INSERT INTO ".$db_table_users." (login,password) VALUES ('$login','$password')");

if ($result == true ){
        echo "Новый пользователь добавлен";
}
else{
        echo "Новый пользователь не добавлен";
}
echo "<br>";
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
<br>

    <button class="btn btn-success"
   type="submit">Вернуться в начало</button>
</form>
</body>
</html>


