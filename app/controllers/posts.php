<?php
include  SITE_ROOT . "/app/datebase/db.php";
if (!$_SESSION) {
    header('location:' . BASE_URL . 'log.php');
}

$errMsg = [];
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');

///Создание записи
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['add_post'])) {

    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];

        $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;


        if (strpos($fileType, 'image') == false) {
            array_push($errMsg, "Файл не является изображением ");
        }
        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errMsg, 'Ошибка загрузки изображения на сервер');
        }
    } else {
        array_push($errMsg, 'Ошибка получения картинки');
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = trim($_POST['publish']);
    if (empty($publish)) {
        $publish = 0;
    }




    if ($title === '' || $content === '' ||  $topic === '') {
        array_push($errMsg, 'Не все поля заполнены');
    } elseif (mb_strlen($title, 'UTF8') < 7) {
        array_push($errMsg, 'Название  статьи должно быть более 7-ми смиволов');
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic,
        ];

        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location:' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}



// ///редактирование Статьи

if ($_SERVER['REQUEST_METHOD'] === 'GET'  && isset($_GET['id'])) {

    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['edit_post'])) {
  
    $id = $_POST['id'];
    
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish'])?1:0 ;

    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];

        $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;


        if (strpos($fileType, 'image') == false) {
            array_push($errMsg, "Файл не является изображением ");
        }
        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errMsg, 'Ошибка загрузки изображения на сервер');
        }
    } else {
        array_push($errMsg, 'Ошибка получения картинки');
    }

  
   
    if ($title === '' || $content === '' ||  $topic === '') {
        array_push($errMsg, 'Не все поля заполнены');
    } elseif (mb_strlen($title, 'UTF8') < 7) {
        array_push($errMsg, 'Название  статьи должно быть более 7-ми смиволов');
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' =>$_POST['img'] ,
            'status' => $publish,
            'id_topic' => $topic,
        ];
        
        

        $post = update('posts',$id ,$post);
        header('location:' . BASE_URL . 'admin/posts/index.php');
    }
}else{
    $id = '';
    $title = '';
    $content ='';
    $publish = isset($_POST['publish'])?1:0;
    $topic = '';
}

//Апдейт статуса или снять публикацию

if ($_SERVER['REQUEST_METHOD'] === 'GET'  && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId =update('posts',$id, ['status'=>$publish]);
    header('location:' . BASE_URL . 'admin/posts/index.php');
    exit();
}


//Удаление категории

if ($_SERVER['REQUEST_METHOD'] === 'GET'  && isset($_GET['delete_id'])) {

    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location:' . BASE_URL . 'admin/posts/index.php');
}
