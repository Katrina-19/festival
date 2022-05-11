<?php
        include "path.php";
        include_once "app/controllers/topics.php";
        $postsA=selectAllFromPostsWithUsersIndex('posts', 'users');
        $top=selectTopFromPostsOnIndex('posts');
        $category=selectOne('topics', ['id'=>$_GET['id']]);
        $posts=selectAll('posts', ['id_topic'=>$_GET['id']]);
?>
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Festival</title>
</head>
<body>
<?php include("app/include/header.php");?>

<!-- block main -->
<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h2>Публикации из раздела <?=$category['name']?></h2>
            <?php foreach($postsA as $key=> $post): ?>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="<?=BASE_URL.'assets/images/posts/'.$post['img']?>" alt="<?=$post['title']?>" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?=BASE_URL.'single.php?post='.$post['id'];?>"><?=mb_substr($post['title'],0, 120, 'UTF-8').' ...'?></a>
                    </h3>
                    <i class="far fa-user"><?=$post['username']?></i>
                    <i class="far fa-calendar"><?=$post['created_date']?></i>
                    <p class="preview-text">
                        <?=mb_substr($post['content'],0, 150, 'UTF-8').' ...'?>
                    </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
                </form>
            </div>
            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach($topics as $key=> $topic): ?>
                    <li>
                        <a href="<?=BASE_URL.'category.php?id='.$topic['id'];?>"><?=$topic['name'];?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include("app/include/footer.php");?>

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