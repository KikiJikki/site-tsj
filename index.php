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
  <h1>Введите номер квартиры и пароль </h1>
   <form action="check2.php" method="post">
   <input type="text" class="form-control" name="login"
   id="login" required placeholder="Введите номер квартиры">  <br>

   <input type="text" class="form-control" name="password"
   id="password" required placeholder="Введите пароль"> <br>

    <button class="btn btn-success"
   type="submit">Войти</button>
   </form>
   <form action="reg.php" method="post">
    <button class="btn btn-success"
   type="submit">Регистрация</button>
</form>
</div>

</body>
</html>

