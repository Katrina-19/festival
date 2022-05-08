<?php
include("app/database/db.php");

$errMsg='';


if($_SERVER['REQUEST_METHOD']==='POST'){
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
            $password=password_hash(($password), PASSWORD_DEFAULT);
            $post=[
                'admin'=>$admin,
                'participant'=>$participant,
                'username'=>$username,
                'email'=>$email,
                'password'=>$password,
                'nationality'=>$nationality
            ];
            $id=insert('users', $post);
            $errMsg= "Пользователь "."<strong>". $username."</strong>"." успешно зарегистрирован!";
        }
    }
    } else{
    $username='';
    $nationality='';
    $email='';
}
/*if(isset($_POST['username'])){

    if(!empty($_POST['participant'])){
        $participant=1;
    }else{
        $participant=0;
    }

    //$id=insert('users', $post);
}*/