<?php
include "../../path.php";
include "../../app/controllers/users.php";;?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/9382c435bf.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Festival</title>
</head>
<body>
<?php include("../../app/include/header-admin.php");?>
<div class="container">
    <?php include "../../app/include/sidebar-admin.php";?>
        <div class="posts col-9">
            <div class="button row">
                <a href="created.php" class="col-3 btn btn-primary">Создать</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-primary">Управление</a>
            </div>
            <div class="row title-table">
                <h2>Пользователями</h2>
                <div class="col-1">ID</div>
                <div class="col-2">Имя пользователя</div>
                <div class="col-3">Национальность</div>
                <div class="col-1">Админ</div>
                <div class="col-2">Участие</div>
                <div class="col-2">Управление</div>
            </div>
            <?php foreach($users as $key=> $user): ?>
            <div class="row post">
                <div class="id col-1"><?=$key+1;?></div>
                <div class="username col-2"><?=$user['username'];?></div>
                <div class="nationality col-3"><?=$user['nationality'];?></div>
                <?php if($user['admin']==1) :?>
                <div class="admin col-1">+</div>
                <?php else: ?>
                <div class="admin col-1">-</div>
                <?php endif; ?>
                <?php if($user['participant']==1) :?>
                <div class="participant col-2">+</div>
                <?php else: ?>
                <div class="participant col-2">-</div>
                <?php endif; ?>
                <div class="red col-1"><a href="edit.php?edit_id=<?=$user['id']?>">edit</a></div>
                <div class="del col-1"><a href="index.php?del_id=<?=$user['id']?>">delete</a></div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<?php include("../../app/include/footer.php");?>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>