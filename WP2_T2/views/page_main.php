

<!DOCTYPE html>
<!--Az oldal hátterének beállítása.-->
<html lang="hu-hu" style=" background-image: url('bg.png'); background-size: contain; background-repeat:   no-repeat; background-attachment: fixed;  background-size: 100% 100%;">

<head>
    <meta charset="utf-8">
    <title>Tanösvények</title>
    <link rel="icon" type="image/x-icon" href="icon.png">
    <!--Az oldal megjelenéséhez használt scriptek meghívása.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
    <?php if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">'; ?>

</head>

<body>
    <header>
        <!--Fejléc hátterének beállítása és a címek.-->
        <div class="jumbotron jumbotron-fluid text-center" style="margin-bottom:0; background-image: url('h_gb.jpg'); background-size: cover; background-repeat:   no-repeat;">
            <h1 style="text-shadow: 2px 2px 10px #ffffff; background-color:rgba(200, 250, 150, .5);">Tanösvények.</h1>
            <p style="text-shadow: 2px 2px 10px #ffffff; background-color:rgba(200, 250, 150, .5);">Web-programozás II - OTTHONRA KIADOTT FELADAT - 2 </p>
            <p>
                    <?= ($_SESSION['userid'] != 0 && isset($_SESSION['userid'])) ?
                        "Bejelentkezett: " . $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'] . " (" . $_SESSION['username'] . ")." : "" ?>
                    <?= ($_SESSION['userlevel'] == '__1') ? " (adminisztrátor)" : "" ?>
                    </p>
        </div>


    </header>
    <!--Reszponzív menüsor létrehozása.-->
    <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
            
        </nav>
<!--Szekció az oldalak kinézetének megjelenítéséhez..-->
        <section>
            <?php if ($viewData['render']) include($viewData['render']); ?>
        </section>

    <!--Footer megjelenítése.-->
    <div class="jumbotron text-center" style="margin-bottom:0; margin-top:0;  ">
        <footer id="lab">
            &copy; Várhegyi-Miłoś Ádám, Csabai Albert <?= date("Y") ?>
        </footer>
    </div>
</body>
