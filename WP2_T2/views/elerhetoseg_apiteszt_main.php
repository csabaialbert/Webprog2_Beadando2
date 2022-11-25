<h1>API teszt</h1>
<h1>(gorest.co.in webszolgáltatás segítségével)</h1>
<h2>GET metódus:</h2>
<?php
$url = "https://gorest.co.in/public-api/users";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$adat = curl_exec($ch);
$tmb = json_decode($adat, TRUE);
$data = $tmb["data"];
$kimenet = "";
foreach ($data as $adatok) {
    $kimenet .= "<tr ><td>" . $adatok["id"] . "</td>" . "<td>" . $adatok["name"] . "</td>" . "<td>" . $adatok["email"] . "</td>" . "<td>" . $adatok["gender"] . "</td>" . "<td>" . $adatok["status"] . "</td></tr>";
}
$valasz="";
$valasz2="";
$valasz3="";
$kimenet2 = "";
$kimenet3 = "";
$kimenet4 = "";
$delresp="";
?>
<style>
    tr,
    th,
    td {
        border-style: double;
        text-align: center;
        padding: 15px;
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }
    h1, h2, h3 {
        width: 100%;
        text-align: center;
    }
    h3 {
        color: red;
    }
</style>
<table>
    <tr>
        <th>Azonosító</th>
        <th>Név</th>
        <th>E-mail</th>
        <th>Nem</th>
        <th>Státusz</th>
    </tr>
    <?php echo $kimenet; ?>
</table>

<h2>POST metódus:</h2>
<form action="#" method="post">
<div class="form-group" style="max-width: 400px; margin-left:auto; margin-right: auto; ">
    <label for="csaladi_nev">Name</label>
    <input type="text" name="name" id="name" required inputmode="text">
    <br><br>
    <label for="utonev">Gender</label><br>
    <label for="utonev">Female</label>
    <input type="radio" id="female" name="gender" value="female"> <br>
    <label for="utonev">Male</label>
    <input type="radio" id="male" name="gender" value="male">
    <br><br>
    <label for="reg_login">E-mail</label>
    <input type="text" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
    <br>
    <br>
    <label for="utonev">Status</label><br>
    <label for="utonev">Active</label>
    <input type="radio" id="active" name="stat" value="active"> <br>
    <label for="utonev">Inactive</label>
    <input type="radio" id="inacive" name="stat" value="inactive">
    <br><br>

    <br>
    <input class="btn btn-warning btn-lg btn-block" type="submit" name="submit" value="Submit">
</div>
</form>
<?php
if(isset($_POST['submit']) && $_POST['name'] != "" && $_POST['gender'] != "" && $_POST['email'] != "" && $_POST['stat'] != "")
{
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://gorest.co.in/public/v2/users?access-token=40ede14ee05bd2eba5b095e82d4cc5dc919d50b00672700974182ba2c56d384e',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"name":"'.$_POST["name"].'", "gender":"'.$_POST["gender"].'", "email":"'.$_POST["email"].'", "status":"'.$_POST["stat"].'"}',
  CURLOPT_HTTPHEADER => array('Content-Type: application/json')
));

$response = curl_exec($curl);
curl_close($curl);
$valasz=$response;
$adatok2 = json_decode($response, TRUE);

if( array_key_exists('id', $adatok2))
{
    $kimenet2 .= "<h2>Hozzáadva a felhasználókhoz:</h2><br><br><table><tr><td>" . $adatok2["id"] . "</td>" . "<td>" . $adatok2["name"] . "</td>" . "<td>" . $adatok2["email"] . "</td>" . "<td>" . $adatok2["gender"] . "</td>" . "<td>" . $adatok2["status"] . "</td></tr></table>";
}
else{
    $kimenet2 = "<h3>Név vagy e-mail cím foglalt!</h3><br><br>";
}
}


else
{
    $valasz="Minden mező kitöltése kötelező!";
}
?>
<?php echo $kimenet2;?>


<h2>PUT metódus:</h2>


<form action="#" method="post">
<div class="form-group" style="max-width: 400px; margin-left:auto; margin-right: auto; ">
    <label for="id">ID</label>
    <input type="text" name="id" id="id" required inputmode="text">
    <br><br>
    <label for="utonev">Status</label><br>
    <label for="utonev">Active</label>
    <input type="radio" id="active" name="stat2" value="active"> <br>
    <label for="utonev">Inactive</label>
    <input type="radio" id="inacive" name="stat2" value="inactive">
    <br><br>

    <br>
    <input class="btn btn-warning btn-lg btn-block" type="submit" name="submit2" value="Submit">
</div>
</form>
<?php
if(isset($_POST['submit2']) && $_POST['stat2'] != "")
{
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://gorest.co.in/public/v2/users/'.$_POST["id"].'?access-token=40ede14ee05bd2eba5b095e82d4cc5dc919d50b00672700974182ba2c56d384e',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{"status":"'.$_POST["stat2"].'"}',
  CURLOPT_HTTPHEADER => array('Content-Type: application/json')
));

$response = curl_exec($curl);
curl_close($curl);
$valasz2=$response;
$adatok3 = json_decode($response, TRUE);

if( array_key_exists('id', $adatok3))
{

    $kimenet3 .= "<h2>Felhasználói státusz módosítva:</h2><br><br><table><tr><td>" . $adatok3["id"] . "</td>" . "<td>" . $adatok3["name"] . "</td>" . "<td>" . $adatok3["email"] . "</td>" . "<td>" . $adatok3["gender"] . "</td>" . "<td>" . $adatok3["status"] . "</td></tr></table>";

}
else{
    $kimenet3 = "<h3>Nem található adat a megadott ID alapján!</h3><br><br>";
}
}
else{
    $valasz2="Kérjük válasszon egy státuszt!";
}
?>
<?php echo $kimenet3;?>


<h2>DELETE metódus:</h2>


<form action="#" method="post">
<div class="form-group" style="max-width: 400px; margin-left:auto; margin-right: auto; ">
    <label for="id">ID</label>
    <input type="text" name="id" id="id" required inputmode="text">
    <br><br>

    <br>
    <input class="btn btn-warning btn-lg btn-block" type="submit" name="submit3" value="Submit">
</div>
</form>
<?php
if(isset($_POST['submit3']))
{
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://gorest.co.in/public/v2/users/'.$_POST["id"].'?access-token=40ede14ee05bd2eba5b095e82d4cc5dc919d50b00672700974182ba2c56d384e',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array('Content-Type: application/json')
));

$delresp = curl_exec($curl);
curl_close($curl);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://gorest.co.in/public/v2/users/'.$_POST["id"].'?access-token=40ede14ee05bd2eba5b095e82d4cc5dc919d50b00672700974182ba2c56d384e',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array('Content-Type: application/json')
));

$getresp = curl_exec($curl);
curl_close($curl);
//  $adatok4 = json_decode($response, TRUE);
if($getresp == '{"message":"Resource not found"}')
{
    $valasz3 = "<h2>Sikeres törlés!</h2>";
}


    //$kimenet3 .= "<h2>Felhasználói státusz módosítva:</h2><br><br><table><tr><td>" . $adatok3["id"] . "</td>" . "<td>" . $adatok3["name"] . "</td>" . "<td>" . $adatok3["email"] . "</td>" . "<td>" . $adatok3["gender"] . "</td>" . "<td>" . $adatok3["status"] . "</td></tr></table>";


}
?>
<?php echo $valasz3;?>