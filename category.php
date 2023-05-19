<?php
 include("path.php");
include "app/controllers/topics.php";
$posts = selectAll('posts',['id_topic'=>$_GET['id']]);
// tt($posts);

$category = selectOne('topics',['id'=>$_GET['id']]);





 
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мой Блог</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="/assets/css/resetStyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <?php include("app/include/header.php"); ?>

    
    <!-- MAIN Start -->
    <div class="container">

        <div class="content row">
            <!-- Main -->
            <div class="main-content col-md-9 col-12">
               
                <h2>Публикации c  <?=$category['name'];?>  </h2>
                <?php foreach($posts as $post):?>
                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?=BASE_URL . 'assets/images/posts/'.$post['img'];?>" alt="img" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                        
                            <a href="<?=BASE_URL .'single.php?post=' .$post['id'] ;?>"><?= mb_substr($post['title'],0,120,'UTF-8').'...' ;?></p></a>
                        </h3>
                        <i class="far fa-user"><?=$post['id_user'];?></i>
                        <i class="far fa-calendar"> <?=$post['created_date'];?></i>
                        <p class="preview-text">
                       
                        <?= mb_substr($post['content'],0,150,'UTF-8').'...' ;?></p>


                    </div>


                </div>
                <?php endforeach;?>
            

            </div>
            <!-- SideBar -->
            <div class="sidebar col-md-3 col-12">
                <div class="section search">
                    <h3>Search</h3>
                    <form action="search.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Search...." id="">

                    </form>
                </div>

                <div class="section topic">
                    <h3>Категории</h3>
                    
                    <?php foreach ($topics as $key => $topic) : ?>
                        <li><a href="<?= BASE_URL. 'category.php?id='. $topic['id']; ?>"><?= $topic['name']; ?></a></li>
                    <?php endforeach; ?>

                </div>

            </div>

        </div>
    </div>
    <!-- MAIN End -->

    <!-- Footer -->
    <?php include("app/include/footer.php"); ?>

    <script src="https://kit.fontawesome.com/2830720915.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>