<?php
require_once "head.php";
?>

<body class="background_small">
    <?php
require_once "nav.php";
?>
    <div class="container-fluid row justify-content-center" style="margin-top: 8%; flex: 1">
        <div class="col-lg-6">
            <p class="rounded-lg shadow-lg bg-transparent pb-3 mb-n1 indexMid1" align="center">
                Добро пожаловать, <?php echo $_SESSION['login']; ?>
            </p>
            <p class="rounded-lg shadow-lg bg-transparent pt-3 mt-n1 indexMid2" align="center">
                Это ваш личный кабинет, в котором ничего нет. <br>
                Ваш супер-секретный id: <?php echo$_SESSION['id']?>
                <br>
                <a href="logout.php" class="indexMid2 px-1"
                    style="background: linear-gradient(to left, red, orange, yellow, green, cyan, blue, violet) ">Выйти
                    из учетной записи</a>
            </p>
        </div>
    </div>

    <?php
require_once "footer.php";
?>