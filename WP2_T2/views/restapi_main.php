<h2>
    <br>A honlapunkon két REST API-t felhasználó lap található.<br>
</h2>
<p>
    Az elsőnél a "https://gorest.co.in/public-api/users" címen megtalálható API-t tudja a felhasználó tesztelni, egy az
    erre elkészített tesztoldallal.
    <br><br>A második oldalon pedig a tanösvények adatbázisból tud adatokat lekérdezni a fentebb említett REST API
    segítségével.
</p>
<h6 class="err-msg">
	<?= (!isset($_SESSION['userid']) || $_SESSION['userid'] == 0) ?
		"Az API szolgáltatások használatához kérjük, jelentkezzen be!" : "" ?>
</h6>
