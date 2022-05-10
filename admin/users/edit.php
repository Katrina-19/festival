<?php
include "../../app/controllers/users.php";
include "../../path.php"?>
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
        <div class="row title-table">
            <h2>Редактирование пользователя</h2>
        </div>
        <div class="row add-post">
            <div class="md-12 col-12 col-md-12 err">
                <?php include "../../app/helps/errorInfo.php";?>
            </div>
            <form action="created.php" method="post">
                <input type="hidden" name="id" value="<?=$id;?>">
                <div class="col">
                    <label for="formGroupExampleInput1" class="form-label">Имя</label>
                    <input type="text" class="form-control" name="username" value="<?= $username?>" id="formGroupExampleInput1" placeholder="Введите ваше имя...">
                </div>
                <input name="participant" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Участник
                </label>
                <input name="admin" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Админ
                </label>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $email?>"  readonly id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="col">
                    <label for="exampleInputPassword1" class="form-label">Сбросить пароль</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <div class="col">
                    <label for="exampleInputPassword2" class="form-label">Подтвердите пароль</label>
                    <input type="password" class="form-control" name="repeated" id="exampleInputPassword2">
                </div>
                <div class="col">
                    <div class="col">
                        <button name="update-user" class="btn btn-primary" type="submit">Обновить</button>
                    </div>
            </form>
        </div>
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