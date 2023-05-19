<?php  include("path.php");
include "app/controllers/topics.php";

$post  = selectPostFromPostsWithUsersOnSingle('posts','users',$_GET['post']);


?>

<!doctype html>
<html lang="ru">

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




    <!-- MAIN Start -->
    <div class="container">

        <div class="content row">
            <!-- Main -->
            <div class="main-content col-md-9 col-12">
                <h2><?php echo $post['title'];?></h2>
                <div class="single_post row">
                    <div class="img col-12">
                        <img src="<?=BASE_URL . 'assets/images/posts/'.$post['img'];?>" alt="img" class="img-thumbnail">
                    </div>
                    <div class="info">

                        <i class="far fa-user"><?=$post['username'];?> </i>
                        <i class="far fa-calendar"> <?=$post['created_date'];?></i>
                    </div>
                    <div class="single_post_text col-12">
                        <h3>
                            <a href="#"><?php echo $post['title'];?></a>
                        </h3>


                        <div class="single_post_text col-12">
                        <?=$post['content'];?>
                        </div>

                    </div>


                </div>
                <?php  include("app/include/comments.php"); ?>

            </div>
            <!-- SideBar -->
            <div class="sidebar col-md-3 col-12">
                <div class="section search">
                    <h3>Search</h3>
                    <form action="index.html" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Search...." id="">

                    </form>
                </div>

                <div class="section topic">
                    <h3>Категории</h3>
                    <ul>
                    <?php foreach ($topics as $key => $topic) : ?>
                        <li><a href="<?= BASE_URL. 'category.php?id='. $topic['id']; ?>"><?= $topic['name']; ?></a></li>
                    <?php endforeach; ?>
                    </ul>

                </div>

            </div>

        </div>
    </div>
    <!-- MAIN End -->

    <!-- Footer -->
    <?php  include("app/include/footer.php"); ?>
    
    <script src="https://kit.fontawesome.com/2830720915.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>