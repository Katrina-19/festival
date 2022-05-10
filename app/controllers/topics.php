<?php

include "../../app/database/db.php";
$errMsg='';
$id='';
$name='';
$topics=selectAll('topics');
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['topic-create'])){

    $name=trim($_POST['name']);

    if($name===''){
        $errMsg= "Не все поля заполнены!";
    }elseif(mb_strlen($name, 'UTF8')<2){
        $errMsg= "Название должно быть длиннее 2-х символов!";
    }
    else{
        $existence=selectOne('topics', ['name'=>$name]);
        if($existence['name']===$name){
            $errMsg= "Такая категория уже существует!";
        }else{
            $id=insert('topics', ['name'=>$name]);
            //$topic=selectOne('topics',['id'=>$id]);
            //$errMsg= "Категория "."<strong>". $name."</strong>"." успешно создана!";
            header('location:' . 'http://localhost/festival/admin/topics/index.php');
        }
    }
} else{
    $name='';
}

if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['id'])) {
    $id=$_GET['id'];
    $topic=selectOne('topics', ['id'=>$id]);
    $id=$topic['id'];
    $name=$topic['name'];

}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['topic-edit'])){

    $name=trim($_POST['name']);

    if($name===''){
        $errMsg= "Не все поля заполнены!";
    }elseif(mb_strlen($name, 'UTF8')<2){
        $errMsg= "Название должно быть длиннее 2-х символов!";
    }
    else{
        $existence=selectOne('topics', ['name'=>$name]);
        if($existence['name']===$name){
            $errMsg= "Такая категория уже существует!";
        }else{
            $id=$_POST['id'];
            $topic_id=update('topics', $id, ['name'=>$name]);
            //$topic=selectOne('topics',['id'=>$id]);
            //$errMsg= "Категория "."<strong>". $name."</strong>"." успешно создана!";
            header('location:' . 'http://localhost/festival/admin/topics/index.php');
        }
    }
}

if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['del-id'])) {
    $id=$_GET['del-id'];
    delete('topics', $id);
    header('location:' . 'http://localhost/festival/admin/topics/index.php');
}