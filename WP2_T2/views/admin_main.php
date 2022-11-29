<?php
$url = SERVER_ROOT . "/WP2_T2/includes/rest_server.inc.php";
$result = "";
if (isset($_POST['id'])) {
	// Felesleges szóközök eldobása
	$_POST['id'] = trim($_POST['id']);
	$_POST['csn'] = trim($_POST['csn']);
	$_POST['un'] = trim($_POST['un']);
	$_POST['bn'] = trim($_POST['bn']);
	$_POST['jel'] = trim($_POST['jel']);
	$_POST['jog'] = trim($_POST['jog']);


	// Ha nincs id és megadtak minden adatot (családi név, utónév, bejelentkezési név, jelszó), akkor beszúrás
	if ($_POST['id'] == "" && $_POST['csn'] != "" && $_POST['un'] != "" && $_POST['bn'] != "" && $_POST['jel'] != "" && $_POST['jog'] != "") {
		$data = array("csn" => $_POST["csn"], "un" => $_POST["un"], "bn" => $_POST["bn"], "jel" => sha1($_POST["jel"]), "jog" => $_POST["jog"]);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
	} // Ha nincs id de nem adtak meg minden adatot
    elseif ($_POST['id'] == "") {
		$result = "Hiba: Hiányos adatok!";
	} // Ha van id, amely >= 1, és megadták legalább az egyik adatot (családi név, utónév, bejelentkezési név, jelszó), akkor módosítás
    elseif ($_POST['id'] >= 1 && ($_POST['csn'] != "" || $_POST['un'] != "" || $_POST['bn'] != "" || $_POST['jel'] != "" || $_POST['jog'] != "")) {
		$data = array("id" => $_POST["id"], "csn" => $_POST["csn"], "un" => $_POST["un"], "bn" => $_POST["bn"], "jel" => $_POST["jel"], "jog" => $_POST["jog"]);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
	} // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
    elseif ($_POST['id'] >= 1) {
		$data = array("id" => $_POST["id"]);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
	} // Ha van id, de rossz az id, akkor a hiba kiírása
	else {
		echo "Hiba: Rossz azonosító (Id): " . $_POST['id'] . "<br>";
	}
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tabla = curl_exec($ch);
curl_close($ch);

?>
<style>
    .center {
        width: 100%;
        text-align: center;
        margin-left: auto;
        margin-right: auto;


    }
</style>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>REST GYAKORLAT</title>
</head>

<body>
<?= $result ?>
<h1 class="center">Felhasználók kezelése:</h1><br>
<h3 class="center">Ezen az oldalon a felhasználók adatait módosíthatja.</h3><br><br>
<div style="overflow-x: scroll; width: 80%; max-width: fit-content; margin-left: auto; margin-right: auto">
	<?= $tabla ?>
</div>
<br>
<div class="form-group" style="width: 80%; max-width: 400px; margin-left:auto; margin-right: auto; ">
    <h2>Módosítás / Beszúrás</h2>
    <form method="post">

        <label class="center" for="id">Id: </label><br>
        <input class="center" type="text" name="id"><br><br>

        <label class="center" for="csn">Családi név: </label><br>
        <input class="center" type="text" name="csn" maxlength="45"><br><br>

        <label class="center" for="un">Utónév: </label><br>
        <input class="center" type="text" name="un" maxlength="45"><br><br>

        <label class="center" for="bn">Bejelentkezési név: </label><br>
        <input class="center" type="text" name="bn" maxlength="12"> <br><br>

        <label class="center" for="jel">Jelszó: </label><br>
        <input class="center" type="password" name="jel"><br><br>

        <label class="center" for="jog">Jogosultság: </label><br>
        <input class="center" type="text" name="jog" pattern="[_1]{3}"><br><br>

        <input class="btn btn-warning btn-lg btn-block" type="submit" value="Küldés">
    </form>
</div>
</body>

</html>