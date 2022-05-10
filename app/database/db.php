<?php
require('connect.php');

session_start();
//проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo=$query->errorInfo();
    if($errInfo[0]!==PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
//запрос на получение данных одной таблицы
function selectAll($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i=0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value="'".$value."'";
            }
            if($i===0){
                $sql=$sql . " WHERE $key = $value";
            }
            else{
                $sql=$sql . " AND $key = $value";
            }
            $i++;
        }
    }

    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//запрос на получение данных одной строки данных таблицы
function selectOne($table, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i=0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value="'".$value."'";
                //$key="'".$key."'";
            }
            if($i===0){
                $sql=$sql . " WHERE $key = $value";
            }
            else{
                $sql=$sql . " AND $key = $value";
            }
            $i++;
        }
    }
    //$sql=$sql." LIMIT 1";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}
//запись в таблицу БД
function insert($table, $params){
    global $pdo;
    $i=0;
    $col='';
    $mask='';
    foreach ($params as $key => $value){
        if($i===0){
            $col=$col . "$key";
            $mask=$mask ."'" ."$value" ."'";
        }else{
            $col=$col . ", $key";
            $mask=$mask .", '" ."$value" ."'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";
    $query =$pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
//обновление строки в таблице БД
function update($table, $id, $params){
    global $pdo;
    $i=0;
    $str='';
    foreach ($params as $key => $value){
        if($i===0){
            $str=$str. $key ." = '" .$value ."'";
        }else{
            $str=$str.", ". $key ." = '" .$value ."'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id";
    var_dump($sql);
    $query =$pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
//удаление строки в таблице БД
function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id=$id";
    $query =$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}