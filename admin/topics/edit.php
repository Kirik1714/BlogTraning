<?php

include "../../path.php";

include("../../app/controllers/topics.php");

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
                    <a href="<?php echo  BASE_URL . "admin/topics/create.php"; ?>" class="col-2 btn btn-success">Создать</a>
                    <span class="col-1"></span>
                    <a href="<?php echo  BASE_URL . "admin/topics/index.php"; ?>" class="col-3 btn btn-warning">Редактировать</a>

                </div>
                <div class="row title-table">
                    <h2>Обновление категории</h2>
                </div>
                <div class="row add-post">
                    <div class="mb-3 col">
                        <p class="err"><?= $errMsg ?> </p>
                    </div>
                    <form action="edit.php" method="post">
                    <input type="hidden" value="<?=$id;?>" name="id" >

                        <div class="col">
                            <input type="text" value="<?=$name;?>" name="name" class="form-control" placeholder="Имя категори" aria-label="Имя категори">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Описание категории</label>
                            <textarea name="description"  class="form-control" id="content" rows="3"><?=$description;?></textarea>
                        </div>

                        <div class="col">
                            <button class="btn btn-primary" name="topic-edit" type="submit">Обновить категорию</button>
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