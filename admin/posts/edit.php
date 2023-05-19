<?php include("../../path.php");

include("../../app/controllers/posts.php");


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

                <div class="row title-table">

                    <h2>Редактирование записи</h2>


                </div>
                <div class="row add-post">
                    <div class="mb-12 col-12 col-md-12 err">
                        <?php include("../../app/include/helps/errorInfo.php"); ?>

                    </div>
                    <form action="edit.php"  method="post"  enctype="multipart/form-data">
                         <input type="hidden" name="id" value="<?=$post['id'];?>" >

                        <div class="col">
                            <input type="text" value="<?= $post['title']; ?>" name="title" class="form-control" placeholder="Title" aria-label="Название статьи">
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Содержимое записи</label>
                            <textarea name="content" class="form-control" id="content" rows="6"><?= $post['content']; ?></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="img" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <select name='topic' class="form-select" aria-label="Default select example">
                            
                            <?php foreach ($topics as $key => $topic) : ?>
                                <option value="<?= $topic['id'] ?>"><?= $topic['name']; ?></option>


                            <?php endforeach; ?>

                        </select>
                        <div class="form-check">
                            <?php if (empty($publish) && $publish == 0) : ?>
                                <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Publish
                                </label>
                            <?php else : ?>
                                <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Publish
                                </label>
                            <?php endif; ?>
                        </div>
                        <div class="col col-6">
                            <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
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