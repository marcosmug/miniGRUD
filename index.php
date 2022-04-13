<?php
include_once('includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>mainpage</title>
</head>
<main>

    <body>
        <section id="home">
            <div class="banner">
                <div class="textbackground">
                    <h1>Freddy fazbear`s<br>
                        Pizzeria
                        <div id="path">
                            <div id="brick"></div>
                        </div>
                    </h1>
                </div>
                <header>
                    <nav>
                        <div class="navbar">
                            <img src="img/logo.png" class="logo">
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#eetmenu">Menu</a></li>
                                <?php 
                                if (isset($_SESSION["rol"])) {
                                    echo '<li><a href="logout.php">logout</a></li>';
                                    if ($_SESSION["rol"]=== "admin") {
                                        echo '<li><a href="admin.php">admin</a></li>';
                                    }
                                }
                                else {
                                    echo '<li><a href="login.php">Login</a></li>';
                                } 
                                ?>
                                <li class="toggle" data-toggle=".shopping-cart"><a>Winkelwagen</a></li>
                            </ul>
                            <div class="shopping-cart">

                            </div>
                    </nav>
                </header>
            </div>
            </div>
            <div class="maintext">
        </section>
        </div>
        <section id="eetmenu">
            <div class="menu-background">
                <div class="menu">
                <div class="searchbar">
                            
                            <form id="form" action = "index.php" method = "get">
                                <input type="search" id="search" name="search" placeholder="Search...">
                                <button type= "sumbit">Search</button>
                            </form>
                            
                        </div>
                    <!-- <img src="img/menubackground.png"> -->
                    <div class="menu-content">
                        <div class="menu-content-2">
                            <div class="items">
                                <?php
                                if (isset($_GET["search"])) {
                                    $search = "%".$_GET['search']."%";

                                    $sql = "SELECT * FROM menukaart WHERE
                                    name LIKE :search";
                                    $stmt = $connect -> prepare($sql);
                                    $stmt -> bindParam(":search",$search);
                                    $stmt -> execute();
                                    $result = $stmt -> fetchAll();
                                } else {
                                    $sql = "SELECT * FROM menukaart";
                                    $stmt = $connect -> prepare($sql);
                                    $stmt -> execute();
                                    $result = $stmt -> fetchAll();
                                }
                                    foreach($result as $res) {
                                ?>
                                <div class="itembox">
                                    <div class="itemname">
                                        <?php echo "<h3>{$res["name"]}</h3>"; ?>
                                        <?php echo "<h3>{$res["price"]}</h3>"; ?>
                                        <div class="itembutton">
                                            <button>Toevoegen aan winkel
                                                wagen</button>
                                            <div class="itempic">
                                                <?php echo "<img src='img/{$res["image"]}'>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <script src="js/main.js"></script>
    </body>
</main>
<!-- <footer>
    
</footer> -->

</html>