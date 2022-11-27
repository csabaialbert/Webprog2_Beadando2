<!DOCTYPE html>
<!--Az oldal hátterének beállítása.-->
<html lang="hu-hu">

<head>
    <meta charset="utf-8">
    <title>Tanösvények</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.png">
    <!--Az oldal megjelenéséhez használt scriptek meghívása.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>/css/main_style.css">
	<?php // if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">';
	?>

</head>

<body style=" overflow: auto; background-image: url('<?php echo SITE_ROOT ?>bg.jpg');">
<header>
    <!--Fejléc hátterének beállítása és a címek.-->
    <div class="jumbotron jumbotron-fluid text-center"
         style="margin-bottom:0; background-image: url('<?php echo SITE_ROOT ?>/images/h_bg.jpg'); background-size: cover; background-repeat:   no-repeat;">
        <h1 class="title" style="text-shadow: 2px 2px 10px #ffffff; background-color:rgba(200, 250, 150, .5);">
            Tanösvények.</h1>
        <p class="subtitle" style="text-shadow: 2px 2px 10px #ffffff; background-color:rgba(200, 250, 150, .5);">
            Web-programozás II - OTTHONRA KIADOTT FELADAT - 2 </p>
        <p class="logged-user" style="text-shadow: 2px 2px 10px #ffffff; background-color:rgba(200, 250, 150, .5);">
			<?= ($_SESSION['userid'] != 0 && isset($_SESSION['userid'])) ?
				"Bejelentkezett: " . $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'] . " (" . $_SESSION['username'] . ")." : "" ?>
			<?= ($_SESSION['userlevel'] == '__1') ? " (adminisztrátor)" : "" ?>
        </p>
    </div>


</header>
<div>
    <!--Reszponzív menüsor létrehozása.-->
    <nav>
		<?php echo Menu::getMenu($viewData['selectedItems']); ?>

    </nav>
    <br><br><br>
    <!--Szekció az oldalak kinézetének megjelenítéséhez..-->
    <div class="tartalom">
        <section>
			<?php if ($viewData['render']) include($viewData['render']); ?>
        </section>
    </div>
    <br><br><br>

    <!--Footer megjelenítése.-->
    <div class="jumbotron text-center" style="margin-bottom:0; margin-top:0;  ">
        <footer id="lab">
            &copy; Várhegyi-Miłoś Ádám, Csabai Albert <?= date("Y") ?>
        </footer>
    </div>
</div>
</body>