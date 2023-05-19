<?php
include SITE_ROOT."/app/datebase/db.php";

$errMsg = [];

function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    if($_SESSION['admin']){
        header('location:' .BASE_URL . "admin/posts/index.php");
    }else{  

        header('location:'. BASE_URL);          
    }
}
$users = selectAll('users');
//Код для регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['button-reg'])) {
   
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']); 


    if ($login === '' || $email === '' || $passF === '' || $passS === '') {
        array_push($errMsg, 'Не все поля заполнены');
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errMsg, 'Логин должен быть более 2-х символов ');
    } elseif ($passF !== $passS) {
        array_push($errMsg,'Пароли должны быть одинаковыми ');
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            array_push($errMsg,'Пользователь с такой почтой уже зарегестрирован');
        } else {   
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass

            ];
            $id = insert('users', $post);
            $user =selectOne('users',['id'=>$id]); 

            userAuth($user);

        }
    }


} else {
    $login = '';
    $email = '';
}

//Код для авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['button-log'])){
    $email = trim($_POST['mail']);
    $pass = trim($_POST['pass']);
    if ($email === '' || $pass === '') {
        array_push($errMsg, 'Не все поля заполнены');
    }else{
        
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($pass,$existence['password'])) {
          
            userAuth($existence);
            
           
        }else{
            array_push($errMsg, 'Почта либо пароль введен неверно!');
            
            
        } 
    }


}else{
    $email = '';
}

//Код добавления пользователя в админке

if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['create-user'])) {
    
   
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);


    if ($login === '' || $email === '' || $passF === '' || $passS === '') {
        array_push($errMsg, 'Не все поля заполнены');
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errMsg, 'Логин должен быть более 2-х символов ');
    } elseif ($passF !== $passS) {
        array_push($errMsg, 'Пароли должны быть одинаковыми ');
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            array_push($errMsg,  'Пользователь с такой почтой уже зарегестрирован');
        } else {   
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if(isset($_POST['admin'])){
                $admin = 1;
            }
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass

            ];
            $id = insert('users', $user);
            $user =selectOne('users',['id'=>$id]);
            userAuth($user);

        }
    }


} else {
    $login = '';
    $email = '';
}

// редактирование пользователя через админку
if ($_SERVER['REQUEST_METHOD'] === 'GET'  && isset($_GET['edit_id'])) {

    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['update-user'])) {
   
    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin'])?1:0 ;

  
  
   
    if ($mail === ''  ) {
        array_push($errMsg, 'Не все поля заполнены');
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        array_push($errMsg, 'Логин должен быть более 2-x символов');
    }elseif ($passF !== $passS) {
        array_push($errMsg, 'Пароли должны быть одинаковыми ');
    } else {
        $pass = password_hash($passF, PASSWORD_DEFAULT);
            if(isset($_POST['admin'])){
                $admin = 1;
            }
            $user = [
                'admin' => $admin,
                'username' => $login,
                // 'email' => $mail,
                'password' => $pass

            ];
         
             
        $user = update('users',$id ,$user);
        header('location:' . BASE_URL . 'admin/users/index.php');
    }
}else{
   $login='';
   $email = '';
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET'  && isset($_GET['pub_id'])) {
//     $id = $_GET['pub_id'];
//     $publish = $_GET['publish'];

//     $postId =update('posts',$id, ['status'=>$publish]);
//     header('location:' . BASE_URL . 'admin/posts/index.php');
//     exit();
// }



if ($_SERVER['REQUEST_METHOD'] === 'GET'  && isset($_GET['delete_id'])) {

    $id = $_GET['delete_id'];
 
    delete('users', $id);
    header('location:' . BASE_URL . 'admin/users/index.php');
}
