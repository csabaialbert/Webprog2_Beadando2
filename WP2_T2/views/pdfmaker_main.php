<h2 class="centered-title">Exportálás PDF fájlba</h2>
<form name="tour_filter_form" onsubmit="return validateForm();" action="<?= SITE_ROOT ?>pdfquery" method="post">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <fieldset class="framed-fieldset">
                <legend>A túra hossza</legend>
                <label for="min_dist" class="form-label">Legalább:</label>
                <input type="number" id="min_dist" name="min_dist" min="0" max="50"/>
                <br>
                <label for="max_dist" class="form-label">Legfeljebb:</label>
                <input type="number" id="max_dist" name="max_dist" min="0" max="50">
            </fieldset>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <fieldset class="framed-fieldset">
                <legend>Szükséges idő</legend>
                <label for="min_time" class="form-label">Legalább:</label>
                <input type="number" id="min_time" name="min_time" min="0" max="50"/>
                <br>
                <label for="max_time" class="form-label">Legfeljebb:</label>
                <input type="number" id="max_time" name="max_time" min="0" max="50">
            </fieldset>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <fieldset class="framed-fieldset">
                <legend>Túravezetővel</legend>
                <label for="with_guide" class="form-label">Válasszon egy opciót!</label>
                <br>
                <select name="with_guide" id="with_guide" class="sel-y-n-e">
                    <option value="either" selected>Mindegy</option>
                    <option value="guide_yes">Igen</option>
                    <option value="guide_no">Nem</option>
                </select>
            </fieldset>
        </div>
    </div>
    <button id="sendform" class="btn btn-warning btn-lg btn-block" type="submit">
        Szűrés, és exportálás PDF fájlba
    </button>
</form>
