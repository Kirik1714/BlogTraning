<?php include("../../path.php");


include("../../app/controllers/users.php");

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
        <?php  include "../../app/include/sidebar-admin.php";?>

           
            <div class="posts col-8">
            <div class="button row">
                    <a href="<?php echo  BASE_URL ."admin/users/create.php";?>" class="col-2 btn btn-success">Создать</a>
                    <span class="col-1"></span>
                    <a href="<?php echo  BASE_URL ."admin/users/index.php";?>" class="col-3 btn btn-warning">Управление</a>

                </div>
                <div class="row title-table">
                    <h2>Пользователи</h2>
                    <div class="col-1">Id</div>
                    <div class="col-3">Логин </div>
                    <div class="col-4">Email </div>
                    <div class="col-2"> Роль </div>
                    <div class="col-2"> Управление </div>
              
                </div>
          
                
                <?php foreach($users as $user):?>
                <div class="row post">
                        <div class="col-1"> <?=$user['id'];?> </div>
                        <div class="col-3"><?=$user['username'];?></div>
                        <div class="col-4"><?=$user['email'];?> </div>
                        <?php if ($user['admin']==1):?>
                            <div class="col-2"> Admin </div>
                        <?php else:?>
                            <div class="col-2"> User </div>
                        <?php endif;?>

                        <div class="red col-1"><a href="edit.php?edit_id=<?=$user['id'];?>">edit</a>  </div>
                        <div class="manage col-1"> <a href="index.php?delete_id=<?=$user['id'];?>">delete</a>  </div>

                </div>
                <?php endforeach;?>

            
               
            </div>


        </div>
    </div>


    <!-- Footer -->
    <?php include("../../app/include/footer.php"); ?>

    <script src="https://kit.fontawesome.com/2830720915.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>