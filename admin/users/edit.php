<?php
include("../../path.php");

include "../../app/controllers/users.php"
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мой Блог</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="/assets/css/resetStyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <?php include("../../app/include/header-admin.php"); ?>

    <div class="container">
        <div class="row">
            <div class="sidebar col-3">
                <ul>
                    <li><a href="#">Записи</a></li>
                    <li><a href="#">Пользователи</a></li>
                    <li><a href="#">Категории</a></li>
                </ul>
            </div>

            <div class="posts col-8">
                <div class="button row">
                    <a href="<?php echo  BASE_URL . "admin/users/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
                    <span class="col-1"></span>
                    <a href="<?php echo  BASE_URL . "admin/users/index.php"; ?>" class="col-3 btn btn-warning">Управление</a>

                </div>
                <div class="row title-table">
                    <h2>Редактировать</h2>
                </div>
                <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                     <?php include("../../app/include/helps/errorInfo.php"); ?>

                    </div>
                    <form action="edit.php" method="post">
                    <input name="id" type="hidden" value="<?=$id;?>">
                         
                        <div class="col">
                            <label for="formGroupExampleInput" class="form-label">Логин</label>
                            <input type="text" class="form-control" value="<?=$username?>" name="login" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>

                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email"  readonly name="mail" value="<?=$user['email']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>

                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label"> Сбросить Пароль</label>
                            <input type="password" name="pass-first" class="form-control" id="exampleInputPassword1">
                        </div>


                        <div class="col">
                            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                            <input type="password" name="pass-second" class="form-control" id="exampleInputPassword2">
                        </div>
                        <div class="form-check">

                            <input name="admin" class="form-check-input" type="checkbox"  value="1" id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">
                                Admin?
                            </label>
                        </div>
                        <div class="col">
                            <button name="update-user" class="btn btn-primary" type="submit">Обновить</button>
                        </div>
                    </form>

                </div>

            </div>


        </div>
    </div>


    <!-- Footer -->
    <?php include("../../app/include/footer.php"); ?>

    <script src="https://kit.fontawesome.com/2830720915.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>