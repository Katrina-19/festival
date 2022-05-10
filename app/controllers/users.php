<?php
require("app/database/db.php");

$errMsg='';

// регистрация
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btn-reg'])){
    $username=trim($_POST['username']);
    $nationality=trim($_POST['nationality']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $repeated=trim($_POST['repeated']);
    $admin=0;

    if(!empty($_POST['participant'])){
        $participant=1;
    }else{
        $participant=0;
    }

    if($username===''||$nationality===''||$email===''||$password===''){
        $errMsg= "Не все поля заполнены!";
    }elseif($password !==$repeated){
        $errMsg= "Пароли не совпадают. Повторите попытку!";
    }
    else{
        $existence=selectOne('users', ['email'=>$email]);
        if($existence['email']===$email){
            $errMsg= "Пользователь с таким email уже существует!";
        }else{
            $password=password_hash($password, PASSWORD_DEFAULT);
            $post=[
                'admin'=>$admin,
                'participant'=>$participant,
                'username'=>$username,
                'email'=>$email,
                'password'=>$password,
                'nationality'=>$nationality
            ];
            $id=insert('users', $post);
            $user=selectOne('users',['id'=>$id]);
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['admin']=$user['admin'];
            $_SESSION['email']=$user['email'];
            if($_SESSION['admin']){
                header('location: '.BASE_URL."admin/posts/index.php");
            }else{
                header('location: '.BASE_URL);
            }
            //$errMsg= "Пользователь "."<strong>". $username."</strong>"." успешно зарегистрирован!";
        }
    }
} else{
    $username='';
    $nationality='';
    $email='';
}
//авторизация
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btn-log'])){
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);

    if($email===''||$password===''){
        $errMsg= "Не все поля заполнены!";
    }else {
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($password, $existence['password'])){
            $_SESSION['id']=$existence['id'];
            $_SESSION['username']=$existence['username'];
            $_SESSION['admin']=$existence['admin'];
            if($_SESSION['admin']){
                header('location: '.BASE_URL."admin/posts/index.php");
            }else{
                header('location: '.BASE_URL);
            }

        }else{
            $errMsg= "Почта или пароль введены неверно!";
        }
        echo("вы вошли");
    }
}else{
    $email='';
}
