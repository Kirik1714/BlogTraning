<?php  include("path.php"); 
include "app/controllers/users.php";

?>


<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мой Блог</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="assets/css/resetStyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

<?php  include("app/include/header.php"); ?>


    <div class="container reg_form"> 


        <form class="row justify-content-center" method="post" action="reg.php">
            <h2>Форма регистрации</h2>
            <div class="mb-3 col-12 col-md-4">
            <?php include("app/include/helps/errorInfo.php"); ?>

            </div>
            <div class="w-100"></div>

            <div class="mb-3 col-12 col-md-4">
                <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
                <input type="text" class="form-control" value="<?=$login?>" name="login" id="formGroupExampleInput"  placeholder="Example input placeholder">
              </div>
              <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" name="mail" value="<?=$email?>"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">Ваш email не будет использоваться для спама </div>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
              <label for="exampleInputPassword1" class="form-label">Пароль</label>
              <input type="password"  name="pass-first" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="w-100"></div>

            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                <input type="password"  name="pass-second"  class="form-control" id="exampleInputPassword2">
              </div>
              <div class="w-100"></div>

              <div class="mb-3 col-12 col-md-4">
                  <button type="submit" class="btn btn-secondary" name="button-reg">Регистрация</button>
                  <a href="aut.html">Войти</a>
                </div>
          </form>
    </div>
    <!-- FormaRegister -->

    <!-- Footer -->
    <?php  include("app/include/footer.php"); ?>
   
    <script src="https://kit.fontawesome.com/2830720915.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>