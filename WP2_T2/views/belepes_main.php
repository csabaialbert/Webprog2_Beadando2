<!--Belépési form megjelenítése egy textbox-szal és egy passwordbox-szal, valamint egy belépés gombbal.-->
<h2 style="margin: auto;  padding-bottom: 40px; text-align: center; margin-top:0; padding-top:  20px; margin-bottom:0;">Belépés</h2>
<form  action="<?= SITE_ROOT ?>beleptet" method="post">
<div class="form-group" style="max-width: 400px; margin-left:auto; margin-right: auto; ">
    <label for="login">Felhasználónév:</label>
    <input type="text" name="login" id="login" required
           pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+">
    <br>
    <label for="password">Jelszó:</label>
    <input type="password" name="password" id="password" required
           pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">
    <br>
    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Bejelentkezés">
</div>
</form>
<!--Regisztrálási form megjelenítése három textbox-szal és két passwordbox-szal, valamint egy regisztracio gombbal.-->
<h2 style="margin: auto;  padding-bottom: 40px; text-align: center; margin-top:0; padding-top:  20px; margin-bottom:0;">Regisztráció</h2>
<form action="<?= SITE_ROOT ?>regisztral" method="post">
<div class="form-group" style="max-width: 400px; margin-left:auto; margin-right: auto; ">
    <label for="csaladi_nev">Családi név</label>
    <input type="text" name="csaladi_nev" id="csaladi_nev" required inputmode="text">
    <br>
    <label for="utonev">Utónév</label>
    <input type="text" name="utonev" id="utonev" required inputmode="text">
    <br>
    <label for="reg_login">Felhasználónév</label>
    <input type="text" name="reg_login" id="reg_login" required
           pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+">
    <br>
    <label for="reg_pw">Jelszó:</label>
    <input type="password" name="reg_pw" id="reg_pw" required
           pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">
    <br>
    <label for="reg_pw_confirm">Jelszó megerősítése:</label>
    <input type="password" name="reg_pw_confirm" id="reg_pw_confirm" required
           pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">
    <br>
    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Regisztráció">
</div>
</form>

