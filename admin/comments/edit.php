<?php include("../../path.php");

include ("../../app/controllers/comentaries.php");


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
    <?php include("../../app/include/sidebar-admin.php"); ?>

          
            <div class="posts col-8">

                <div class="row title-table">

                    <h2>Редактирование комментария</h2>
                 
                
                </div>
                <div class="row add-post">
                    <div class="mb-12 col-12 col-md-12 err">
                        <?php include("../../app/include/helps/errorInfo.php"); ?>

                    </div>
                    <form action="edit.php"  method="post"  >
                         <input type="hidden" name="id" value="<?=$oneComments['id'];?>" >

                        <div class="col">
                            <input type="text" readonly value="<?= $email; ?>" name="title" class="form-control" placeholder="Title" aria-label="Название статьи">
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Комментарий</label>
                            <textarea name="content" class="form-control" id="content" rows="6"><?= $oneComments['comment']; ?></textarea>
                        </div>
                     
                        
                        <div class="form-check">
                            <?php if ($publish) $checked = "checked";else  $checked="" ; ?>
                                <input name="publish" class="form-check-input" type="checkbox" <?=$checked;?> id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Publish
                                </label>
                        
                            
                        </div>
                        <div class="col col-6">
                            <button name="edit_comment" class="btn btn-primary" type="submit">Сохранить</button>
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