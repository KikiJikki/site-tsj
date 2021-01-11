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
<form action="insert_bd.php" method="post">
   <input type="text" class="form-control" name="hvs"
   id="hvs" required placeholder="Холодная вода">  <br>

   <input type="text" class="form-control" name="gvs"
   id="gvs" required placeholder="Горячая вода">  <br>

   <input type="text" class="form-control" name="dn_el"
   id="dn_el" required placeholder="Дневная электроэнергия">  <br>

   <input type="text" class="form-control" name="nc_el"
   id="nc_el" required placeholder="Ночная электроэнергия">  <br>

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
 <br>
   <select id="year" name="year">
        <option>2020</option>
        <option>2021</option>
        <option>2022</option>
   </select>
 <br>
 <br>
    <button class="btn btn-success"
   type="submit">Добавить данные</button>

</form>

   <form action="static.php" method="post">
    <button class="btn btn-success"
   type="submit">Посмотреть данные</button>
</form>
   <form action="index.php" method="post">


    <button class="btn btn-success"
   type="submit">Вернуться в начало</button>
</form>

</div>
  
</body>
</html>




