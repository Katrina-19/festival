<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h6>
                    <a href="<?php echo BASE_URL?>">
                        <img src="../../assets/images/logo.png">
                        Фестиваль национальных культур
                    </a>
                </h6>
            </div>
            <nav class="col-8">
                <ul>
                    <li>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['username'];?>
                            </a>
                                <li><a href="<?php echo BASE_URL."logout.php";?>">Выход</a></li>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>