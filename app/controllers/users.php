<?php
include "E:\Ampps\www\\festival\app\database\db.php";

$errMsg=[];

$users=selectAll('users');

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
        array_push($errMsg, "Не все поля заполнены!");
    }elseif($password !==$repeated){
        array_push($errMsg, "Пароли не совпадают. Повторите попытку!");
    }
    else{
        $existence=selectOne('users', ['email'=>$email]);
        if($existence['email']===$email){
            array_push($errMsg, "Пользователь с таким email уже существует!");
        }else{
            $password=password_hash($password, PASSWORD_DEFAULT);
            $user=[
                'admin'=>$admin,
                'participant'=>$participant,
                'username'=>$username,
                'email'=>$email,
                'password'=>$password,
                'nationality'=>$nationality
            ];
            $id=insert('users', $user);
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
        array_push($errMsg, "Не все поля заполнены!");
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
            array_push($errMsg, "Почта или пароль введены неверно!");
        }
        echo("вы вошли");
    }
}else{
    $email='';
}

/*добавление через админа*/
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['create-user'])){
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
    if(isset($_POST['admin'])){
        $admin=1;
    }

    if($username===''||$nationality===''||$email===''||$password===''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif($password !==$repeated){
        array_push($errMsg, "Пароли не совпадают. Повторите попытку!");
    }
    else{
        $existence=selectOne('users', ['email'=>$email]);
        if($existence['email']===$email){
            array_push($errMsg, "Пользователь с таким email уже существует!");
        }else{
            $password=password_hash($password, PASSWORD_DEFAULT);
            $user=[
                'admin'=>$admin,
                'participant'=>$participant,
                'username'=>$username,
                'email'=>$email,
                'password'=>$password,
                'nationality'=>$nationality
            ];
            $id=insert('users', $user);
            $user=selectOne('users',['id'=>$id]);
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['admin']=$user['admin'];
            $_SESSION['email']=$user['email'];
            if($_SESSION['admin']){
                header('location: '."http://localhost/festival/admin/posts/index.php");
            }else{
                header('location: '."http://localhost/festival/");
            }
            //$errMsg= "Пользователь "."<strong>". $username."</strong>"." успешно зарегистрирован!";
        }
    }
} else{
    $username='';
    $nationality='';
    $email='';
}

/*удаление*/
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['del_id'])) {
    $id=$_GET['del_id'];
    delete('users', $id);
    header('location:' . BASE_URL. 'admin/users/index.php');
}

/*редактирование*/
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['edit_id'])) {
    $user=selectOne('users', ['id'=>$_GET['edit_id']]);

    $id=$user['id'];
    $username=$user['username'];
    $admin=$user['admin'];
    $participant=$user['participant'];
}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['update-user'])){

    $id=$_POST['id'];
    $username=trim($_POST['username']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $repeated=trim($_POST['repeated']);
    $admin = isset($_POST['admin']) ? 1 : 0;
    $participant = isset($_POST['participant']) ? 1 : 0;

    if($username===''){
        array_push($errMsg,"Не все поля заполнены!");
    }elseif($password !==$repeated){
        array_push($errMsg, "Пароли не совпадают. Повторите попытку!");
    }
    else{
        $password=password_hash($password, PASSWORD_DEFAULT);
        $user=[
            'admin'=>$admin,
            'participant'=>$participant,
            'username'=>$username,
            'password'=>$password,
        ];
        $post=update('users',$id, $user);
        //$errMsg= "Категория "."<strong>". $name."</strong>"." успешно создана!";
        header('location:' . 'http://localhost/festival/admin/users/index.php');
    }
} else{
    $username='';
    $nationality='';
    $email='';
}