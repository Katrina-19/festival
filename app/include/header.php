<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h6>
                    <a href="<?php echo BASE_URL?>">
                        <img src="assets/images/logo.png">
                        Фестиваль национальных культур
                    </a>
                </h6>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_URL?>">Главная</a></li>
                    <li><a href="<?php echo BASE_URL . 'about_us.php'?>">История</a></li>
                    <li><a href="<?php echo BASE_URL . 'services.php'?>">Контакты</a></li>

                    <li>
                        <?php if(isset($_SESSION['id'])):?>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['username'];?>
                            </a>
                            <ul>
                                <?php if($_SESSION['admin']):?>
                                <li><a href="<?php echo BASE_URL. "admin/posts/index.php";?>">Админ панель</a></li>
                                    <?php elseif($_SESSION['participant']):?>
                                    <li><a href="<?php echo BASE_URL. "participant/posts/index.php";?>">Управление постами</a></li>
                                <?php endif;?>
                                <li><a href="<?php echo BASE_URL."logout.php";?>">Выход</a></li>
                            </ul>
                        <?php else:?>

                            <a href="<?php echo BASE_URL."login.php";?>">
                                <i class="fa fa-user"></i>
                                Войти
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL."registration.php";?>">Регистрация</a></li>
                            </ul>
                        <?php endif;?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>