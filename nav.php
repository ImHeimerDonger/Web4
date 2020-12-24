<nav class="nav sticky-top d-flex justify-content-around align-items-center row container-fluid"
    style="background-color: rgb(48, 48, 58); width:101%">
    <li class="nav-item col-xs-1" align="center">
        <a class="navbar brand" href="index.php">
            <p align="center">
                <img src="images/krest_logo_1.png" style="padding-left: 10px" />
            </p>
        </a>
    </li>
    <li class="nav-item col-xs-auto rounded-lg shadow-lg bg-transparent p-0" align="center">
        <button class="btn btn-outline-dark p-0"><a class="nav-link active" href="index.php">
                <p align="left" class="nav_first">
                    Армированный </br> Бронтозавр
                </p>
            </a></button>
    </li>
    <li class="nav-item col-lg-auto rounded-lg shadow-lg bg-transparent p-0" align="center">
        <button class="btn btn-outline-dark p-0 "> <a class="nav-link active" href="nomenklatura.php">
                <p align="center" class="nav_sec">
                    Номенклатура
                </p>
            </a> </button>
    </li>
    <li class="nav-item col-lg-auto rounded-lg shadow-lg bg-transparent p-0" align="center">
        <button class="btn btn-outline-dark p-0">
            <a class="nav-link active" href="calc.php">
                <p align="center" class="nav_sec">
                    Клиенту
                </p>
            </a>
        </button>
    </li>
    <li class="nav-item col-lg-auto rounded-lg shadow-lg bg-transparent p-0" align="center">
        <button class="btn btn-outline-dark p-0">
            <a class="nav-link active" href="journal.php">
                <p align="center" class="nav_sec">
                    Журнал продаж
                </p>
            </a> </button>
    </li>
    <li class="nav-item col-lg-auto rounded-lg shadow-lg bg-transparent p-0" align="center">
        <button class="btn btn-outline-dark p-0">
            <a class="nav-link active" href="about.php">
                <p class="nav_sec" align="center">
                    О нас
                </p>
            </a></button>
    </li>
    <?php
if (!isset($_SESSION['id'])) {
    ?>
    <nav class="nav-item nav flex-row col-lg-auto rounded-lg shadow-lg bg-transparent p-0 mr-n1 px-1 align-items-center"
        align="right">
        <li class="nav-item flex-column">
            <a class="navbar brand p-1" href="cart.php">
                <p align="center">
                    <img src="images/cart.png" style="padding-left: 10px" />
                </p>
            </a>
            <a class="navbar brand p-1" href="form_auth.php">
                <p align="center">
                    <img src="images/lk.png" style="padding-left: 10px" />
                </p>
            </a>
        </li>
        <li class="nav-item" align="center">
            <a class="navbar brand p-1 pl-2" href="form_auth.php">
                <p align="center">
                    <img src="images/auth.png" style="padding-left: 10px" />
                </p>
            </a>
        </li>
    </nav>
    <?php
} else {
    ?>
    <nav class="nav-item nav flex-row col-lg-auto rounded-lg shadow-lg bg-transparent p-0 mr-n1 px-1 align-items-center"
        align="right">
        <li class="nav-item flex-column">
            <a class="navbar brand p-1" href="#">
                <p align="center">
                    <img src="images/cart.png" style="padding-left: 10px" />
                </p>
            </a>
            <a class="navbar brand p-1" href="lk.php">
                <p align="center">
                    <img src="images/lk.png" style="padding-left: 10px" />
                </p>
            </a>

        </li>
        <li class="nav-item" align="center">
            <a class="navbar brand p-1 pl-2" href="logout.php">
                <p align="center">
                    <img src="images/logout.png" style="padding-left: 10px" />
                </p>
            </a>
        </li>
    </nav>
    <?php
}
?>
</nav>